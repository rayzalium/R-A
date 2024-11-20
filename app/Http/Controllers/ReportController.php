<?php

namespace App\Http\Controllers;
use App\Models\cycleA; // Replace with your actual model
use App\Models\cycleB; // Replace with your actual model
use App\Models\cycleC; // Replace with your actual model
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function export(Request $request)
    {
        $difference = $request->input('difference');

        // Fetch data from each table with an additional plane name
        $data1 = DB::table('cycle_a_s')
            ->select('id', 'name', 'serial', 'current', 'max')
            ->whereRaw('max - current < ?', [$difference])
            ->get()
            ->map(function ($item) {
                $item->plane_name = 'AFA';
                return $item;
            });

        $data2 = DB::table('cycle_b_s')
            ->select('id', 'name', 'serial', 'current', 'max')
            ->whereRaw('max - current < ?', [$difference])
            ->get()
            ->map(function ($item) {
                $item->plane_name = 'AFB';
                return $item;
            });

        $data3 = DB::table('cycle_c_s')
            ->select('id', 'name', 'serial', 'current', 'max')
            ->whereRaw('max - current < ?', [$difference])
            ->get()
            ->map(function ($item) {
                $item->plane_name = 'AFC';
                return $item;
            });

        // Combine data
        $combinedData = $data1->merge($data2)->merge($data3);

        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Serial No.');
        $sheet->setCellValue('D1', 'Current');
        $sheet->setCellValue('E1', 'Max');
        $sheet->setCellValue('F1', 'Plane Name');

        // Populate the data
        $row = 2;
        foreach ($combinedData as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->name);
            $sheet->setCellValue('C' . $row, $item->serial);
            $sheet->setCellValue('D' . $row, $item->current);
            $sheet->setCellValue('E' . $row, $item->max);
            $sheet->setCellValue('F' . $row, $item->plane_name);
            $row++;
        }

        // Create the Excel file
        $writer = new Xlsx($spreadsheet);

        // Set headers for download
        $fileName = 'report.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Output the file
        $writer->save('php://output');
    }

    public function exportHours(Request $request)
{
    $difference = $request->input('difference');

    // Fetch data from each Hours table with an additional plane name
    $data1 = DB::table('hours')
        ->select('id', 'name', 'serial', 'current', 'max')
        ->whereRaw('max - current < ?', [$difference])
        ->get()
        ->map(function ($item) {
            $item->plane_name = 'AFA';
            return $item;
        });

    $data2 = DB::table('hour_b_s')
        ->select('id', 'name', 'serial', 'current', 'max')
        ->whereRaw('max - current < ?', [$difference])
        ->get()
        ->map(function ($item) {
            $item->plane_name = 'AFB';
            return $item;
        });

    $data3 = DB::table('hourcs')
        ->select('id', 'name', 'serial', 'current', 'max')
        ->whereRaw('max - current < ?', [$difference])
        ->get()
        ->map(function ($item) {
            $item->plane_name = 'AFC';
            return $item;
        });

    // Combine data
    $combinedData = $data1->merge($data2)->merge($data3);

    // Create a new Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the header
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Serial No.');
    $sheet->setCellValue('D1', 'Current');
    $sheet->setCellValue('E1', 'Max');
    $sheet->setCellValue('F1', 'Plane Name');

    // Populate the data
    $row = 2;
    foreach ($combinedData as $item) {
        $sheet->setCellValue('A' . $row, $item->id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $item->serial);
        $sheet->setCellValue('D' . $row, $item->current);
        $sheet->setCellValue('E' . $row, $item->max);
        $sheet->setCellValue('F' . $row, $item->plane_name);
        $row++;
    }

    // Create the Excel file
    $writer = new Xlsx($spreadsheet);

    // Set headers for download
    $fileName = 'hours_report.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    // Output the file
    $writer->save('php://output');
}


public function exportDates(Request $request)
{
    $dateDifference = $request->input('date_difference');

    // Calculate the date threshold
    $thresholdDate = match ($dateDifference) {
        '1_week' => Carbon::now()->subWeek(),
        '2_weeks' => Carbon::now()->subWeeks(2),
        '1_month' => Carbon::now()->subMonth(),
        '2_months' => Carbon::now()->subMonths(2),
        default => Carbon::now(),
    };

    // Fetch data from each Dates table
    $data1 = DB::table('d_ate_a_s')
        ->select('id', 'name', 'start', 'max')
        ->where('start', '>', $thresholdDate)
        ->get()
        ->map(function ($item) {
            $item->plane_name = 'AFA';
            return $item;
        });

    $data2 = DB::table('d_ate_b_s')
        ->select('id', 'name', 'start', 'max')
        ->where('start', '>', $thresholdDate)
        ->get()
        ->map(function ($item) {
            $item->plane_name = 'AFB';
            return $item;
        });

    $data3 = DB::table('d_ate_c_s')
        ->select('id', 'name', 'start', 'max')
        ->where('start', '>', $thresholdDate)
        ->get()
        ->map(function ($item) {
            $item->plane_name = 'AFC';
            return $item;
        });

    // Combine data
    $combinedData = $data1->merge($data2)->merge($data3);

    // Create a new Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the header
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Start Date');
    $sheet->setCellValue('D1', 'Max');
    $sheet->setCellValue('E1', 'Plane Name');

    // Populate the data
    $row = 2;
    foreach ($combinedData as $item) {
        $sheet->setCellValue('A' . $row, $item->id);
        $sheet->setCellValue('B' . $row, $item->name);
        $sheet->setCellValue('C' . $row, $item->start);
        $sheet->setCellValue('D' . $row, $item->max);
        $sheet->setCellValue('E' . $row, $item->plane_name);
        $row++;
    }

    // Create the Excel file
    $writer = new Xlsx($spreadsheet);

    // Set headers for download
    $fileName = 'dates_report.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    // Output the file
    $writer->save('php://output');
}
}

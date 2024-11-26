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
/*
private function getFilteredCycleData($table, $filter)
{
    return DB::table($table)->get()->map(function ($item) use ($filter) {
        $difference = $item->max - $item->current;
        $item->status = null;

        switch ($filter) {
            case 'critical':
                if ($difference <= 5) $item->status = 'Critical';
                break;
            case 'non-critical':
                if ($difference > 5 && $difference <= 20) $item->status = 'Non-Critical';
                break;
            case 'fresh':
                if ($difference == 0) $item->status = 'Fresh';
                break;
        }

        return $item->status ? $item : null;
    })->filter();
}

private function getFilteredHourData($table, $filter)
{
    return DB::table($table)->get()->map(function ($item) use ($filter) {
        $difference = $item->max - $item->current;
        $item->status = null;

        switch ($filter) {
            case 'critical':
                if ($difference <= 50) $item->status = 'Critical';
                break;
            case 'non-critical':
                if ($difference > 50 && $difference <= 100) $item->status = 'Non-Critical';
                break;
            case 'fresh':
                if ($difference == 0) $item->status = 'Fresh';
                break;
        }

        return $item->status ? $item : null;
    })->filter();
}

private function getFilteredDateData($table, $filter)
{
    $systemDate = now(); // Current date from the system

    return DB::table($table)->get()->map(function ($item) use ($filter, $systemDate) {
        $startDate = $item->start; // Use 'start' as the current field
        $differenceInDays = $systemDate->diffInDays($startDate); // Calculate the difference in days
        $item->status = null; // Initialize the status property

        switch ($filter) {
            case 'critical':
                // Dates less than a week (critical condition)
                if ($differenceInDays < 7) $item->status = 'Critical';
                break;
            case 'non-critical':
                // Dates between a week and three weeks (non-critical condition)
                if ($differenceInDays >= 7 && $differenceInDays <= 21) $item->status = 'Non-Critical';
                break;
            case 'fresh':
                // Fresh if the start date equals the system date
                if ($systemDate->toDateString() === $startDate) $item->status = 'Fresh';
                break;
        }

        return $item->status ? $item : null; // Only return items with a valid status
    })->filter(); // Remove null entries
}



public function exportPlaneData($plane, $filter)
{
    // Determine the tables based on the plane
    $cycleTable = '';
    $hourTable = '';
    $dateTable = '';

    switch ($plane) {
        case 'AFA':
            $cycleTable = 'cycle_a_s';
            $hourTable = 'hours';
            $dateTable = 'd_ate_a_s';
            break;
        case 'AFB':
            $cycleTable = 'cycle_b_s';
            $hourTable = 'hour_b_s';
            $dateTable = 'd_ate_b_s';
            break;
        case 'AFC':
            $cycleTable = 'cycle_c_s';
            $hourTable = 'hourcs';
            $dateTable = 'd_ate_c_s';
            break;
        default:
            return back()->withErrors(['error' => 'Invalid plane selected']);
    }

    // Filter the data based on the filter type
    $cycleData = $this->getFilteredCycleData($cycleTable, $filter);
    $hourData = $this->getFilteredHourData($hourTable, $filter);
    $dateData = $this->getFilteredDateData($dateTable, $filter);

    // Check if there is data to export
    if ($cycleData->isEmpty() && $hourData->isEmpty() && $dateData->isEmpty()) {
        return back()->withErrors(['error' => 'No data available for the selected filter.']);
    }

    // Create the spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $sheet->setCellValue('A1', 'Type');
    $sheet->setCellValue('B1', 'ID');
    $sheet->setCellValue('C1', 'Max Value');
    $sheet->setCellValue('D1', 'Current Value');
    $sheet->setCellValue('E1', 'Difference');
    $sheet->setCellValue('F1', 'Status');

    // Populate data
    $row = 2;

    // Append Cycle Data
    foreach ($cycleData as $data) {
        $sheet->setCellValue("A{$row}", 'Cycle');
        $sheet->setCellValue("B{$row}", $data->id);
        $sheet->setCellValue("C{$row}", $data->max);
        $sheet->setCellValue("D{$row}", $data->current);
        $sheet->setCellValue("E{$row}", $data->max - $data->current);
        $sheet->setCellValue("F{$row}", $data->status);
        $row++;
    }

    // Append Hour Data
    foreach ($hourData as $data) {
        $sheet->setCellValue("A{$row}", 'Hour');
        $sheet->setCellValue("B{$row}", $data->id);
        $sheet->setCellValue("C{$row}", $data->max);
        $sheet->setCellValue("D{$row}", $data->current);
        $sheet->setCellValue("E{$row}", $data->max - $data->current);
        $sheet->setCellValue("F{$row}", $data->status);
        $row++;
    }

    // Append Date Data
    foreach ($dateData as $data) {
        $sheet->setCellValue("A{$row}", 'Date');
        $sheet->setCellValue("B{$row}", $data->id);
        $sheet->setCellValue("C{$row}", $data->max);
        $sheet->setCellValue("D{$row}", $data->start); // Use 'start' for current value
        $sheet->setCellValue("E{$row}", $data->difference);
        $sheet->setCellValue("F{$row}", $data->status);
        $row++;
    }

    // Save the spreadsheet to a file
    $fileName = "{$plane}_{$filter}_Data.xlsx";
    $filePath = public_path($fileName);

    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);

    return response()->download($filePath)->deleteFileAfterSend(true);
}*/

/*
public function exportExcel(Request $request)
{
    $plane = $request->input('plane'); // AFA, AFB, AFC
    $filter = $request->input('filter'); // Fresh, Critical, Non-Critical

    // Determine the tables to query based on the plane
    $cycleTable = $plane === 'AFA' ? 'cycle_a_s' : ($plane === 'AFB' ? 'cycle_b_s' : 'cycle_c_s');
    $hourTable = $plane === 'AFA' ? 'hours' : ($plane === 'AFB' ? 'hour_b_s' : 'hourcs');
    $dateTable = $plane === 'AFA' ? 'd_ate_a_s' : ($plane === 'AFB' ? 'd_ate_b_s' : 'd_ate_c_s');

    // Query data based on filter
    $cycleData = $this->getCycleData($cycleTable, $filter);
    $hourData = $this->getHourData($hourTable, $filter);
    $dateData = $this->getDateData($dateTable, $filter);

    // Generate Excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle("Plane {$plane} - {$filter}");

    // Add headers
    $sheet->setCellValue('A1', 'Type');
    $sheet->setCellValue('B1', 'Max');
    $sheet->setCellValue('C1', 'Current');
    $sheet->setCellValue('D1', 'Difference');

    // Add Cycle Data
    $row = 2;
    foreach ($cycleData as $data) {
        $sheet->setCellValue("A{$row}", 'Cycle');
        $sheet->setCellValue("B{$row}", $data->max);
        $sheet->setCellValue("C{$row}", $data->current);
        $sheet->setCellValue("D{$row}", $data->max - $data->current);
        $row++;
    }

    // Add Hour Data
    foreach ($hourData as $data) {
        $sheet->setCellValue("A{$row}", 'Hour');
        $sheet->setCellValue("B{$row}", $data->max);
        $sheet->setCellValue("C{$row}", $data->current);
        $sheet->setCellValue("D{$row}", $data->max - $data->current);
        $row++;
    }

    // Add Date Data
   // Add Date Data
foreach ($dateData as $data) {
    $sheet->setCellValue("A{$row}", 'Date');
    $sheet->setCellValue("B{$row}", $data->max);

    // Ensure `start` is a valid date
    $sheet->setCellValue("C{$row}", $data->start);

    // Calculate difference in days between `max` and current date
    $maxTimestamp = strtotime($data->max);
    $currentTimestamp = strtotime(now());
    if ($maxTimestamp !== false && $currentTimestamp !== false) {
        $differenceInDays = round(($maxTimestamp - $currentTimestamp) / (60 * 60 * 24));
        $sheet->setCellValue("D{$row}", $differenceInDays . ' days');
    } else {
        $sheet->setCellValue("D{$row}", 'Invalid Date');
    }

    $row++;
}


    // Output to browser
    $writer = new Xlsx($spreadsheet);
    $fileName = "{$plane}_{$filter}_Report.xlsx";

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"{$fileName}\"");
    $writer->save("php://output");
    exit;
}

private function getCycleData($table, $filter)
{
    if ($filter === 'Fresh') {
        return \DB::table($table)->where('current', 0)->get();
    } elseif ($filter === 'Critical') {
        return \DB::table($table)->whereRaw('max - current <= 5')->get();
    } else {
        return \DB::table($table)->whereRaw('max - current BETWEEN 5 AND 20')->get();
    }
}

private function getHourData($table, $filter)
{
    if ($filter === 'Fresh') {
        return \DB::table($table)->where('current', 0)->get();
    } elseif ($filter === 'Critical') {
        return \DB::table($table)->whereRaw('max - current <= 50')->get();
    } else {
        return \DB::table($table)->whereRaw('max - current BETWEEN 50 AND 100')->get();
    }
}

private function getDateData($table, $filter)
{
    if ($filter === 'Fresh') {
        return \DB::table($table)->where('start', date('Y-m-d'))->get();
    } elseif ($filter === 'Critical') {
        return \DB::table($table)->whereRaw('max < DATE_ADD(NOW(), INTERVAL 7 DAY)')->get();
    } else {
        return \DB::table($table)->whereRaw('max BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND DATE_ADD(NOW(), INTERVAL 21 DAY)')->get();
    }
}*/

public function exportExcel(Request $request)
{
    $plane = $request->input('plane'); // AFA, AFB, AFC
    $filter = $request->input('filter'); // Fresh, Critical, Non-Critical

    // Determine the tables to query based on the plane
    $cycleTable = $plane === 'AFA' ? 'cycle_a_s' : ($plane === 'AFB' ? 'cycle_b_s' : 'cycle_c_s');
    $hourTable = $plane === 'AFA' ? 'hours' : ($plane === 'AFB' ? 'hour_b_s' : 'hourcs');
    $dateTable = $plane === 'AFA' ? 'd_ate_a_s' : ($plane === 'AFB' ? 'd_ate_b_s' : 'd_ate_c_s');

    // Query data based on filter
    $cycleData = $this->getCycleData($cycleTable, $filter);
    $hourData = $this->getHourData($hourTable, $filter);
    $dateData = $this->getDateData($dateTable, $filter);

    // Generate Excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle("Plane {$plane} - {$filter}");

    // Add headers
    $sheet->setCellValue('A1', 'Type');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Serial');
    $sheet->setCellValue('D1', 'Max');
    $sheet->setCellValue('E1', 'Current/Start');
    $sheet->setCellValue('F1', 'Difference');

    $row = 2;

    // Add Cycle Data
    foreach ($cycleData as $data) {
        $sheet->setCellValue("A{$row}", 'Cycle');
        $sheet->setCellValue("B{$row}", $data->name);
        $sheet->setCellValue("C{$row}", $data->serial);
        $sheet->setCellValue("D{$row}", $data->max);
        $sheet->setCellValue("E{$row}", $data->current);
        $sheet->setCellValue("F{$row}", $data->max - $data->current);
        $row++;
    }

    // Add Hour Data
    foreach ($hourData as $data) {
        $sheet->setCellValue("A{$row}", 'Hour');
        $sheet->setCellValue("B{$row}", $data->name);
        $sheet->setCellValue("C{$row}", $data->serial);
        $sheet->setCellValue("D{$row}", $data->max);
        $sheet->setCellValue("E{$row}", $data->current);
        $sheet->setCellValue("F{$row}", $data->max - $data->current);
        $row++;
    }

    // Add Date Data
    foreach ($dateData as $data) {
        $sheet->setCellValue("A{$row}", 'Date');
        $sheet->setCellValue("B{$row}", $data->name);
        $sheet->setCellValue("C{$row}", $data->serial);
        $sheet->setCellValue("D{$row}", $data->max);
        $sheet->setCellValue("E{$row}", $data->start);

        // Calculate difference in days
        $maxTimestamp = strtotime($data->max);
        $currentTimestamp = strtotime(now());
        if ($maxTimestamp !== false && $currentTimestamp !== false) {
            $differenceInDays = round(($maxTimestamp - $currentTimestamp) / (60 * 60 * 24));
            $sheet->setCellValue("F{$row}", $differenceInDays . ' days');
        } else {
            $sheet->setCellValue("F{$row}", 'Invalid Date');
        }

        $row++;
    }

    // Output to browser
    $writer = new Xlsx($spreadsheet);
    $fileName = "{$plane}_{$filter}_Report.xlsx";

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"{$fileName}\"");
    $writer->save("php://output");
    exit;
}
private function getCycleData($table, $filter)
{
    if ($filter === 'Fresh') {
        return \DB::table($table)->select('name', 'serial', 'max', 'current')->where('current', 0)->get();
    } elseif ($filter === 'Critical') {
        return \DB::table($table)->select('name', 'serial', 'max', 'current')->whereRaw('max - current <= 5')->get();
    } else {
        return \DB::table($table)->select('name', 'serial', 'max', 'current')->whereRaw('max - current BETWEEN 5 AND 20')->get();
    }
}

private function getHourData($table, $filter)
{
    if ($filter === 'Fresh') {
        return \DB::table($table)->select('name', 'serial', 'max', 'current')->where('current', 0)->get();
    } elseif ($filter === 'Critical') {
        return \DB::table($table)->select('name', 'serial', 'max', 'current')->whereRaw('max - current <= 50')->get();
    } else {
        return \DB::table($table)->select('name', 'serial', 'max', 'current')->whereRaw('max - current BETWEEN 50 AND 100')->get();
    }
}

private function getDateData($table, $filter)
{
    if ($filter === 'Fresh') {
        return \DB::table($table)->select('name', 'serial', 'max', 'start')->where('start', date('Y-m-d'))->get();
    } elseif ($filter === 'Critical') {
        return \DB::table($table)->select('name', 'serial', 'max', 'start')->whereRaw('max < DATE_ADD(NOW(), INTERVAL 7 DAY)')->get();
    } else {
        return \DB::table($table)->select('name', 'serial', 'max', 'start')->whereRaw('max BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND DATE_ADD(NOW(), INTERVAL 21 DAY)')->get();
    }
}


}

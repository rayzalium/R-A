<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Fetch all rows from the hours table
        $rows = DB::table('hours')->get();

        foreach ($rows as $row) {
            $adjustedCurrent = $this->adjustDecimal($row->current);
            $adjustedMax = $this->adjustDecimal($row->max);

            // Update the rows with corrected values
            DB::table('hours')->where('id', $row->id)->update([
                'current' => $adjustedCurrent,
                'max' => $adjustedMax,
            ]);
        }
    }

    /**
     * Adjust the decimal part of a number to ensure it does not exceed 59.
     *
     * @param float $value
     * @return float
     */
    private function adjustDecimal($value)
    {
        $integerPart = floor($value);
        $decimalPart = round(($value - $integerPart) * 100);

        if ($decimalPart > 59) {
            $integerPart += floor($decimalPart / 60);
            $decimalPart %= 60;
        }

        return $integerPart + ($decimalPart / 100);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hours', function (Blueprint $table) {
            //
        });
    }
};

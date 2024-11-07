<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_sheets', function (Blueprint $table) {
            $table->id();
          /* $table->unsignedBigInteger('cycle_id')->default(0);
            $table->foreign('cycle_id')->references('id')->on('cycle_a_s')->onDelete('cascade');*/
            $table->string('name_of_plane');
            $table->string('no_of_flight');
            $table->date('srart_date');
            $table->date('end_date');
            $table->time('take_of_time');
            $table->time('landing_time');
            $table->string('deprature');
            $table->string('arrival');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_sheets');
    }
};

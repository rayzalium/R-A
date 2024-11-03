<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogSheet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name_of_plane','no_of_flight','srart_date','end_date','take_of_time','landing_time','deprature','arrival'];
   // protected $dates = ['deleted_at'];
}

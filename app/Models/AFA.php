<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AFA extends Model
{
    use HasFactory;
    protected $fillable = ['name','serialNo', 'startDate', 'limitOfDays' ,
    'counterOfCycles','limitOfCycles', 'limitOfHours', 'counterOfHours'];
}

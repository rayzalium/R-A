<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DAteC extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'd_ate_c_s';
    protected $fillable = ['name','serial','start','max'];
    protected $dates = ['deleted_at'];
}

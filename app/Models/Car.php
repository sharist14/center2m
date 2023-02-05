<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "Car";

    protected $fillable = [
      'RegNumber',
      'VIN',
      'Model',
      'Brand'
    ];
}

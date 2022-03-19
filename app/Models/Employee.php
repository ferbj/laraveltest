<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name','age','joining_date','salary',
            'bonus','medical_claims','allowences','leave_payments'
    ];
}

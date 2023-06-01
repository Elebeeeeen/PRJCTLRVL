<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'lf_employees';

    protected $primaryKey = 'id';

    protected $casts = [
        'details' => 'array',
        'specification' =>'array'
    ];

    protected $fillable = ['office', 'last_name','first_name','middle_initial', 'employee_number','position', 'salary', 'email', 'type_of_leave', 'date', 'num_working_days', 'inclusive_dates', 'details', 'specification', 'commutaion', 'approver'];

}

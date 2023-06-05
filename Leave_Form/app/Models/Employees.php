<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'lf_employee';

    protected $primaryKey = 'id';


    protected $fillable = ['office','last_name','first_name','middle_initial','employee_number','position','salary','email','type_of_leave','date','num_working_days','inclusive_dates','commutation','approver','details','specification'];
}

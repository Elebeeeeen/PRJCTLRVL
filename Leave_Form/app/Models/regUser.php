<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regUser extends Model
{
    use HasFactory;

    // connecting to the database named lf_employee
    protected $table = 'accept_user';

    //collecting/locate the id's in the database 
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_number',
        'last_name',
        'middle_initial',
        'first_name',
        'email',
        'office',
        'position',
        'salary',
        'status'

    ];
}

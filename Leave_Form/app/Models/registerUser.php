<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerUser extends Model
{
    use HasFactory;

    // connecting to the database named users
    protected $table = 'users';

    //collecting/locate the id's in the database 
    protected $primaryKey = 'id';

    // protected $fillable = ['employee_number'];

}

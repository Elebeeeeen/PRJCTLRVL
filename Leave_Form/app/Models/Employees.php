<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    // connecting to the database named lf_employee
    protected $table = 'lf_employee';


    //collecting/locate the id's in the database 
    protected $primaryKey = 'id';


    //fill out the users input
    protected $fillable = [
        'office',
        'last_name',
        'first_name',
        'middle_initial',
        'employee_number',
        'position',
        'salary',
        'email',
        'type_of_leave',
        'date',
        'num_working_days',
        'inclusive_dates',
        'commutation',
        'approver',
        'details',
        'specification',
        'status',
        'start_date',
        'end_date'
    ];


    //array for type of leave
    public function leaveList()
    {
        $list = [];

        $list[] = ['id' => '1', 'text' => 'Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292', 'type' => 'Vacation Leave'];
        $list[] = ['id' => '2', 'text' => 'Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292', 'type' => 'Mandatory Leave'];
        $list[] = ['id' => '3', 'text' => 'Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292', 'type' => 'Sick Leave'];
        $list[] = ['id' => '4', 'text' => 'Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS', 'type' => 'Maternity Leave'];
        $list[] = ['id' => '5', 'text' => 'Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended', 'type' => 'Paternity Leave'];
        $list[] = ['id' => '6', 'text' => 'Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292', 'type' => 'Special Privelage Leave'];
        $list[] = ['id' => '7', 'text' => 'Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004', 'type' => 'Solo Parent Leave'];
        $list[] = ['id' => '8', 'text' => 'Study Leave (Sec. 68, Rule XVI, Omnibus Rules Implementation E.O No. 292', 'type' => 'Study Leave'];
        $list[] = ['id' => '9', 'text' => '10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005', 'type' => '10-Day VAWC Leave'];
        $list[] = ['id' => '10', 'text' => 'Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292', 'type' => 'Rehabilitation Privelage'];
        $list[] = ['id' => '11', 'text' => 'Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)', 'type' => 'Special Leave Benefits Leave'];
        $list[] = ['id' => '12', 'text' => 'Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)', 'type' => 'Special Emergency Leave'];
        $list[] = ['id' => '13', 'text' => 'Adoption Leave (R.A No. 8552)', 'type' => 'Adoption Leave'];
        $list[] = ['id' => '14', 'text' => 'Others', 'type' => 'Others'];

        return $list;
    }

    //loop for type of leave
    public function leaveType($data)
    {

        $datas = [];

        foreach ($data as $key => $value) {

            foreach ($this->leaveList() as $key => $val) {

                $value['type_of_leave'] = ($value['type_of_leave'] == $val['id']) ? $val['type'] : $value['type_of_leave'];
            } // leave list

            $datas[] = $value;
        } // data 

        return $datas;
    } // leaveType

    // getting the value/type of the id of each leave
    public function getLeaveType($data)
    {
        $type = '';

        foreach ($this->leaveList() as $key => $val) {

            if ($data === $val['id']) {
                $type = $val['type'];
                break;
            }
        } // foreach

        return $type;
    } // getLeaveType

}

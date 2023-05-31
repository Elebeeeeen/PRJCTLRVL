<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Sabberworm\CSS\Property\Import;
use Illuminate\SUpport\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$leave_form = Import::get();
        return view('leaveForm.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('leaveForm.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $message_error = [
            'office.required' => 'Please state your department office',
            'last_name.required' => 'Please indicate your Last Name',
            'first_name.required' => 'Please indicate your First Name',
            'middle_initial.required' => 'Please indicate your Middle Initial',
            'employee_number.required' => 'Please indicate your Employee Number',
            'position.required' => 'Please indicate your Position',
            'employee_number.required' => 'Please indicate your Employee Number',
            'salary.required' => 'Please indicate your Salary',
            'email.required' => 'Please indicate your E-mail',
            'type_of_leave.required' => 'Please indicate your Type of Leave',
            'date.required' => 'Please indicate your Date',
            'no_working_days.required' => 'Please indicate your no_working_days',
            'inclusive_dates.required' => 'Please indicate your inclusive_dates',
            'approver.required' => 'Please indicate your approver',
            'commutation.required' => 'Please indicate your commutation',
            

        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:25'
        ], $message_error);

        if ($validator->passes()) {
            $leave_form = new Employees();
            $leave_form->office = $request->office;
            $leave_form->last_name = $request->last_name;
            $leave_form->first_name = $request->first_name;
            $leave_form->middle_initial = $request->middle_initial;
            $leave_form->employee_number = $request->employee_number;
            $leave_form->position = $request->position;
            $leave_form->salary = $request->salary;
            $leave_form->email = $request->email;
            $leave_form->type_of_leave = $request->type_of_leave;
            $leave_form->date = $request->date;
            $leave_form->no_working_days = $request->no_working_days;
            $leave_form->inclusive_dates = $request->inclusive_dates;
            $leave_form->approver = $request->approver;
            $leave_form->commutation = $request->commutation;
            $leave_form->save();

            return response()->json(["success" => true, 'message' => 'Successfully added']);
        } else {
            return response()->json(["status" => false, "errors" => $validator->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

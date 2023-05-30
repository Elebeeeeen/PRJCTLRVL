<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Sabberworm\CSS\Property\Import;

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

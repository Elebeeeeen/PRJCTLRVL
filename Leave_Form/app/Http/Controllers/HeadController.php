<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\DivisionChief;

class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Head.form');
    }

    public function index2()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::get());

        return view('Head.leaveEmployee', compact(['leave_form']));
    }

    
    public function index3()
    {
        $list = new DivisionChief();
        $directors_form  = $list->leaveType(DivisionChief::get());

        return view('Head.leaveDivision', compact(['directors_form']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lf_employee = Employees::find($id);

        //new class
        $typeleave = new Employees();
        
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('Head.viewEmployee', compact(['lf_employee']));
    }

    public function show2(string $id)
    {
        //viewing the inserted data's through tables using view. 

        $division_form = DivisionChief::find($id);

        //new class
        $typeleave = new DivisionChief();

        //assign sa ibang property bago mag palit ng value
        $division_form->leaveType = $division_form->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

        $division_form->type_of_leave = $typeleave->getLeaveType($division_form->type_of_leave);

        return view('Director.viewDivision', compact(['division_form']));
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

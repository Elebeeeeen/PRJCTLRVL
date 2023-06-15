<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisionChief;
use App\Models\Employees;
use Illuminate\Support\Facades\Validator;


class DCController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('DivisionChief.form');
    }


    //displaing the page of the leave list of the division chief
    public function index2()
    {
        //displaying the page


        $list = new DivisionChief();
        $division_form  = $list->leaveType(DivisionChief::get());

        return view('DivisionChief.listdivision', compact(['division_form']));

        // return view('DivisionChief.form');
    }

    public function index3(){
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::get());

        return view('DivisionChief.listemployee', compact(['leave_form']));
    }

    public function create()
    {
        //
        return view('DivisionChief.divisionform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message_error = [
            'office.required' => 'Please state your Department Office',
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
            'num_working_days.required' => 'Please indicate your Number Working Days',
            'inclusive_dates.required' => 'Please indicate your Inclusive Dates',
            'approver.required' => 'Please indicate your Approver',
            'commutation.required' => 'Please indicate your Commutation',


        ];

        $validator = Validator::make($request->all(), [
            'office' => 'required|max:25',
            'last_name' => 'required|max:25',
            'first_name' => 'required|max:25',
            'middle_initial' => 'required|max:1',
            'employee_number' => 'required|numeric|max:99999',
            'salary' => 'required|numeric|max:999999',
            'email' => 'required',
            'type_of_leave' => 'required',
            'date' => 'required',
            'num_working_days' => 'required|numeric',
            'approver' => 'required',
            'commutation' => 'required',

        ], $message_error);

        if ($validator->passes()) {


            $directors_data = DivisionChief::create([
                'office' => $request->office,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_initial' => $request->middle_initial,
                'employee_number' => $request->employee_number,
                'position' => $request->position,
                'salary' => $request->salary,
                'email' => $request->email,
                'type_of_leave' => $request->type_of_leave,
                'date' => $request->date,
                'num_working_days' => $request->num_working_days,
                'inclusive_dates' => $request->inclusive_dates,
                'details' => $request->details,
                'specification' => $request->specification,
                'commutation' => $request->commutation,
                'approver' => $request->approver
            ]);
            return response()->json([$directors_data, "success" => true, 'message' => 'Successfully added']);
        } else {
            return response()->json(["status" => false, "errors" => $validator->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //viewing the inserted data's through tables using view. 

        $division_form = DivisionChief::find($id);

        //new class
        $typeleave = new DivisionChief();

        //assign sa ibang property bago mag palit ng value
        $division_form->leaveType = $division_form->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

        $division_form->type_of_leave = $typeleave->getLeaveType($division_form->type_of_leave);

        return view('DivisionChief.leave', compact(['division_form']));
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function show2(string $id)
    {
        // $lf_employee = Employees::find($id);
        // return view('DivisionChief.view', compact(['lf_employee']));

        $lf_employee = DivisionChief::find($id);

        //new class
        $typeleave = new DivisionChief();

        //assign sa ibang property bago mag palit ng value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('DivisionChief.leave', compact(['lf_employee']));
        
    }

    public function show3(string $id)
    {

        $lf_employee = Employees::find($id);

        //new class
        $typeleave = new Employees();

        //assign sa ibang property bago mag palit ng value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('DivisionChief.view', compact(['lf_employee']));
    }
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

    public function leaveList()
    {

        $list = new DivisionChief();
        return $list->leaveList();
    }
}

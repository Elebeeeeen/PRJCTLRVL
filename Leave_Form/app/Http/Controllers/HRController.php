<?php

namespace App\Http\Controllers;


use App\Models\Employees;
use App\Models\registerUser;
use App\Models\User;
use Illuminate\Http\Request;

class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //displaying the page
        return view('HumanResource.form');
    }

    public function index2()
    {
        // displaying the type of leave connecting the the model(employees)

        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::get());

        return view('HumanResource.leave', compact(['leave_form']));
    }

    public function index3()
    
    {
        //getting the registered account to view the page of account in hr's page

        $application_form = User::get();
        return view('HumanResource.account', compact(['application_form']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        //showing the inputed data's in leave form 

        $lf_employee = Employees::find($id);

        //new class
        $typeleave = new Employees();

        //getting the object and its property para mapalabas yung laman ng array
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('HumanResource.view', compact(['lf_employee']));
    }

    public function show2(string $id)
    
    {

        //showing the inputed data's in accounts form 

        $application_form = registerUser::find($id);
        return view('HumanResource.viewaccount', compact(['application_form','id']));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $application_form = Employees::find($id);
        $status = $request->status;
//for accept and reject button
        if ($status == "Approve by HR") {
            
            $application_form->status = $request->status;
            $application_form->save();

            return response()->json(["success" => true, "message" => "Successfully Approve!"]);
        } else if ($status == "Reject by HR") {
            $application_form->status = $request->status;
            $application_form->save();

            return response()->json(["success" => true, "message" => "Successfully Reject!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // additional function to read the arrays to the employee model
    public function leaveList()
    {

        $list = new Employees();
        return $list->leaveList();
    }
}

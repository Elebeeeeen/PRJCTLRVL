<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\User;
use Sabberworm\CSS\Property\Import;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $leave_form = Employees::get();
        
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::get());

        return view('leaveForm.list', compact(['leave_form']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('leaveForm.form');
    }

    /**
     * Store a newly created resource in storage.
     */

     // Validator in submitting a leave form

     

    public function store(Request $request)
    {
        $message_error = [

            'num_working_days.required' => 'Please Indicate Your Number Working Days',
            'type_of_leave.required' => 'Please Indicate Your Type of Leave',
            'start_date.required' => 'Please Indicate the Starting Date',
            'end_date.required' => 'Please Indicate the End Date',
            'date.required' => 'Please Indicate Your Date',
            'inclusive_dates.required' => 'Please Indicate Your Inclusive Dates',
            'commutation.required' => 'Please Indicate Your Commutation',
            'approver.required' => 'Please Indicate Your Approver',


        ];

        $validator = Validator::make($request->all(), [

            'num_working_days' => 'required|numeric|max:10',
            'start_date' => 'required',
            'end_date' => 'required',
            'type_of_leave' => 'required',
            'date' => 'required',
            'commutation' => 'required',
            'approver' => 'required',

        ], $message_error);

        if ($validator->passes()) {

            $status = 'Pending';

        // for the inclusive dates
        
            $firstInclusiveDate = $request->startdate;
            $startInclusiveDate = Carbon::createFromFormat('Y-m-d', $firstInclusiveDate)->format('F j, Y');
            $secondInclusiveDate = $request->enddate;
            $endInclusiveDate = Carbon::createFromFormat('Y-m-d', $secondInclusiveDate)->format('F j, Y');


            if($request->specification1 != null){
                $lf_employee = Employees::create([
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
                    // 'inclusive_dates' => $request->inclusive_dates,
                    'start_date' => $startInclusiveDate,
                    'end_date'=>  $endInclusiveDate,
                    'details' => $request->details,
                    'specification' => $request->specification1,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => $status,
                ]);
            }else if ($request->specification2 != null){
                $lf_employee = Employees::create([
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
                    'start_date' => $startInclusiveDate,
                    'end_date'=>  $endInclusiveDate,
                    // 'inclusive_dates' => $request->inclusive_dates,
                    'details' => $request->details,
                    'specification' => $request->specification2,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => $status,
                ]);
            }else{
                $lf_employee = Employees::create([
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
                    'start_date' => $startInclusiveDate,
                    'end_date'=>  $endInclusiveDate,
                    // 'inclusive_dates' => $request->inclusive_dates,
                    'details' => $request->details,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => $status,
                ]);
            }
            return response()->json([$lf_employee, "success" => true, 'message' => 'Successfully added']);
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

        $lf_employee = Employees::find($id);

        //new class
        $typeleave = new Employees();

        //assign sa ibang property bago mag palit ng value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('leaveform.view', compact(['lf_employee']));
        

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

    // additional function to read the arrays to the employee model
    public function leaveList(){
         
        $list = new Employees();
        return $list->leaveList();
    }
}

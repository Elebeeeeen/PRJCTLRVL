<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisionChief;
use App\Models\Employees;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class DCController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    //All created leave forms are counted throught it status in the file (form) in the Division Chief
    public function index()
    {

        $count = Employees::where('Status', 'Pending')->count();
        return view('DivisionChief.form', compact(['count']));
    }



    //Displaying the page of the leave list of the division chief
    public function index2()
    {

        $list = new DivisionChief();
        $division_form  = $list->leaveType(DivisionChief::get());

        return view('DivisionChief.listdivision', compact(['division_form']));
    }



    //All created leave forms by the employee can be seen through its status in the file (DivisionChief/listemployee) in the Division Chief
    public function index3()
    {

        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('status', 'Pending')->get());

        return view('DivisionChief.listemployee', compact(['leave_form']));
    }



    //Displaying the application of leave by the Division Chief
    public function create()
    {

        return view('DivisionChief.divisionform');
    }



    //storing the inputs of the users (Director Chief)
    public function store(Request $request)
    {


        //creating a validator 
        $message_error = [

            'num_working_days.required' => 'Please Indicate Your Number Working Days',
            'type_of_leave.required' => 'Please Indicate Your Type of Leave',
            'date.required' => 'Please Indicate Your Date',
            'inclusive_dates.required' => 'Please Indicate Your Inclusive Dates',
            'commutation.required' => 'Please Indicate Your Commutation',
            'approver.required' => 'Please Indicate Your Approver',

        ];

        $validator = Validator::make($request->all(), [
            'num_working_days' => 'required|numeric|max:10',
            'type_of_leave' => 'required',
            'date' => 'required',
            'commutation' => 'required',
            'approver' => 'required',

        ], $message_error);



        // converting the format of the date (inclusive date)
        $firstInclusiveDate = $request->startdate;
        $startInclusiveDate = Carbon::createFromFormat('Y-m-d', $firstInclusiveDate)->format('F j, Y');
        $secondInclusiveDate = $request->enddate;
        $endInclusiveDate = Carbon::createFromFormat('Y-m-d', $secondInclusiveDate)->format('F j, Y');


        //Applying the validator of the created form in Division Chief
        if ($validator->passes()) {

            if ($request->specification1 != null) {
                $lf_employee = DivisionChief::create([
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
                    'end_date' =>  $endInclusiveDate,
                    'details' => $request->details,
                    'specification' => $request->specification1,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => 'Pending'
                ]);
            } else if ($request->specification2 != null) {
                $lf_employee = DivisionChief::create([
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
                    'end_date' =>  $endInclusiveDate,
                    'details' => $request->details,
                    'specification' => $request->specification2,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => 'Pending'
                ]);
            } else {
                $lf_employee = DivisionChief::create([
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
                    'end_date' =>  $endInclusiveDate,
                    'details' => $request->details,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => 'Pending'
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
        //Getting the Division Chief through its id
        $division_form = DivisionChief::find($id);

        //Creating a new class for the type of leave
        $typeleave = new DivisionChief();

        //Assign a different property before changing the value
        $division_form->leaveType = $division_form->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $division_form->type_of_leave = $typeleave->getLeaveType($division_form->type_of_leave);

        return view('DivisionChief.leave', compact(['division_form']));
    }


    public function show3(string $id)
    {
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('DivisionChief.view', compact(['lf_employee', 'id']));
    }


    public function edit(string $id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */

    //Seeing the progress or status of the applied leave form by the employees
    //Adding a email
    public function update(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;

        if ($status == "Approved by DC") {
            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by DC") {
            $email = $lf_employee->email;

            $data = [
                'reason' => $request->reason,
                'employee' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];

            Mail::send('mail.reject', $data, function ($message) use ($data, $email) {
                $message->to($email);
                $message->subject('Disapproving Your Leave Application');
                $message->from(Auth::user()->email, 'Division Chief');
            });


            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }


    public function destroy(string $id)
    {
        //
    }

    //Creating new function to call the leavelist funtion in the model
    public function leaveList()
    {

        $list = new DivisionChief();
        return $list->leaveList();
    }
}

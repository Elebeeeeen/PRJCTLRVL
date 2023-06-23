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

    public function index()
    {
        //para ito sa form yung lalabas kung ilang pending form pa ba ang meron
        $count = Employees::where('Status', 'Pending')->count();
        return view('DivisionChief.form', compact(['count']));
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

    public function index3()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('status', 'Pending')->get());

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

        $firstInclusiveDate = $request->startdate;
        $startInclusiveDate = Carbon::createFromFormat('Y-m-d', $firstInclusiveDate)->format('F j, Y');
        $secondInclusiveDate = $request->enddate;
        $endInclusiveDate = Carbon::createFromFormat('Y-m-d', $secondInclusiveDate)->format('F j, Y');

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
                    // 'inclusive_dates' => $request->inclusive_dates,
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
                    // 'inclusive_dates' => $request->inclusive_dates,
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
                    // 'inclusive_dates' => $request->inclusive_dates,
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
        // $lf_employee = Employees::find($id);
        // return view('DivisionChief.view', compact(['lf_employee']));

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

    // public function show2(string $id)
    // {
    //     // $lf_employee = Employees::find($id);
    //     // return view('DivisionChief.view', compact(['lf_employee']));

    //     $lf_employee = Employees::find($id);

    //     //new class
    //     $typeleave = new Employees();

    //     //assign sa ibang property bago mag palit ng value
    //     $lf_employee->leaveType = $lf_employee->type_of_leave;

    //     //getting the object and its property para mapalabas yung laman ng array

    //     $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

    //     return view('DivisionChief.view', compact(['lf_employee', 'id']));
    // }

    public function show3(string $id)
    {
        $lf_employee = Employees::find($id);

        //new class
        $typeleave = new Employees();

        //assign sa ibang property bago mag palit ng value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

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
                'position'=> Auth::user()->position,
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

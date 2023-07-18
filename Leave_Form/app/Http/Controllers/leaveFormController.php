<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\regUser;
use App\Models\User;
use Sabberworm\CSS\Property\Import;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class leaveFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tableEmployee()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('position', 'employee')->where('status', 'Pending')->where('employee_number', Auth::user()->employee_number)->get());

        return view('table.employeeList', compact(['leave_form']));
    }

    public function tableDivision()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('position', 'division chief')->where('status', 'Pending')->where('employee_number', Auth::user()->employee_number)->get());

        return view('table.divisionList', compact(['leave_form']));
    }

    public function tableDirector()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('position', 'division chief')->where('status', 'Pending')->get());

        return view('table.divisionList', compact(['leave_form']));
    }

    public function tableHR()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::get());

        return view('table.hrList', compact(['leave_form']));
    }

    public function tableHRAcounts()
    {
        $application_form = regUser::get();
        return view('table.accounts', compact(['application_form']));
    }



    public function tableHead()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('status', 'Verified by HR')->get());

        return view('table.headList', compact(['leave_form']));
    }


    //may error samga counts especially sa employee,division,and director
    //di pa to ayos yung sa home
    //All created leave forms are counted throught it status in the file (form) in the Human Resource 
    public function pendingApplication()
    {

        $count1 = Employees::where('position', 'employee')->where('status', 'Pending')->count();
        $count2 = Employees::where('position', 'division chief')->where('status', 'Pending')->count();
        $count3 = Employees::where('status', 'Approved by DC')->count() + Employees::where('status', 'Approved by Director')->count();
        $count4 = regUser::where('status', 'Pending')->count();
        $count5 = Employees::where('status', 'Verified by HR')->count();

        //displaying the page
        return view('home.pendingApplication', compact(['count1', 'count2', 'count3', 'count4', 'count5']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createLeaveForm()
    {
        return view('create.leaveApplication');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeLeaveForm(Request $request)
    {
        //Creating a validator 
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

        if ($validator->passes()) {

            $status = 'Pending';

            // converting the format of the date (inclusive date)

            // $firstInclusiveDate = $request->startdate;
            // $startInclusiveDate = Carbon::createFromFormat('Y-m-d', $firstInclusiveDate)->format('F j, Y');
            // $secondInclusiveDate = $request->enddate;
            // $endInclusiveDate = Carbon::createFromFormat('Y-m-d', $secondInclusiveDate)->format('F j, Y');

            // Retrieve the user input (start date and end date)
            $start = $request->startdate;
            $end = $request->enddate;

            // Create Carbon instances from the user input
            $startdate = Carbon::createFromFormat('Y-m-d', $start);
            $enddate = Carbon::createFromFormat('Y-m-d', $end);

            // Generate the date range using Carbon's `between()` method
            $dateRange = [];
            for ($date = $startdate; $date->lte($enddate); $date->addDay()) {
                $dateRange[] = $date->format('Y-m-d');
            }

            // $dateRange now contains an array of dates within the specified range




            if ($request->specification1 != null) {
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
                    'start_date' => $startdate,
                    'end_date' =>  $enddate,
                    'details' => $request->details,
                    'specification' => $request->specification1,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => $status,
                ]);
            } else if ($request->specification2 != null) {
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
                    'start_date' => $startdate,
                    'end_date' =>  $enddate,
                    'details' => $request->details,
                    'specification' => $request->specification2,
                    'commutation' => $request->commutation,
                    'approver' => $request->approver,
                    'status' => $status,
                ]);
            } else {
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
                    'start_date' => $startdate,
                    'end_date' =>  $enddate,
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

    public function storeAccounts(Request $request, string $id)
    {
        // dd($id);
        $registered_user = regUser::find($id);
        $save = new User();
        $save->username = $request->username;
        $sample = User::find('username');
        $status = $request->status;
        if ($status == "Approved by HR") {
            $registered_user->status = $status;

            $verify_username = User::where('username', $request->username)->count();

            if ($verify_username >= 1) {
                return response()->json(["message" => "Same Username"]);
            } else {
                User::create([
                    'employee_number' => $registered_user->employee_number,
                    'status' => "Approve",
                    'last_name' => $registered_user->last_name,
                    'middle_initial' => $registered_user->middle_initial,
                    'first_name' => $registered_user->first_name,
                    'email' => $registered_user->email,
                    'office' => $registered_user->office,
                    'position' => $registered_user->position,
                    'salary' => $registered_user->salary,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'verified' => 'false',

                ]);
                return response()->json(["success" => true, "id" => $id]);
            }


            $registered_user->save();


            // Mail here

            //  return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by HR") {
            $registered_user->status = $status;
            $registered_user->save();

            // Mail here

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function viewEmployees(string $id)
    {
        //viewing the inserted data's through tables using view. 
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('approval.dcLeaveApproval', compact(['lf_employee', 'id']));
    }

    public function viewDivision(string $id)
    {
        //viewing the inserted data's through tables using view. 
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('view.dcLeaveForm', compact(['lf_employee']));
    }

    public function viewDirector(string $id)
    {
        //viewing the inserted data's through tables using view. 
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('approval.dirLeaveApproval', compact(['lf_employee', 'id']));
    }


    public function viewHR(string $id)
    {
        //viewing the inserted data's through tables using view. 
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('verify.hrVerifyApplication', compact(['lf_employee', 'id']));
    }

    public function viewHRAccounts(string $id)

    {
        $application_form = regUser::find($id);
        return view('approval.employeeAccountApproval', compact(['application_form', 'id']));
    }

    public function viewHead(string $id)
    {
        //viewing the inserted data's through tables using view. 
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('verify.headVerifyApplication', compact(['lf_employee', 'id']));
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

    public function hrAccountApproved(Request $request, string $id)
    {

        $registered_user = regUser::find($id);
        $save = new User();
        $save->username = $request->username;
        $status = $request->status;

        if ($status == "Approved by HR") {
            $registered_user->status = $status;

            User::create([
                'employee_number' => $registered_user->employee_number,
                'status' => "Approve",
                'last_name' => $registered_user->last_name,
                'middle_initial' => $registered_user->middle_initial,
                'first_name' => $registered_user->first_name,
                'email' => $registered_user->email,
                'office' => $registered_user->office,
                'position' => $registered_user->position,
                'salary' => $registered_user->salary,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'verified' => 'false',

            ]);
            return response()->json(["success" => true, "id" => $id]);
        } else if ($status == "Rejected by HR") {
            $registered_user->status = $status;
            $registered_user->save();
            // Mail here

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }

    public function emailDC(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;
        $email = $lf_employee->email;

        if ($status == "Approved by DC") {

            $data = [
                'employee' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];

            Mail::send('mail.verified', $data, function ($message) use ($email) {
                $message->to($email);
                $message->subject('Your Leave Application Has Been Approved by Division Chief.');
                $message->from(Auth::user()->email, 'Head Officer');
            });

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


    //Seeing the progress or status of the applied leave form by the Employees
    //Adding a email
    public function emailHR(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;
        $email = $lf_employee->email;

        if ($status == "Verified by HR") {
            $data = [
                'employee' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];

            Mail::send('mail.verified', $data, function ($message) use ($email) {
                $message->to($email);
                $message->subject('Your Leave Application Has Been Verified by the HR.');
                $message->from(Auth::user()->email, 'Head Officer');
            });

            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        }
    }

    public function emailHead(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;
        $email = $lf_employee->email;

        if ($status == "Verified") {
            $data = [
                'employee' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];

            Mail::send('mail.verified', $data, function ($message) use ($email) {
                $message->to($email);
                $message->subject('Your Leave Application Has Been Verified by the HR.');
                $message->from(Auth::user()->email, 'Head Officer');
            });

            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        }
    }

    // Approve
    public function emailHRAccounts(Request $request, string $id)
    {

        $lf_employee = regUser::find($id);
        $status = $request->status;
        if ($status == "Approved by HR") {
            $lf_employee->status = $request->status;
            $lf_employee->save();

            $email = $lf_employee->email;

            $data = [
                'employee' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];

            Mail::send('mail.approvedAcc', $data, function ($message) use ($data, $email) {
                $message->to($email);
                $message->subject('Approval of Your Application');
                $message->from(Auth::user()->email, 'Human Resource');
            });

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by HR") {
            $email = $lf_employee->email;

            $data = [
                'reason' => $request->reason,
                'employee' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];
            Mail::send('mail.rejectAcc', $data, function ($message) use ($data, $email) {
                $message->to($email);
                $message->subject('Disapproving Your Application');
                $message->from(Auth::user()->email, 'Human Resource');
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




    // additional function to read the arrays to the employee model
    //Creating new function to call the leavelist funtion in the model
    public function leaveList()
    {
        $list = new Employees();
        return $list->leaveList();
    }
}

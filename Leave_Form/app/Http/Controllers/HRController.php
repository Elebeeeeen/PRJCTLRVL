<?php

namespace App\Http\Controllers;


use App\Models\Employees;
use App\Models\registerUser;
use App\Models\DivisionChief;
use App\Models\User;
use App\Models\regUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    //All created leave forms are counted throught it status in the file (form) in the Human Resource 
    public function index()
    {
        $count = Employees::where('Status', 'Approved by Director')->count();
        $count2 = DivisionChief::where('Status', 'Approved by Director')->count();
        $count3 = regUser::where('status', 'pending')->count();

        //displaying the page
        return view('HumanResource.form', compact(['count', 'count2', 'count3']));
    }


    // linking to the employees leave applciation
    //All created leave forms by the employee can be seen through its status in the file (HumanResource/leaveEmployee) in the Human Resources
    public function index2()
    {
        // displaying the type of leave connecting the the model(employees)

        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('status', 'Approved by Director')->get());

        return view('HumanResource.leaveEmployee', compact(['leave_form']));
    }


    //linking to the registered account of the users

    public function index3()

    {
        //getting the registered account to view the page of account in hr's page

        $application_form = regUser::get();
        return view('HumanResource.account', compact(['application_form']));
    }


    // linking to the division chief leave application
    //All created leave forms by the employee can be seen through its status in the file (HumanResource/leaveEmployee) in the Human Resources

    public function index4()
    {
        // displaying the type of leave connecting the the model(Division Chief)

        $list = new DivisionChief();
        $directors_form  = $list->leaveType(DivisionChief::where('status', 'Approved by Director')->get());

        return view('HumanResource.leaveDivisionChief', compact(['directors_form']));
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
    public function store(Request $request, string $id)
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
    public function show(string $id)
    {
        //showing the inputed data's in leave form 
        //Getting the Employee through its id
        $lf_employee = Employees::find($id);

        //Creating a new class for the type of leave
        $typeleave = new Employees();

        //Assign a different property before changing the value
        $lf_employee->leaveType = $lf_employee->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        return view('HumanResource.view', compact(['lf_employee', 'id']));
    }

    //showing the inputed data's in accounts form 
    public function show2(string $id)

    {
        $application_form = regUser::find($id);
        return view('HumanResource.viewaccount', compact(['application_form', 'id']));
    }


    public function show3(string $id)
    {
        //viewing the inserted data's through tables using view. 
        //Getting the Division Chief through its id
        $directors_form = DivisionChief::find($id);

        //Creating a new class for the type of leave
        $typeleave = new DivisionChief(); // employee dati tong model

        //Assign a different property before changing the value
        $directors_form->leaveType = $directors_form->type_of_leave;

        //Getting the object and its property further to see of all arrays
        $directors_form->type_of_leave = $typeleave->getLeaveType($directors_form->type_of_leave);

        return view('HumanResource.viewDivision', compact(['directors_form', 'id']));

        //showing the inputed data's in accounts form 

        $application_form = regUser::find($id);
        return view('HumanResource.viewaccount', compact(['application_form', 'id']));
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


    //Seeing the progress or status of the applied leave form by the Employees
    //Adding a email
    public function update(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;

        if ($status == "Approved by HR") {

            $lf_employee->status = $request->status;
            $lf_employee->save();


            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by HR") {
            $email = $lf_employee->email;

            $data = [
                'reason' => $request->reason,
                'employees' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];
            Mail::send('mail.reject', $data, function ($message) use ($data, $email) {
                $message->to($email);
                $message->subject('Disapproving Your Leave Application');
                $message->from(Auth::user()->email, 'Human Resource');
            });

            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }



    //Seeing the progress or status of the applied leave form by the Division Chiefs
    //Adding a email
    public function update2(Request $request, string $id)
    {
        $directors_form = DivisionChief::find($id);
        $status = $request->status;

        if ($status == "Approved by HR") {
            $directors_form->status = $request->status;
            $directors_form->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by HR") {
            $email = $directors_form->email;

            $data = [
                'reason' => $request->reason,
                'employee' => $directors_form,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];
            Mail::send('mail.reject', $data, function ($message) use ($data, $email) {
                $message->to($email);
                $message->subject('Disapproving Your Leave Application');
                $message->from(Auth::user()->email, 'Human Resource');
            });



            $directors_form->status = $request->status;
            $directors_form->save();

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }

    // Approve
    public function update3(Request $request, string $id)
    {

        $lf_employee = regUser::find($id);
        $status = $request->status;
        if ($status == "Approved by HR") {
            $lf_employee->status = $request->status;
            $lf_employee->save();

            $email = $lf_employee->email;

            $data = [
                'employees' => $lf_employee,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position' => Auth::user()->position,
            ];

            Mail::send('mail.approve', $data, function ($message) use ($data, $email) {
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
            Mail::send('mail.reject', $data, function ($message) use ($data, $email) {
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

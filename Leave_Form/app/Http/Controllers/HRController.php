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
    public function index()
    {
        $count = Employees::where('Status', 'Approved by Director')->count();
        $count2 = DivisionChief::where('Status', 'Approved by Director')->count();
        // $count3 = registerUser::where('verified', 'false')->count();
        //displaying the page
        return view('HumanResource.form', compact(['count', 'count2']));
    }


    // linking to the employees leave applciation

    public function index2()
    {
        // displaying the type of leave connecting the the model(employees)

        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('status', 'Approved by Director')->get());

        return view('HumanResource.leaveEmployee', compact(['leave_form']));

        // $lf_employees = Employees::get();
        // $lf_division = DirectorChief::get();

        // return view('HumanResource.leaveEmployee', compact(['lf_employees', 'lf_division']));
    }


    //linking to the registered account of the users

    public function index3()

    {
        //getting the registered account to view the page of account in hr's page

        $application_form = regUser::get();
        return view('HumanResource.account', compact(['application_form']));
    }


    // linking to the division chief leave application

    public function index4()
    {
        // displaying the type of leave connecting the the model(employees)

        $list = new DivisionChief();
        $directors_form  = $list->leaveType(DivisionChief::get());

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

        $lf_employeess = Employees::find($id);

        //new class
        $typeleave = new Employees();

        //assign sa ibang property bago mag palit ng value
        $lf_employeess->leaveType = $lf_employeess->type_of_leave;

        //getting the object and its property para mapalabas yung laman ng array

        $lf_employeess->type_of_leave = $typeleave->getLeaveType($lf_employeess->type_of_leave);

        return view('HumanResource.view', compact(['lf_employees', 'id']));
    }

    public function show2(string $id)

    {

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
    public function update(Request $request, string $id)
    {
        $lf_employees = Employees::find($id);
        $status = $request->status;

        if ($status == "Approved by HR") {

            $lf_employees->status = $request->status;
            $lf_employees->save();


            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by HR") {
            $email = $lf_employees->email;

            $data = [
                'reason' => $request->reason,
                'employees' => $lf_employees,
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

            $lf_employees->status = $request->status;
            $lf_employees->save();

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }


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

        $lf_employees = regUser::find($id);
        $status = $request->status;
        if ($status == "Approved by HR") {
            $lf_employees->status = $request->status;
            $lf_employees->save();

            $email = $lf_employees->email;

            $data = [
                'employees' => $lf_employees,
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
            $email = $lf_employees->email;

            $data = [
                'reason' => $request->reason,
                'employees' => $lf_employees,
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


            $lf_employees->status = $request->status;
            $lf_employees->save();

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
    public function leaveList()
    {

        $list = new Employees();
        return $list->leaveList();
    }
}

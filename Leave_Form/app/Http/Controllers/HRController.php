<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\registerUser;
use App\Models\DivisionChief;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $count3 = registerUser::where('verified', 'false')->count();
        //displaying the page
        return view('HumanResource.form', compact(['count', 'count2']));
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

        $application_form = User::get();
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
        $application_form = registerUser::find($id);
        return view('HumanResource.viewaccount', compact(['application_form']));
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
                'employee' => $lf_employee,
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

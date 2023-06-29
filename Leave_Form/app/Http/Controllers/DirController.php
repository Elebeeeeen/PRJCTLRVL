<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\DivisionChief;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $count = Employees::where('Status', 'Approved by DC')->count();
        $count2 = DivisionChief::where('Status', 'Pending')->count();

        return view('Director.form', compact(['count', 'count2']));
    }

    public function index2()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('status', 'Approved by DC')->get());

        return view('Director.leaveemployee', compact(['leave_form'])); 
    }

    public function index3()
    {
        $list = new DivisionChief();
        $directors_form  = $list->leaveType(DivisionChief::where('status', 'Pending')->get());

        return view('Director.leaveDivisionChief', compact(['directors_form']));
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

        return view('Director.viewEmployee', compact(['lf_employee', 'id']));

        // $lf_employee = Employees::find($id);

        // //new class
        // $typeleave = new Employees();
        
        // $lf_employee->leaveType = $lf_employee->type_of_leave;

        // //getting the object and its property para mapalabas yung laman ng array
        // $lf_employee->type_of_leave = $typeleave->getLeaveType($lf_employee->type_of_leave);

        // return view('Director.viewEmployee', compact(['lf_employee', 'íd']));
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

        return view('Director.viewDivision', compact(['division_form', 'id']));
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
        $division_form = DivisionChief::find($id);
        $status = $request->status;

        if($status == "Approved by Director"){
            $division_form->status = $request->status;
            $division_form->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        }else if($status == "Rejected by Director"){
            $email = $division_form->email;

            $data = [
                'reason' => $request->reason,
                'employee' => $division_form,
                'firstname' => Auth::user()->first_name,
                'lastname' => Auth::user()->last_name,
                'mi' => Auth::user()->middle_initial,
                'position'=> Auth::user()->position,
            ];
            Mail::send('mail.reject', $data, function ($message) use ($data, $email) {
                $message->to($email);
                $message->subject('Disapproving Your Leave Application');
                $message->from(Auth::user()->email, 'Director');
            });


            $division_form->status = $request->status;
            $division_form->save();

            return response()->json(["success" => true, "message" => "Successfully rejected!"]);
        }
    }

    public function update2(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;

        if($status == "Approved by Director"){
            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        }else if($status == "Rejected by Director"){
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
}

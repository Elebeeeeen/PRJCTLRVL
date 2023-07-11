<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\regUser;
use App\Models\User;
use Sabberworm\CSS\Property\Import;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $leave_form  = $list->leaveType(Employees::where('position', 'employee')->get());

        return view('table.employeeList', compact(['leave_form']));
    }

    public function tableDivision()
    {
        $list = new Employees();
        $leave_form  = $list->leaveType(Employees::where('position', 'division chief')->get());

        return view('table.divisionList', compact(['leave_form']));
    }

    //di pa to ayos yung sa home
    //All created leave forms are counted throught it status in the file (form) in the Human Resource 
    public function pendingApplication()
    {
        //di pato gumagana
        $count1 = Employees::where('position', 'employee')->count();
        $count2 = Employees::where('position', 'division chief')->count();
        $count3 = regUser::where('status', 'Pending')->count();

        //displaying the page
        return view('home.pendingApplication', compact(['count1', 'count2', 'count3']));
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

            $firstInclusiveDate = $request->startdate;
            $startInclusiveDate = Carbon::createFromFormat('Y-m-d', $firstInclusiveDate)->format('F j, Y');
            $secondInclusiveDate = $request->enddate;
            $endInclusiveDate = Carbon::createFromFormat('Y-m-d', $secondInclusiveDate)->format('F j, Y');


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
                    'start_date' => $startInclusiveDate,
                    'end_date' =>  $endInclusiveDate,
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
                    'start_date' => $startInclusiveDate,
                    'end_date' =>  $endInclusiveDate,
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
                    'start_date' => $startInclusiveDate,
                    'end_date' =>  $endInclusiveDate,
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

        return view('view.employees', compact(['lf_employee', 'id']));
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

        return view('view.division', compact(['lf_employee']));
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
    public function viewingApplication(Request $request, string $id)
    {
        $lf_employee = Employees::find($id);
        $status = $request->status;

        if ($status == "Approved by Director") {
            $lf_employee->status = $request->status;
            $lf_employee->save();

            return response()->json(["success" => true, "message" => "Successfully approved!"]);
        } else if ($status == "Rejected by Director") {
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

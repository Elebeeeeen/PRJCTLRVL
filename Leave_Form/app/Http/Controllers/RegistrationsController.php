<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\regUser;
use Illuminate\Support\Facades\Validator;


class RegistrationsController extends Controller
{


    public function index()
    {
        return view('register.registration');
    }

    protected function validator(Request $request, $id, $data)
    {

        $message_error = [

            'employee_number.required' => 'Please indicate your Employee Number',
            'last_name.required' => 'Please indicate your Last Name',
            'first_name.required' => 'Please indicate your First Name',
            'middle_initial.required' => 'Please indicate your Middle Initial',
            'username.required' => 'Please indicate your specified username',
            'email.required' => 'Please indicate your E-mail',
            'office.required' => 'Please state your Department Office',
            'position.required' => 'Please indicate your Position',
            'employee_number.required' => 'Please indicate your Employee Number',
            'salary.required' => 'Please indicate your Salary',


        ];


        $validator = Validator::make($data, [
                'employee_number' => ['required', 'integer', 'max99999999', 'unique:users'],
                'last_name' => ['required', 'string', 'max:25'],
                'first_name' => ['required', 'string', 'max:25',],
                'middle_initial' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'username' => ['required', 'string', 'max:18', 'unique:users'],
                'office' => ['required', 'string', 'max:25'],
                'position' => ['required', 'string', 'max:50'],
                'salary' => ['required', 'integer', 'max:999999'],

            ],
            $message_error
        );

        if ($validator->passes()) {
            $users = regUser::find($data);
            $users->employee_numeber = $request->employee_number;
            $users->last_name = $request->last_name;
            $users->first_name = $request->first_name;
            $users->middle_initial = $request->middle_initial;
            $users->username = $request->username;
            $users->email = $request->email;
            $users->office = $request->office;
            $users->position = $request->position;
            $users->salary = $request->salary;
            $users->save();

            return response()->json([$users, "success" => true, 'message' => 'Successfully added']);
        } else {
            return response()->json(["status" => false, "errors" => $validator->errors()->all()]);
        
        }
    }

    protected function create(Request $data)
    {


        $role = Role::where('name', 'employee')->first();

        $verified_email = regUser::where('email', $data->email)->count();
        $verify_email = User::where('email', $data->email)->count();

        if ($verified_email == 1 || $verify_email == 1) {
            return response()->json("Same email");
        } else {

            regUser::create([
                'employee_number' => $data->employee_number,
                'last_name' => $data->last_name,
                'middle_initial' => $data->middle_initial,
                'first_name' => $data->first_name,
                'username' => $data->username,
                'email' => $data->email,
                'office' => $data->office,
                'position' => $data->position,
                'salary' => $data->salary,
                'status' => 'Pending',
            ])->roles()->attach($role);
        }


        return response()->json(["success" => true]);
    }
}

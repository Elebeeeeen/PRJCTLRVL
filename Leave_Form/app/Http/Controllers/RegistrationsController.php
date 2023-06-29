<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\regUser;
use Illuminate\Support\Facades\Validator;


class RegistrationsController extends Controller
{


    public function index()
    {
        return view('register.registration');
    }

    protected function validator(array $data)
    {
    
        return Validator::make($data,
            [
                'employee_number' => ['required', 'integer', 'max99999999', 'unique:users'],
                'last_name' => ['required', 'string', 'max:25'],
                'middle_initial' => ['required', 'string', 'max:25'],
                'first_name' => ['required', 'string', 'max:25',],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'office' => ['required', 'string', 'max:25'],
                'position' => ['required', 'string', 'max:50'],
                'salary' => ['required', 'integer', 'max:999999'],
            ]);
    }

    protected function create(Request $data)
    {
       

        $verified_email =regUser::where('email',$data->email)->count();
        $verify_email =User::where('email',$data->email)->count();
        
        if ($verified_email == 1 || $verify_email == 1) {
            return response()-> json("Same email");
        }else {
           
            regUser::create([
                'employee_number' => $data->employee_number,
                'last_name' => $data->last_name,
                'middle_initial' => $data->middle_initial,
                'first_name' => $data->first_name,
                'email' => $data->email,
                'office' => $data->office,
                'position' => $data->position,
                'salary' => $data->salary,
                'status' => 'Pending'
            ]);
        }

        // dd($verified_email);


        // return response()->json(["success" => true]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/leaveform';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'employee_number' => ['required', 'integer', 'max:9999999','unique:users'],
            'last_name' => ['required', 'string', 'max:25',],
            'middle_initial' => ['required', 'string', 'max:25',],
            'first_name' => ['required', 'string', 'max:25',],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'office' => ['required', 'string', 'max:25'],
            'position' => ['required', 'string', 'max:50'],
            'salary' => ['required','integer','max:999999'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'employee_number' => $data['employee_number'],
            'status'=> "Pending",
            'last_name' => $data['last_name'],
            'middle_initial' => $data['middle_initial'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'office' => $data['office'],
            'position' => $data['position'],
            'salary' => $data['salary'],
            'password' => Hash::make($data['password']),
            'verified' => 'false',

        ]);
    }
}

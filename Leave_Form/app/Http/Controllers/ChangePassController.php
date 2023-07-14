<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth,Hash;
use Validator;   
use App\Models\User;
class ChangePassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view ('/changepassword.changepass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messageerror=[
            'password.regex' => ' Atleast 8 characters long and  must include special character, Number, lowercase letters and At least 1 letter in uppercase'
        ];
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/ |confirmed',
            'password_confirmation' => 'required',
          ],$messageerror);
  
          $user = Auth::user();
  
          if (!Hash::check($request->current_password, $user->password)) {
              return back()->with('error', 'Current password does not match!');
          }
  
          $user->password = Hash::make($request->password);
          $user->save();
  
          return back()->with('success', 'Password successfully changed! You may now try to Sign-out and Login again using your new password');
        
    }

}
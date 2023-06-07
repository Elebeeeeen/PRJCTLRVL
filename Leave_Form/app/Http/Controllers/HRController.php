<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\registerUser;
use App\Models\User;
use Illuminate\Http\Request;

class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('HumanResource.form');
    }

    public function index2()
    {
        $leave_form = Employees::get();
        return view('HumanResource.leave', compact(['leave_form']));
    }

    public function index3(){
        $application_form = User::get();
        return view('HumanResource.account', compact(['application_form']));
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
        $lf_employee = Employees::find($id);
        return view('HumanResource.view', compact(['lf_employee']));
    }

    public function show2(string $id){

        $application_form = registerUser::find($id);
        return view('HumanResource.viewaccount', compact(['application_form']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

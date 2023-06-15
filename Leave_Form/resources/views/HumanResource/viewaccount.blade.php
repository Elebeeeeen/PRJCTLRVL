@extends('layouts.app')

@section('content')
<style>
    .header {
        background-color: #00B0F0;
        color: white;
        display: flex;
        justify-content: center;
        width: 100%;
        height: 45px;
        padding: 5px;
    }

    .form-label {
        padding-top: 10px;
    }

    .border {
        width: 99%;
        height: 200px;
        border: 5px;
        padding: 10px;
        border-radius: 5px;
        margin-left: 5px;
        display: flex;
    }

    .forCheckbox {
        display: flex;
        justify-content: center;
    }

    .divider {
        padding-left: 100px;
    }
</style>



<div class="card">

    <!-- header -->
    <div class="header">
        <h3> Application Form </h3>
    </div>

    <!-- first row -->
    <div class="row">

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Employee Number</label>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{$application_form['employee_number']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$application_form['last_name']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$application_form['first_name']}}" disabled>
        </div>

        <div class="form-group col-1">
            <label for="requested_by" class="form-label">M.I.</label>
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$application_form['middle_initial']}}" disabled>
        </div>

    </div>


    <!-- second row -->

    <div class="row">

        <div class="form-group col-6">
            <label for="requested_by" class="form-label">Office</label>
            <input type="text" class="form-control" id="office" name="office" value="{{$application_form['office']}}" disabled>
        </div>

        <div class="form-group col-6">
            <label for="requested_by" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$application_form['salary']}}" disabled>
        </div>

    </div>

    <!-- thrid row -->

    <div class="row">

        <div class="form-group col-12">
            <label for="requested_by" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$application_form['email']}}" disabled>
        </div>

    </div>

    <br>

    <!--button-->
    <div class="w-100">
        <div class="float-right">
            <button type="button" id="approve" class="btn btn-primary">Approve</button>
            <button type="button" id="reject" class="btn btn-danger">Reject</button>
        </div>
    </div>
</div>

    @endsection
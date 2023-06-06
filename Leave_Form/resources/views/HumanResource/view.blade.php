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

    #requiredStyle {
        color: #F72C00
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
        <h3> Leave Form </h3>
    </div>

    <!-- first row -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Office</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="office" name="office" value="{{$lf_employees['office']}}" disabled>

        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Last Name</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$lf_employees['last_name']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">First Name</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$lf_employees['first_name']}}" disabled>
        </div>

        <div class="form-group col-1">
            <label for="requested_by" class="form-label">M.I.</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$lf_employees['middle_initial']}}" disabled>
        </div>
    </div>

    <!-- second row -->
    <div class="row">
        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Employee Number</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{$lf_employees['employee_number']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Position</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="position" name="position" value="{{$lf_employees['position']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Salary</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$lf_employees['salary']}}" disabled>
        </div>
    </div>

    <!-- third row -->
    <div class="row">
        <div class="form-group col-12">
            <label for="requested_by" class="form-label">E-mail</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="email" name="email" value="{{$lf_employees['email']}}" disabled>
        </div>
    </div>

    <!-- fourth row -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Type of Leave</label>
            <span id="requiredStyle"> *</span>
            <input class="select2 form-control" name="type_of_leave" id="type_of_leave" value="{{$lf_employees['type_of_leave']}}" disabled>

            </input>
        </div>


        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Date</label>
            <span id="requiredStyle"> *</span>
            <input type="date" class="form-control" id="date" name="date" value="{{$lf_employees['date']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">No. Of Working Days</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="num_working_days" name="num_working_days" value="{{$lf_employees['num_working_days']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Inclusive Dates</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="inclusive_dates" name="inclusive_dates" value="{{$lf_employees['inclusive_dates']}}" disabled>
        </div>
    </div>



    <!-- fifth row (pop-up) -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label titleBox">Additional Info</label>
        </div>
        <div class="border leaveOption"></div>
    </div>
    <br>

    <!-- Sixth row-->
    <div class="row">
        <div class="border">

            <div class="form-group col-6">
                <label for="requested_by" class="form-label">Commutation</label>
                <span id="requiredStyle"> *</span>

                <div class="forCheckbox">
                    <input type="radio" id="radio11" name="commutation" value="Requested" disabled>
                    <label for="requested_by" class="form-label"> Requested</label>

                    <div class="divider">
                        <input type="radio" id="radio12" name="commutation" value="Not Requested" disabled>
                        <label for="requested_by" class="form-label">Not Requested</label>
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="requested_by" class="form-label">Approver</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="approver" name="approver" value="{{$lf_employees['approver']}}" disabled>
            </div>
        </div>
    </div>

    <br>

    <!-- button-->
<script>
    $(document).ready(function() {
        if ("{{$lf_employees['commutation']}}" == $('#radio11').val()) {
            $("#radio11").prop("checked", true);
        } else {
            $("#radio12").prop("checked", true);
        }
        var leave = $('#type_of_leave').val();
        switch (leave) {
            case "Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                $('.leaveOption').append('<div class="form-group col-12" id="same1"> <input type="radio" id="radio1" name="details" value="Within the Philippines" disabled> <label for="requested_by" class="form-label">Within the Philippines</label> <div class="form-group " id="same2"> <input type="radio" id="radio2" name="details" value="Within Abroad" disabled> <label for="requested_by" class="form-label">Within Abroad</label></div> <input type="text" placeholder="Specify" class="form-control" id="specification" name="specification" value="{{$lf_employees["specification"]}}" disabled ></div>');
                $('.leaveOption').append();

                if ("{{$lf_employees['details']}}" == $('#radio1').val()) {
                    $("#radio1").prop("checked", true);
                } else {
                    $("#radio2").prop("checked", true);
                }

                break;

            case "Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                $('.leaveOption').append('<div class="form-group col-4" id="same1"> <input type="radio" id="radio3" name="details" value="In Hospital" disabled> <label for="requested_by" class="form-label">In Hospital</label> <input type="text" placeholder="Illness (Specify)" class="form-control" id="specification" name="specification" value="{{$lf_employees["specification"]}} disabled ></div>');
                $('.leaveOption').append('<div class="form-group col-4" id="same2"> <input type="radio" id="radio4" name="details" value="Out Patient" disabled> <label for="requested_by" class="form-label">Out Patient</label></div>');
                $('.leaveOption').append('<div class="form-group col-4" id="same3"> <input type="radio" id="radio5" name="details" value="In case Leave Benefits for Women" disabled > <label for="requested_by" class="form-label">In case Leave Benefits for Women</label></div>');

                if ("{{$lf_employees['details']}}" == $('#radio3').val()) {
                    $("#radio3").prop("checked", true);
                } else {
                    $("#radio5").prop("checked", true);
                }
                break;

            case "Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Study Leave (Sec. 68, Rule XVI, Omnibus Rules Implementation E.O No. 292)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                $('.leaveOption').append('<div class="form-group col-4" id="same1"> <input type="radio" id="radio6" name="details" value="{{$lf_employees["specification"]}} disabled> <label for="requested_by" class="form-label">Completion of Masters Degree </label></div>');
                $('.leaveOption').append('<div class="form-group col-4" id="same2"> <input type="radio" id="radio7" name="details" value="{{$lf_employees["specification"]}} disabled> <label for="requested_by" class="form-label">BAR/Board Examination Review</label></div>');
                $('.select2').select2({});
                break;

            case "10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Adoption Leave (R.A No. 8552)":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                break;

            case "Others":
                document.getElementById('same1')?.remove();
                document.getElementById('same2')?.remove();
                document.getElementById('same3')?.remove();
                $('.leaveOption').append('<div class="form-group col-4" id="same1"> <input type="radio" id="radio8" name="details" value="{{$lf_employees["specification"]}} disabled> <label for="requested_by" class="form-label">Monetization of Leave Credits </label></div>');
                $('.leaveOption').append('<div class="form-group col-4" id="same2"> <input type="radio" id="radio9" name="details" value="{{$lf_employees["specification"]}} diasbled> <label for="requested_by" class="form-label">Terminal Leave</label></div>');
                $('.select2').select2({});
                break;
        }
    });
</script>
@endsection
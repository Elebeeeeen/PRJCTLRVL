@extends('layouts.app')

@section('content')
<style>
    div.header {
        background-color: #00B0F0;
        color: white;
        display: flex;
        justify-content: center;
        width: 100%;
        height: 45px;
        padding: 5px;
    }

    div.inputBox {
        width: 320px;
        height: 100px;
        padding: 5px 0px 0px 5px;
    }

    div.inputBoxMI {
        width: 83px;
        height: 100px;
        padding: 5px 0px 0px 5px;
    }

    div.inputBox2 {
        width: 347px;
        height: 100pxpx;
        padding: 0px 0px 0px 10px;
    }

    div.inputBox3 {
        width: 99%;
        height: 100px;
        padding: 10px 0px 0px 10px;
    }

    #format {
        background-color: #f2f2f2;
        border-radius: 5px;
        width: 248px;
        height: 38px;

    }

    #requiredStyle {
        color: #F72C00
    }

    #divider {
        width: 10px;
    }

    div.inputBox4 {
        width: 258px;
        height: 100px;
        padding: 10px 0px 0px 10px;
    }

    .inputBox5 {
        width: 400px;
        padding-left: 10px;
        display: block;
    }

    .first {
        height: 100px;
        width: 100px;
    }

    .second {
        height: 100px;
        width: 100px;
        background-color: #f2f2f2;
    }
</style>


<form action="/leaveform/" method="post">
    @CSRF
    @method('POST')
    <div class="card">

        <div class="header">
            <h3> Leave Form </h3>
        </div>

        <!--First row of the leave form-->
        <div class="row">
            <div class="inputBox">
                <label for="requested_by" class="form-label">Office</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="office" name="office">
            </div>

            <div class="inputBox">
                <label for="requested_by" class="form-label">Last Name</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>

            <div class="inputBox">
                <label for="requested_by" class="form-label">First Name</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>

            <div class="inputBoxMI">
                <label for="requested_by" class="form-label">M.I.</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="middle_initial" name="middle_initial">
            </div>
        </div>

        <!--First second of the leave form-->
        <div class="row">
            <div class="inputBox2">
                <label for="requested_by" class="form-label">Employee Number</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="employee_number" name="employee_number">
            </div>

            <div class="inputBox2">
                <label for="requested_by" class="form-label">Position</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="postion" name="position">
            </div>

            <div class="inputBox2">
                <label for="requested_by" class="form-label">Salary</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="salary" name="salary">
            </div>
        </div>

        <!--third of the leave form-->
        <div class="row">
            <div class="inputBox3">
                <label for="requested_by" class="form-label">E-mail</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>

        <!--fourth of the leave form-->
        <div class="row">

            <div class="inputBox4">
                <label for="requested_by" class="form-label">Type of Leave</label>
                <span id="requiredStyle"> *</span>
                <select name="format" id="format">
                    <option selected disabled>Choose your type of leave</option>
                    <option value="vacation_leave">Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementation E.O No. 292)</option>
                    <option value="mandatory_forced_leave">Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementation E.O No. 292)</option>
                    <option value="sick_leave">Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementation E.O No. 292)</option>
                    <option value="maternity_leave">Maternity Leave (R.A No.11210/IRR issuedby CSC, DOLE, and SSS)</option>
                    <option value="paternity_leave">Paternity Leave (R.A. No.8187/ CSC MC No. 71, S. 1998, as amended)</option>
                    <option value="special_privilage_leave">Special Privelage Leave (Sec. 21, Rule XVI, Omnibus Rules Implementation E.O No. 292)</option>
                    <option value="solo_parent_leave">Solo Parent Leave (RA No. 8972/CSC MC No. 8, s. 2004)</option>
                    <option value="study_leave">Study Leave (Sec. 68, Rule XVI, Omnibus Rules Implementation E.O No. 292)</option>
                    <option value="vawc_leave">10-Day VAWC Leave (RA No. 9262/CSC MC No.15, s. 2005)</option>
                    <option value="rehabilitation_leave">Rehabilitation Privilage (Sec. 55, Rule XVI, Omnibus Rules Implementation E.O No. 292)</option>
                    <option value="special_leave_benefit">Special Leave Benefits for Women (RA. No. 9710/ CSC MC No. 25, s. 2010)</option>
                    <option value="special_emergency_leave">Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</option>
                    <option value="adoption_leave">Adoption Leave (R.A No. 8552)</option>
                    <option value="other">Others</option>
                </select>
            </div>

            <div class="inputBox4">
                <label for="requested_by" class="form-label">Date</label>
                <span id="requiredStyle"> *</span>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="inputBox4">
                <label for="requested_by" class="form-label">No. of Working Days</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="no_working_days" name="no_working_days">
            </div>

            <div class="inputBox4">
                <label for="requested_by" class="form-label">Inclusive Dates</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" id="inclusive_dates" name="inclusive_dates">
            </div>
        </div>

        <!--fifth of the leave formlagay mo to sa isang container-->

        <div class="row">
            <div class="number"
        </div>

        <!--sixth of the leave formlagay mo to sa isang container-->

        <!--
         <div class="row">
            <div class="inputBox6">
                <label for="requested_by" class="form-label">Comutation</label>
                <span id="requiredStyle"> *</span>
                <div class="column">
                    <input type="checkbox" id="commutation" name="commutation">
                    <label>Requested</label>

                    <div class="column">
                        <input type="checkbox" id="commutation" name="commutation">
                        <label>Not requested</label>
                    </div>
                </div>
            </div>
        </div>
-->

        <div class="w-100">
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </div>
</form>
@endsection
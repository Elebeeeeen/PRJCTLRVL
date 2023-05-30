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

<form action="/leaveform" method="POST">
    @CSRF
    @method('GET')

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
                <input type="text" class="form-control" placeholder="Ex: CMIO" id="office" name="office">
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Last Name</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Dela Cruz" id="last_name" name="last_name">
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">First Name</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Juan" id="first_name" name="first_name">
            </div>

            <div class="form-group col-1">
                <label for="requested_by" class="form-label">M.I.</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: M" id="middle_initial" name="middle_initial">
            </div>
        </div>

        <!-- second row -->
        <div class="row">
            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Employee Number</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: 1001" id="employee_number" name="employee_number">
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Position</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Employee" id="position" name="position">
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Salary</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: ₱10,000" id="salary" name="salary">
            </div>
        </div>

        <!-- third row -->
        <div class="row">
            <div class="form-group col-12">
                <label for="requested_by" class="form-label">E-mail</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: juandelacruz@gmail.com" id="email" name="email">
            </div>
        </div>

        <!-- fourth row -->
        <div class="row">
        <div class="form-group col-3">
                <label for="requested_by" class="form-label">Type of Leave</label>
                <span id="requiredStyle"> *</span>
                <select class="form-control" name="type_of_leave" id="type_of_leave">
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


            <div class="form-group col-3">
                <label for="requested_by" class="form-label">Date</label>
                <span id="requiredStyle"> *</span>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group col-3">
                <label for="requested_by" class="form-label">No. Of Working Days</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: (1) One day" id="no_working_days" name="no_working_days">
            </div>

            <div class="form-group col-3">
                <label for="requested_by" class="form-label">Inclusive Dates</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: April 26,2023" id="inclusive_dates" name="inclusive_dates">
            </div>
        </div>

        <!-- fifth row (pop-up) -->
        <div class="row">
            <label for="requested_by" class="form-label">Pop-up</label>
            <div class="border">

                <div class="form-group col-6">
                    <input type="checkbox" id="checkbox1" name="checkbox1">
                    <label for="requested_by" class="form-label">Within the Philippines</label>
                    <input type="text" placeholder="Specify" class="form-control" id="pop_up" name="pop_up">
                </div>

                <div class="form-group col-6">
                    <input type="checkbox" id="checkbox2" name="checkbox2">
                    <label for="requested_by" class="form-label">Within Abroad</label>
                    <input type="text" placeholder="Specify" class="form-control" id="pop_up" name="pop_up">
                </div>
            </div>
        </div>
        <br>
        <!-- Sixth row-->
        <div class="row">
            <div class="border">

                <div class="form-group col-6">
                    <label for="requested_by" class="form-label">Commutation</label>
                    <span id="requiredStyle"> *</span>

                    <div class="forCheckbox">
                        <input type="checkbox" id="checkbox3" name="checkbox3">
                        <label for="requested_by" class="form-label"> Requested</label>

                        <div class="divider">
                            <input type="checkbox" id="checkbox4" name="checkbox4">
                            <label for="requested_by" class="form-label">Not Requested</label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-6">
                    <label for="requested_by" class="form-label">Approver</label>
                    <span id="requiredStyle"> *</span>
                    <input type="text" class="form-control" placeholder="Ex: Approver" id="email" name="email">
                </div>
            </div>
        </div>

        <br>

        <!--button-->
        <div class="w-100">
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </div>

</form>

@endsection
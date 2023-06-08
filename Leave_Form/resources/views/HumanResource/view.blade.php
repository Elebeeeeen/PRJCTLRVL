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


<!--viewing leave form -->
<div class="card">

    <!-- header -->
    <div class="header">
        <h3> Leave Form </h3>
    </div>

    <!-- first row -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Office</label>
            <input type="text" class="form-control" id="office" name="office" value="{{$lf_employee['office']}}" disabled>

        </div>
        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Employee</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$lf_employee['last_name']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$lf_employee['first_name']}}" disabled>
        </div>

        <div class="form-group col-1">
            <label for="requested_by" class="form-label">M.I.</label>
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$lf_employee['middle_initial']}}" disabled>
        </div>
    </div>

    <!-- second row -->
    <div class="row">
        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Employee Number</label>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{$lf_employee['employee_number']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{$lf_employee['position']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$lf_employee['salary']}}" disabled>
        </div>
    </div>

    <!-- third row -->
    <div class="row">
        <div class="form-group col-12">
            <label for="requested_by" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$lf_employee['email']}}" disabled>
        </div>
    </div>

    <!-- fourth row -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Type of Leave</label>
            <input class="select2 form-control" name="type_of_leave" id="type_of_leave" value="{{$lf_employee['type_of_leave']}}" disabled>

            </input>
        </div>


        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$lf_employee['date']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">No. Of Working Days</label>
            <input type="text" class="form-control" id="num_working_days" name="num_working_days" value="{{$lf_employee['num_working_days']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Inclusive Dates</label>
            <input type="text" class="form-control" id="inclusive_dates" name="inclusive_dates" value="{{$lf_employee['inclusive_dates']}}" disabled>
        </div>
    </div>


    <!-- fifth row (pop-up) -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label titleBox">Additional Info</label>
        </div>
        <div class="border leaveOption"></div>

        <!-- wala patayong inilalabas dito -->

    </div>
    <br>

    <!-- Sixth row-->
    <div class="row">
        <div class="border">

            <div class="form-group col-6">
                <label for="requested_by" class="form-label">Commutation</label>

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
                <input type="text" class="form-control" id="approver" name="approver" value="{{$lf_employee['approver']}}">
            </div>
        </div>
    </div>

    <br>
    <div class="w-100">
        <div class="float-right">
            <button type="button" id="approve" class="btn btn-primary">Approve</button>
            <button type="button" id="reject" class="btn btn-danger">Reject</button>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        if ("{{$lf_employee['commutation']}}" == $('#radio11').val()) {
            $("#radio11").prop("checked", true);
        } else {
            $("#radio12").prop("checked", true);
        }

        let vacation_form = $($('.leaveOption div')[0]);
        let sick_form = $($('.leaveOption div')[3]);
        let study_form = $($('.leaveOption div')[7]);
        let other = $($('.leaveOption div')[10]);


        $('#type_of_leave').select2({

            width: '100%',
            ajax: {
                url: '/leavelist',
                type: 'GET',
                processResults: function(data, params) {
                    return {
                        results: data
                    };
                }
            }

        }).on('change', function() {
            console.log(this.value);

            switch (this.value) {
                // Vacation
                case '1':
                    vacation_form.css('display', 'block')
                    sick_form.css('display', 'none')
                    study_form.css('display', 'none')
                    other.css('display', 'none')
                    break;

                    //walang laman
                case '2':
                case '4':
                case '5':
                case '6':
                case '7':
                case '9':
                case '10':
                case '11':
                case '12':
                case '13':

                    vacation_form.css('display', 'none')
                    sick_form.css('display', 'none')
                    study_form.css('display', 'none')
                    other.css('display', 'none')
                    break;

                    //Sick
                case '3':
                    vacation_form.css('display', 'none')
                    sick_form.css('display', 'block')
                    study_form.css('display', 'none')
                    other.css('display', 'none')
                    break;

                    //study 
                case '8':
                    vacation_form.css('display', 'none')
                    sick_form.css('display', 'none')
                    study_form.css('display', 'block')
                    other.css('display', 'none')
                    break;

                case '14':
                    vacation_form.css('display', 'none')
                    sick_form.css('display', 'none')
                    study_form.css('display', 'none')
                    other.css('display', 'block')
                    break;

            }
        });
    });
</script>
@endsection
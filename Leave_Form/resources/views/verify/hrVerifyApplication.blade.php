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
        height: auto;
        border: 5px;
        padding: 10px;
        border-radius: 5px;
        margin-left: 5px;
        margin-bottom: 10px;
        display: flex;
    }

    .forCheckbox {
        display: flex;
        justify-content: center;
    }


    #align {
        padding-top: 18px;
    }
</style>


<div class="card">

    <!-- header -->
    <div class="header">
        <h3> Leave Form (hr)</h3>
    </div>


    <!-- first row -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Office</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="office" name="office" value="{{$lf_employee['office']}}" disabled>

        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$lf_employee['last_name']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">First Name</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$lf_employee['first_name']}}" disabled>
        </div>

        <div class="form-group col-1">
            <label for="requested_by" class="form-label">M.I.</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$lf_employee['middle_initial']}}" disabled>
        </div>
    </div>


    <!-- second row -->
    <div class="row">

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$lf_employee['email']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Employee Number</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{$lf_employee['employee_number']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Position</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="position" name="position" value="{{$lf_employee['position']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Salary</label>
            <span id="requiredStyle"> *</span>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$lf_employee['salary']}}" disabled>
        </div>
    </div>

    <!-- third row -->
    <div class="row">

        <div class="form-group col-11">
                <label for="requested_by" class="form-label">Inclusive Date</label>
                <span id="requiredStyle"> *</span>

                <input type="text" class="form-control date-picker" id="inclusive_dates" name="inclusive_dates" value="{{$lf_employee['inclusive_dates']}}" disabled>
            </div>

        <div class="form-group col-1">
            <label for="requested_by" class="form-label">No.</label>
            <input type="text" class="form-control" id="num_working_days" name="num_working_days" value="{{$lf_employee['num_working_days']}}" disabled>
        </div>

    </div>

    <!-- new row -->

    <div class="row">

        <div class="form-group col-8">
            <label for="requested_by" class="form-label">Type of Leave</label>
            <input class="select2 form-control" name="type_of_leave" id="type_of_leave" value="{{$lf_employee['type_of_leave']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Date of Filing</label>
            <span id="requiredStyle"> *</span>
            <input type="date" class="form-control" id="date" name="date" value="{{$lf_employee['date']}}" disabled>
        </div>
    </div>


    <!-- fifth row (pop-up) -->
    <div class="row">

        <div class="leaveOption">

            <!-- vacation leave 0 -->
            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div id="same1">
                    <input type="radio" id="radio" class="details" name="details" value="Within the Philippines" disabled>
                    <label for="requested_by" class="form-label">Within the Philippines</label>
                </div>

                <div id="same2">
                    <input type="radio" id="radio" class="details" name="details" value="Within Aborad" disabled>
                    <label for="requested_by" class="form-label">Within Abroad</label>

                    <input type="text" placeholder="Specify" class="form-control" id="specification" name="specification" value="{{$lf_employee['specification']}}" style="width: 1600px" disabled>
                </div>
            </div>
            <!-- end of vacation leave -->

            <!-- sick leave 3 -->

            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div id="same1">
                    <input type="radio" id="radio3" class="details" name="details" value="In Hospital" disabled>
                    <label for="requested_by" class="form-label">In Hospital</label>
                </div>

                <div id="same2">
                    <input type="radio" id="radio4" class="details" name="details" value="Out Patient" disabled>
                    <label for="requested_by" class="form-label">Out Patient</label>
                </div>

                <div id="same3">
                    <input type="radio" id="radio5" class="details" name="details" value="In case Leave Benefits for Women" disabled>
                    <label for="requested_by" class="form-label">In case Leave Benefits for Women</label>

                    <input type="text" placeholder="Specify" class="form-control" id="specification" name="specification" value="{{$lf_employee['specification']}}" style="width: 1600px" disabled>
                </div>

            </div>
            <!-- end of sick leave -->


            <!-- study leave 7 -->
            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div id="same1">
                    <input type="radio" id="radio6" class="details" name="details" value="masters" disabled>
                    <label for="requested_by" class="form-label">Completion of Masters Degree</label>
                </div>

                <div id="same2">
                    <input type="radio" id="radio7" class="details" name="details" value="barBoard" disabled>
                    <label for="requested_by" class="form-label">BAR/Board Examination Review</label>
                </div>

            </div>
            <!-- end of study leave -->

            <!-- others 10 -->
            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div id="same1">
                    <input type="radio" id="radio8" class="details" name="details" value="monetization" disabled>
                    <label for="requested_by" class="form-label">Monetization of leave Credits</label>
                </div>

                <div id="same2">
                    <input type="radio" id="radio9" class="details" name="details" value="terminal" disabled>
                    <label for="requested_by" class="form-label">Terminal Leave</label>
                </div>

            </div>
            <!-- end of others -->

        </div>
    </div>


    <!-- Sixth row-->
    <div class="row">

        <div class="border">
            <div class="form-group col-12">
                <label for="requested_by" class="form-label">Commutation</label>
                <span id="requiredStyle"> *</span>

                <div class="forCheckbox">
                    <div class="form-group col-3" id="same1">
                        <input type="radio" id="radio11" name="commutation" value="Requested" disabled>
                        <label for="requested_by" class="form-label"> Requested</label>
                    </div>

                    <div class="form-group col-3" id="same1">
                        <input type="radio" id="radio12" name="commutation" value="Not Requested" disabled>
                        <label for="requested_by" class="form-label">Not Requested</label>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <!-- start of seventh row -->
    <div class="row">
        <div class="form-group col-12">
            <label for="requested_by" class="form-label">Approver</label>
            <input type="text" class="form-control" id="approver" name="approver" value="{{$lf_employee['approver']}}">
        </div>
    </div>
    <!-- end of seventh row -->

    <br>

    <!--button-->
    <div class="w-100">
        <div class="float-right">
            <form action="/verifyingApplicationHR/{{$id}}" data-id="{{$id}}" id="approve_form" method="POST">
                @METHOD('PUT')
                <button type="submit" id="approve" value="Verified by HR" class="btn btn-success">Verify</button>
            </form>
        </div>
    </div>

</div>


<script>
    $(document).ready(function() {


        //radio button for commutation
        if ("{{$lf_employee['commutation']}}" == $('#radio11').val()) {
            $("#radio11").prop("checked", true);
        } else {
            $("#radio12").prop("checked", true);
        }

        // Calling new variable to determine array accordingly (type of leave)
        let vacation_form = $($('.leaveOption div')[0]);
        let sick_form = $($('.leaveOption div')[3]);
        let study_form = $($('.leaveOption div')[7]);
        let other = $($('.leaveOption div')[10]);

        //Viewing the radio button

        //vacation
        let radio1 = $($('.details')[0]);
        let radio2 = $($('.details')[1]);

        //sick
        let radio3 = $($('.details')[2]);
        let radio4 = $($('.details')[3]);
        let radio5 = $($('.details')[4]);

        //study
        let radio6 = $($('.details')[5]);
        let radio7 = $($('.details')[6]);

        //other
        let radio8 = $($('.details')[7]);
        let radio9 = $($('.details')[8]);

        //Displaying the leave of type
        function clearType() {
            vacation_form.css('display', 'none')
            sick_form.css('display', 'none')
            study_form.css('display', 'none')
            other.css('display', 'none')
        }

        //using switch case to call the new variable in array and applying the radio button to be viewed
        switch (@json($lf_employee -> leaveType)) {

            // Vacation
            case '1':
                clearType()
                vacation_form.css('display', 'block');
                (@json($lf_employee -> details) == radio1.val()) ? radio1.prop('checked', true): radio2.prop('checked', true);
                break;

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
                clearType()
                break;

                //Sick
            case '3':
                clearType()
                sick_form.css('display', 'block');
                (@json($lf_employee -> details) == radio3.val()) ? radio3.prop('checked', true)
                : (@json($lf_employee -> details) == radio4.val()) ? radio4.prop('checked', true) 
                : radio5.prop('checked', true);
                break;

                //study 
            case '8':
                clearType()
                study_form.css('display', 'block');
                (@json($lf_employee -> details) == radio6.val()) ? radio6.prop('checked', true): radio7.prop('checked', true);
                break;

            case '14':
                clearType()
                other.css('display', 'block')
                    (@json($lf_employee -> details) == radio8.val()) ? radio8.prop('checked', true) : radio9.prop('checked', true);
                break;

        }
    });

    //sweet alert for approve and reject
    let errorMessages = '';

    //getting id of the form for button
    var form = document.getElementById('approve_form');

    //querying the usage of button
    var buttons = form.querySelectorAll('button[type="submit"]');

    buttons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            var status = button.value;
            let formData = new FormData($('#approve_form')[0]);

            if (status == "Verified by HR") {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: "You want to verify this application?",
                    confirmButtonText: "Yes",
                    confirmButtonColor: '#228B22',

                }).then((result) => {
                    if (result.isConfirmed) {
                        formData.append('status', status);
                        Swal.fire({
                            title: 'Now Loading',
                            html: '<b> Please wait... </b>',
                            timer: 15000,
                            didOpen: () => {
                                Swal.showLoading()
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                        $.ajax({
                            url: '/verifyingApplicationHR/' + $('#approve_form').attr("data-id"),
                            method: "POST",
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: formData,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Approve',
                                        text: "The user applicaiton has been approve!",
                                        confirmButtonColor: '#228B22',
                                        confirmButtonText: "confirm",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "/approvalApplicationHR/";
                                        }
                                    })
                                } else {
                                    for (let i = 0; i < response.errors.length; i++) {
                                        errorMessages += "-" + response.errors[i] + "\n";
                                    }
                                    Swal.fire({
                                        html: '<pre>' + errorMessages + '</pre>',
                                        customClass: {
                                            popup: 'format-pre'
                                        },
                                        title: 'Error!',
                                        icon: 'error',
                                        confirmButtonText: 'Okay'
                                    })
                                    errorMessages = "";
                                }
                            }
                        });
                    } 
                });
            } 
        })
    })
</script>
@endsection
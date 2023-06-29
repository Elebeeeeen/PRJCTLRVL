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
        <h3> Leave Form </h3>
    </div>


    <!-- first row -->
    <div class="row">
        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Office</label>
            <input type="text" class="form-control" id="office" name="office" value="{{$division_form['office']}}" disabled>

        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$division_form['last_name']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$division_form['first_name']}}" disabled>
        </div>

        <div class="form-group col-1">
            <label for="requested_by" class="form-label">M.I.</label>
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$division_form['middle_initial']}}" disabled>
        </div>
    </div>


    <!-- second row -->
    <div class="row">

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$division_form['email']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Employee Number</label>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{$division_form['employee_number']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{$division_form['position']}}" disabled>
        </div>

        <div class="form-group col-3">
            <label for="requested_by" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$division_form['salary']}}" disabled>
        </div>
    </div>

    <!-- third row -->

    <div class="row">

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">No. Of Working Days</label>
            <input type="text" class="form-control" id="num_working_days" name="num_working_days" value="{{$division_form['num_working_days']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Inclusive Date</label>
            <span>(start)</span>
            <input type="text" class="form-control" id="startdate" name="startdate" value="{{$division_form['start_date']}}" disabled>
        </div>


        <div class="form-group col-4" id="align">
            <label for="requested_by" class="form-label"></label>
            <span>(end)</span>
            <input type="text" class="form-control" id="enddate" name="enddate" value="{{$division_form['end_date']}}" disabled>
        </div>

    </div>

    <!-- new row -->

    <div class="row">

        <div class="form-group col-8">
            <label for="requested_by" class="form-label">Type of Leave</label>
            <input class="select2 form-control" name="type_of_leave" id="type_of_leave" value="{{$division_form['type_of_leave']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$division_form['date']}}" disabled>
        </div>
    </div>



    <!-- fifth row (pop-up) -->
    <div class="row">

        <div class="border leaveOption">

            <!-- vacation leave 0 -->
            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div class="form-group col-12" id="same1">
                    <input type="radio" id="radio" class="details" name="details" value="Within the Philippines" disabled>
                    <label for="requested_by" class="form-label">Within the Philippines</label>
                </div>

                <div class="form-group col-12" id="same2">
                    <input type="radio" id="radio" class="details" name="details" value="Within Aborad" disabled>
                    <label for="requested_by" class="form-label">Within Abroad</label>

                    <input type="text" class="form-control" id="specification" name="specification" value="{{$division_form['specification']}}" style="width: 100%" disabled>
                </div>
            </div>
            <!-- end of vacation leave -->

            <!-- sick leave 3 -->

            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div class="form-group col-12" id="same1">
                    <input type="radio" id="radio3" class="details" name="details" value="In Hospital" disabled>
                    <label for="requested_by" class="form-label">In Hospital</label>
                </div>

                <div class="form-group col-12" id="same2">
                    <input type="radio" id="radio4" class="details" name="details" value="Out Patient" disabled>
                    <label for="requested_by" class="form-label">Out Patient</label>
                </div>

                <div class="form-group col-12" id="same3">
                    <input type="radio" id="radio5" class="details" name="details" value="In case Leave Benefits for Women" disabled>
                    <label for="requested_by" class="form-label">In case Leave Benefits for Women</label>

                    <input type="text" class="form-control" id="specification" name="specification" value="{{$division_form['specification']}}" style="width: 100%" disabled>
                </div>

            </div>
            <!-- end of sick leave -->


            <!-- study leave 7 -->
            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div class="form-group col-12" id="same1">
                    <input type="radio" id="radio6" class="details" name="details" value="masters" disabled>
                    <label for="requested_by" class="form-label">Completion of Masters Degree</label>
                </div>

                <div class="form-group col-12" id="same2">
                    <input type="radio" id="radio7" class="details" name="details" value="barBoard" disabled>
                    <label for="requested_by" class="form-label">BAR/Board Examination Review</label>
                </div>

            </div>
            <!-- end of study leave -->

            <!-- others 10 -->
            <div class="form-group col-12" style="display:none">

                <label for="requested_by" class="form-label"> Additional Info </label>
                <span id="requiredStyle"> *</span>

                <div class="form-group col-12" id="same1">
                    <input type="radio" id="radio8" class="details" name="details" value="monetization" disabled>
                    <label for="requested_by" class="form-label">Monetization of leave Credits</label>
                </div>

                <div class="form-group col-12" id="same2">
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
            <input type="text" class="form-control" id="approver" name="approver" value="{{$division_form['approver']}}">
        </div>
    </div>
    <!-- end of seventh row -->

    <div class="w-100">
        <div class="float-right">
            <form action="/headHR/{{$id}}" data-id="{{$id}}" id="approve_form" method="POST">
                @METHOD('PUT')
                <button type="submit" id="approve" value="Approved" class="btn btn-success">Approve</button>
                <button type="submit" id="reject" value="Rejected" class="btn btn-danger">Reject</button>
            </form>
        </div>
    </div>


</div>






<script>
         //sweet alert for approve and reject
    //ayos na
    let errorMessages = '';

    var form = document.getElementById('approve_form');
    var buttons = form.querySelectorAll('button[type="submit"]');

    buttons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            var status = button.value;
            let formData = new FormData($('#approve_form')[0]);

            if (status == "Approved") {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: "You want to approve this application?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel",


                }).then((result) => {
                    if (result.isConfirmed) {
                        formData.append('status', status);
                        $.ajax({
                            url: '/headHR/' + $('#approve_form').attr("data-id"),
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
                                            window.location.href = "/headHR/";
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
                    } else {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to cancel it?",
                            icon: 'question',
                            confirmButtonText: "confirm",
                        })
                    }
                });
            } else if (status == "Rejected") {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text:'Do you want to reject this application?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "confirm",
                    cancelButtonColor: '#d33',
                    cancelButtonText: "cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'state the reason:',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: "confirm",
                            cancelButtonColor: '#d33',
                            cancelButtonText: "cancel",
                            input: "text",
                            inputValidator: (value) => {
                                if (!value) {
                                    return "Please state the reason.";
                                }
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                let reason = result.value;
                                formData.append('status', status);
                                formData.append('reason', reason);
                                $.ajax({
                                    url: '/headHR/' + $('#approve_form').attr("data-id"),
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
                                                title: '',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: "confirm",
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = "/headHR/";
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
                            } else {
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'Do you want to cancel it?',
                                    icon: 'question ',
                                    showCancelButton: true,
                                    confirmButtonText: "Yes",
                                })
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'Do you want to cancel it?',
                            icon: 'question',
                            confirmButtonText: "Yes",
                        })
                    }
                });

            }
        })
    })

</script>

@endsection
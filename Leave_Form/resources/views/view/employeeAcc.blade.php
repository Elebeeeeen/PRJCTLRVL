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

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Office</label>
            <input type="text" class="form-control" id="office" name="office" value="{{$application_form['office']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$application_form['salary']}}" disabled>
        </div>

        <div class="form-group col-4">
            <label for="requested_by" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{$application_form['position']}}" disabled>
        </div>

    </div>

    <!-- thrid row -->

    <div class="row">

        <div class="form-group col-12">
            <label for="requested_by" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$application_form['email']}}" disabled>
        </div>

    </div>

    <form action="/AccountHR/{{$id}}" data-id="{{$id}}" id="approve_form" method="POST">
        <div class="row">
            <div class="form-group col-3">  
                <label for="requested_by" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>

        </div>

        <br>

        <!--button-->
        <div class="w-100">
            <div class="float-right">
                @METHOD('POST   ')
                <button type="submit" id="approve" value="Approved by HR" class="btn btn-primary">Approve</button>
                <button type="submit" id="reject" value="Rejected by HR" class="btn btn-danger">Reject</button>
            </div>
        </div>
    </form>

</div>

<script>
    let errorMessages = '';
    var form = document.getElementById('approve_form');
    var buttons = form.querySelectorAll('button[type="submit"]');

    buttons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            var status = button.value;
            let formData = new FormData($('#approve_form')[0]);

            if (status == "Approved by HR") {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: "You want to approve this application?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",


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
                            url: '/emailAccounts/' + $('#approve_form').attr("data-id"),
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
                                        title: 'Success',
                                        text: response.message,
                                        confirmButtonText: "confirm",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "/acceptAccounts";
                                            if (result.isConfirmed) {
                                                formData.append('status', status);
                                                $.ajax({
                                                    url: '/acceptAccounts/' + response.id,

                                                    method: "POST",
                                                    processData: false,
                                                    contentType: false,
                                                    cache: false,
                                                    data: formData,
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                });
                                            }
                                        }
                                    })
                                    // alert(response.id);
                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Hello',
                                        text: response,
                                        confirmButtonText: "Ok",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            e.preventDefault();
                                        }
                                    })
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
                            title: 'Are you sure you want to cancel it?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonText: "confirm",
                        })
                    }
                });
            } else if (status == "Rejected by HR") {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure you want to reject?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "confirm",
                    cancelButtonText: "cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'State the reason:',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: "confirm",
                            cancelButtonText: "cancel",
                            input: "text",
                            inputValidator: (value) => {
                                if (!value) {
                                    return "please state the reason.";
                                }
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                let reason = result.value;
                                formData.append('status', status);
                                formData.append('reason', reason);
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
                                    url: '/emailAccounts/' + $('#approve_form').attr("data-id"),
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
                                                    window.location.href = "/viewAcceptAccounts";
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
                                    title: 'Are you sure you want to cancel it?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: "Yes",
                                })
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Are you sure want to cancel it?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: "Yes",
                        })
                    }
                });

            }
        })
    })
</script>

@endsection
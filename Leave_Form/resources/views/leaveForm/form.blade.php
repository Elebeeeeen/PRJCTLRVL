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
        margin-bottom: 15px;
    }

    #requiredStyle {
        color: #F72C00
    }

    .border {
        width: 99%;
        height: auto;
        border: 5px;
        padding: 10px;
        border-radius: 5px;
        margin-left: 5px;
    }

    .forCheckbox {
        display: flex;
        justify-content: center;
    }

    #align {
        padding-top: 8px;
    }
</style>

<form action="/leaveform" id="submitForm" method="POST">
    @CSRF

    <div class="card">

        <!-- header -->
        <div class="header">
            <h3> Leave Form </h3>
        </div>


        <!-- start of first row -->

        <div class="row">
            <div class="form-group col-3">
                <label for="requested_by" class="form-label">Office</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: CMIO" id="office" name="office" value="{{ Auth::user()->office}}" readonly>

            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Last Name</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Dela Cruz" id="last_name" name="last_name" value="{{ Auth::user()->last_name}}" readonly>
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">First Name</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Juan" id="first_name" name="first_name" value="{{ Auth::user()->first_name}}" readonly>
            </div>

            <div class="form-group col-1">
                <label for="requested_by" class="form-label">M.I.</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: M" id="middle_initial" name="middle_initial" value="{{ Auth::user()->middle_initial}}" readonly>
            </div>

        </div>

        <!-- end of first row -->

        <!-- start of second row -->

        <div class="row">


            <div class="form-group col-3">
                <label for="requested_by" class="form-label">E-mail</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: juandelacruz@gmail.com" id="email" name="email" value="{{ Auth::user()->email}}" readonly>
            </div>


            <div class="form-group col-3">
                <label for="requested_by" class="form-label">Employee Number</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: 1001" id="employee_number" name="employee_number" value="{{ Auth::user()->employee_number}}" readonly>
            </div>


            <div class="form-group col-3">
                <label for="requested_by" class="form-label">Position</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Employee" id="position" name="position" value="{{ Auth::user()->position}}" readonly>
            </div>

            <div class="form-group col-3">
                <label for="requested_by" class="form-label">Salary</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: ₱10,000" id="salary" name="salary" value="{{ Auth::user()->salary}}" readonly>
            </div>

        </div>

        <!-- end of second row -->


        <!-- start of third row -->

        <div class="row">

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">No. Of Working Days</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: (1) One day" id="num_working_days" name="num_working_days">
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Inclusive Date</label>
                <span id="requiredStyle"> *</span>
                <span>(start)</span>
                <input type="text" class="form-control" id="datepicker">
                <!-- <input type="date" class="form-control" id="startdate" name="startdate" required> -->
            </div>

            <div class="form-group col-4" id="align">
                <label for="requested_by" class="form-label"></label>
                <span>(end)</span>
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>

        </div>

        <!-- new row -->

        <div class="row">

            <div class="form-group col-8">
                <label for="requested_by" class="form-label">Type of Leave</label>
                <span id="requiredStyle"> *</span>
                <select class="select2 form-control" name="type_of_leave" id="type_of_leave"></select>
            </div>

            <div class="form-group col-4">
                <label for="requested_by" class="form-label">Date of Filing</label>
                <span id="requiredStyle"> *</span>
                <input type="date" class="form-control" id="date" name="date">
            </div>
        </div>


        <!-- end of third row -->


        <!-- start of fifth row (pop-up) -->

        <div class="row">

            <div class="leaveOption">


                <!-- vacation leave 0 -->
                <div class=" form-group col-12" style="display:none">

                    <label for="requested_by" class="form-label"> Additional Info </label>
                    <span id="requiredStyle"> *</span>

                    <div id="same1">
                        <input type="radio" id="radio1" name="details" value="Within the Philippines">
                        <label for="requested_by" class="form-label">Within the Philippines</label>
                    </div>

                    <div id="same2">
                        <input type="radio" id="radio2" name="details" value="Within Abroad">
                        <label for="requested_by" class="form-label">Within Abroad</label>

                        <input type="text" placeholder="Specify" class="form-control" id="specification" name="specification1" style="width: 1600px">
                    </div>
                </div>
                <!-- end of vacation leave -->


                <!-- sick leave 3 -->

                <div class="form-group col-12" style="display:none">

                    <label for="requested_by" class="form-label"> Additional Info </label>
                    <span id="requiredStyle"> *</span>

                    <div id="same1">
                        <input type="radio" id="radio1" name="details" value="In Hospital">
                        <label for="requested_by" class="form-label">In Hospital</label>
                    </div>

                    <div id="same2">
                        <input type="radio" id="radio2" name="details" value="Out Patient">
                        <label for="requested_by" class="form-label">Out Patient</label>
                    </div>

                    <div  id="same3">
                        <input type="radio" id="radio3" name="details" value="In case Leave Benefits for Women">
                        <label for="requested_by" class="form-label">In case Leave Benefits for Women</label>

                        <input type="text" placeholder="Specify" class="form-control" id="specification" name="specification2" style="width: 1600px">
                    </div>

                </div>
                <!-- end of sick leave -->

                <!-- study leave 7 -->
                <div class="form-group col-12" style="display:none">

                    <label for="requested_by" class="form-label"> Additional Info </label>
                    <span id="requiredStyle"> *</span>

                    <div id="same1">
                        <input type="radio" id="radio1" name="details" value="masters">
                        <label for="requested_by" class="form-label">Completion of Masters Degree</label>
                    </div>

                    <div id="same2">
                        <input type="radio" id="radio2" name="details" value="barBoard">
                        <label for="requested_by" class="form-label">BAR/Board Examination Review</label>
                    </div>

                </div>
                <!-- end of study leave -->

                <!-- others 10 -->
                <div class="form-group col-12" style="display:none">

                    <label for="requested_by" class="form-label"> Additional Info </label>
                    <span id="requiredStyle"> *</span>

                    <div id="same1">
                        <input type="radio" id="radio1" name="details" value="monetization">
                        <label for="requested_by" class="form-label">Monetization of leave Credits</label>
                    </div>

                    <div id="same2">
                        <input type="radio" id="radio2" name="details" value="terminal">
                        <label for="requested_by" class="form-label">Terminal Leave</label>
                    </div>

                </div>
                <!-- end of others -->



            </div>

        </div>

        <!-- end of fifth row -->



        <!-- start of sixth row -->
        <div class="row">

            <div class="border">
                <div class="form-group col-12">
                    <label for="requested_by" class="form-label">Commutation</label>
                    <span id="requiredStyle"> *</span>

                    <div class="forCheckbox">
                        <div class="form-group col-3" id="same1">
                            <input type="radio" id="radio11" name="commutation" value="Requested">
                            <label for="requested_by" class="form-label"> Requested</label>
                        </div>

                        <div class="form-group col-3" id="same1">
                            <input type="radio" id="radio12" name="commutation" value="Not Requested">
                            <label for="requested_by" class="form-label">Not Requested</label>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- end of sixth row -->

        <br>

        <!-- start of seventh row -->
        <div class="row">
            <div class="form-group col-12">
                <label for="requested_by" class="form-label">Approver</label>
                <span id="requiredStyle"> *</span>
                <input type="text" class="form-control" placeholder="Ex: Approver" id="approver" name="approver">
            </div>
        </div>
        <!-- end of seventh row -->



        <!--just button-->
        <div class="w-100">
            <div class="float-right">
                <button type="submit" id="submitForm" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </div>
</form>


<script>
    $(document).ready(function() {

        $('#datepicker').datepicker();
        
        // Calling new variable to determine array accordingly (type of leave)
        let vacation_form = $($('.leaveOption div')[0]);
        let sick_form = $($('.leaveOption div')[3]);
        let study_form = $($('.leaveOption div')[7]);
        let other = $($('.leaveOption div')[13]);

        //Displaying the leave of type
        function clearType() {
            vacation_form.css('display', 'none')
            sick_form.css('display', 'none')
            study_form.css('display', 'none')
            other.css('display', 'none')
        }


        //Select 2
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


            //using switch case to call the new variable in array
        }).on('change', function() {
            switch (this.value) {
                // Vacation
                case '1':
                    clearType()
                    vacation_form.css('display', 'block')
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
                    sick_form.css('display', 'block')
                    break;

                    //study 
                case '8':
                    clearType()
                    study_form.css('display', 'block')
                    break;

                case '14':
                    clearType()
                    other.css('display', 'block')
                    break;

            }
        });
    });

    //submitting the form 

    let errorMessages = '';
    $("#submitForm").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData($('#submitForm')[0]);
        Swal.fire({
            title: "Are you sure?",
            text: 'You want to submit this application?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirm",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/leaveform",
                    method: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'You can now view and print your leave form. Wait to notify in your email to be approved.',
                                icon: 'success',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/leaveform/";
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
                }); //AJAX
            }
        });
    });
</script>


@endsection
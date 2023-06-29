<x-laravel-ui-adminlte::adminlte-layout>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>


            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Registration Form</p>

                    <form method="POST" action="/registration" id="register_form" autocomplete="off">
                        @CSRF

                        <!-- first row -->

                        <div class="row">
                            <div class="input-group mb-3">
                                <input type="text" name="employee_number" class="form-control @error('employee_number') is-invalid @enderror" value="{{ old('employee_number') }}" placeholder="Emp No.">

                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-address-card"></span>
                                    </div>
                                </div>

                                @error('employee_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Last Name">

                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-user"></span>
                                    </div>
                                </div>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="First Name">

                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-user"></span>
                                    </div>
                                </div>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="input-group mb-3">
                                <input type="text" name="middle_initial" class="form-control @error('middle_initial') is-invalid @enderror" value="{{ old('middle_initial') }}" placeholder="M.I." maxlength="3">

                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-user"></span>
                                    </div>
                                </div>

                                @error('middle_initial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail">

                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-envelope"></span>
                                    </div>
                                </div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="office" class="form-control @error('office') is-invalid @enderror" value="{{ old('office') }}" placeholder="Office">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-building"></span>
                                    </div>
                                </div>

                                @error('office')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" placeholder="Position">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-building"></span>
                                    </div>
                                </div>

                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" placeholder="Salary">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-money-bill"></span>
                                    </div>
                                </div>

                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" id="register_form" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('login') }}" class="text-center">I already have a account</a>
                </div>
                <!-- /.form-box -->
            </div>
            <!-- /.card -->
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->

        <script>
            $(document).ready(function() {
                $("#register_form").submit(function(e) {
                    e.preventDefault();
                    let formData = new FormData($('#register_form')[0]);
                    $.ajax({
                        url: "/registration",
                        method: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: response,
                                icon: 'success',
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                // if (result.isConfirmed) {
                                //     window.location.href = "/login";
                                // }
                            })
                        },
                        error: function() {
                            console.log("no");
                        }
                    }); //AJAX
                });
            })
        </script>

    </body>

</x-laravel-ui-adminlte::adminlte-layout>
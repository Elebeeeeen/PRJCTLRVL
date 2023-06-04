<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>


            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register</p>

                    <form method="post" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <div class="row input-group mb-3">
                            <div class="col-4">
                                <input type="text" name="employee_number" class="form-control @error('employee_number') is-invalid @enderror" value="{{ old('employee_number') }}" placeholder="Emp No.">
                                <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div> -->
                                @error('employee_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-8">
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Last Name">
                                <!-- <div class="input-group-append">
                                <div class="input-group-text"></div>
                            </div> -->
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row input-group mb-3">
                            <div class="col-4">
                                <input type="text" name="middle_initial" class="form-control @error('middle_initial') is-invalid @enderror" value="{{ old('middle_initial') }}" placeholder="M.I." maxlength="3">
                                <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div> -->
                                @error('middle_initial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-8">
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="First Name">
                                <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div> -->
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail">
                            <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div> -->
                            @error('email') 
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="office" class="form-control @error('office') is-invalid @enderror" value="{{ old('office') }}" placeholder="Office">
                            <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div> -->
                            @error('office')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="input-group mb-3">
                            <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" placeholder="Salary">
                            <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div> -->
                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div> -->
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                            <!-- <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div> -->
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
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
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
    </body>

</x-laravel-ui-adminlte::adminlte-layout>
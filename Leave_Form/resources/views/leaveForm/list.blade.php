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

    #btnGroup {
        width: 90px;
        justify-content: center;
    }
</style>


<div class="card">

    <!-- header -->
    <div class="header">
        <h3> List of Leave Application </h3>
    </div>

    <form action="" method="POST">
        @CSRF

        <table class="table table-striped table-bordered table-mm" id="user_table">
            <thead>
                <tr>
                    <th>Emp. No.</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>M.I.</th>
                    <th>Status</th>
                    <th>Type of Leave</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($leave_form as $leavelist)
                    <td>{{$leavelist['employee_number']}}</td>
                    <td>{{$leavelist['last_name']}}</td>
                    <td>{{$leavelist['first_name']}}</td>
                    <td>{{$leavelist['middle_initial']}}</td>
                    <td>Pending</td>
                    <td>{{$leavelist['employee_number']}}</td>
                    <td>

                        <div class="btn-group" id="btnGroup">
                            <a href="/leaveform" type="button" class="btn btn-primary"> View </a>
                        </div>

                        <div class="btn-group" id="btnGroup">
                            <a href="/import/create" type="button" class="btn btn-success"> Print </a>
                        </div>
                        <!--   <div class="btn-group mr-2">
                            <div class="button1">
                                <a href="/import/create" type="button" class="btn btn-primary"> View </a>
                            </div>
                            <div class="button1">
                                <a href="/import/create" type="button" class="btn btn-success"> Print </a>
                            </div>
                        </div> -->
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>

    </form>

</div>

@endsection
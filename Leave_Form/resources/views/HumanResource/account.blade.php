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
        margin-bottom: 10px;
    }

    #btnGroup {
        width: 90px;
        justify-content: center;
    }
</style>

<!-- creating table and to foresee the inputed datas(register account) of the users/employee -->
<div class="card">

    <!-- header -->
    <div class="header">
        <h3> Pending Account Application</h3>
    </div>

    <table class="table table-striped table-bordered table-mm" id="user_table">
        <thead>
            <tr>
                <th>Emp. No.</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>M.I.</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($application_form as $applicationForm)
                @if($applicationForm['status'] == "Pending")
                <td>{{$applicationForm['employee_number']}}</td>
                <td>{{$applicationForm['last_name']}}</td>
                <td>{{$applicationForm['first_name']}}</td>
                <td>{{$applicationForm['middle_initial']}}</td>
                <td>{{$applicationForm['status']}}</td>
                <td>

                    <div class="btn-group" id="btnGroup">
                        <a href="/viewaccount/{{$applicationForm['id']}}" type="button" class="btn btn-primary"> View </a>
                    </div>

                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $('#user_table').DataTable({
        width: '100%',
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
    });
</script>
@endsection
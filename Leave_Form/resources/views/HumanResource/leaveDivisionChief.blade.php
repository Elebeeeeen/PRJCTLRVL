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

    #btnGroup,
    #print_form {
        width: 90px;
        justify-content: center;
    }
</style>


<div class="card">

    <!-- header -->
    <div class="header">
        <h3> List of Leave Application </h3>
    </div>

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
                @foreach($directors_form as $dcform)
                <td>{{$dcform['employee_number']}}</td>
                <td>{{$dcform['last_name']}}</td>
                <td>{{$dcform['first_name']}}</td>
                <td>{{$dcform['middle_initial']}}</td>
                <td>Pending</td>
                <td>{{$dcform['type_of_leave']}}</td>
                <td>

                    <div class="btn-group" id="btnGroup">
                        <a href="/leaveApplicationDivisionChief/{{$dcform['id']}}" type="button" class="btn btn-primary"> View </a>
                    </div>


                </td>
            </tr>
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
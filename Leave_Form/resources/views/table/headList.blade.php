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
        <h3> List of Approve Leave Applications </h3>
    </div>

    <table class="table table-striped table-bordered table-mm" id="user_table">
        <thead>
            <tr>
                <th>Emp. No.</th>
                <th>First Name</th>
                <th>M.I</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Status</th>
                <th>Type of Leave</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($leave_form as $leavelist)
                <td>{{$leavelist['employee_number']}}</td>
                <td>{{$leavelist['first_name']}}</td>
                <td>{{$leavelist['middle_initial']}}</td>
                <td>{{$leavelist['last_name']}}</td>
                <td>{{$leavelist['position']}}</td>
                <td>{{$leavelist['status']}}</td>
                <td>{{$leavelist['type_of_leave']}}</td>
                <td>

                    <div class="btn-group" id="btnGroup">
                        <a href="/viewApplicationHead/{{$leavelist['id']}}" type="button" class="btn btn-primary">View</a>
                    </div>


                    <div class="btn-group" id="btnGroup">
                        <form action="/printform/{{$leavelist['id']}}" id="print_form" data-product-id="{{$leavelist['id']}}" method="POST">
                            @CSRF
                            <button type="submit" class="btn btn-success" id="print_form">Print </button>
                        </form>
                    </div>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



</div>


<script>
    $('#print_form').on('submit', function(e) {
        let errorMessages = '';
        let formData = new FormData($("#print_form")[0]);
        $.ajax({
            url: '/printform/' + $(this).attr("data-product-id"),
            method: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function(response) {
                if (response.success) {
                    window.location.href = '/printform/' + $(this).attr("data-product-id");
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
    });


    $('#user_table').DataTable({
        width: '100%',
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        order: [[0, 'desc']],
    });
</script>

@endsection
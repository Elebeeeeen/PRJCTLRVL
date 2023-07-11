@extends('layouts.app')

@section('content')


<!-- style for a header -->
<style>
    .number_pending,
    .text {
        text-align: center;
    }
</style>

@role('division_chief')
<!-- dashboards -->
<div class="col-lg-12 col-12">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3 class="number_pending">{{$count1}}</h3>
            <p class="text">Pending Employee Leave Form/s</p>
        </div>
        <div class="icon">
            <i class="fas fa-file"></i>
        </div>
    </div>
</div>
@endrole


@role('director')
<!-- dashboards -->
<div class="col-lg-12 col-12">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3 class="number_pending">{{$count2}}</h3>
            <p class="text">Pending Divisions Leave Form</p>
        </div>
        <div class="icon">
            <i class="fas fa-file"></i>
        </div>
    </div>
</div>
@endrole


@role('h_r')
<!-- dashboards -->
<form class="row">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3 class="number_pending">{{$count4}}</h3>
                <p class="text">Pending Account/s</p>
            </div>
            <div class="icon">
                <i class="fas fa-male"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3 class="number_pending">{{$count3}}</h3>
                <p class="text">Approved Leave Form</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>
</form>
@endrole

@role('head_officer')
<div class="col-lg-12 col-12">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3 class="number_pending">{{$count5}}</h3>
                <p class="text">Approved Leave Form</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>
@endrole

@endsection
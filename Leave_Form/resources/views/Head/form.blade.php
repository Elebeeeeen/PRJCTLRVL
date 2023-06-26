@extends('layouts.app')

@section('content')


<!-- style for a header -->
<style>
    .number_pending,
    .text {
        text-align: center;
    }
</style>

<!-- dashboards -->

<form class="row">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3 class="number_pending">{{$count2}}</h3>
                <p class="text">Pending Leave form Division</p>
            </div>
            <div class="icon">
                <i class="fas fa-male"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3 class="number_pending">{{$count}}</h3>
                <p class="text">Pending Leave Form/s</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>



</form>

@endsection
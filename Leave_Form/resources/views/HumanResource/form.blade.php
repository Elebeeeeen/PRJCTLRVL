@extends('layouts.app')

@section('content')

<style>
    .number_pending,
    .text {
        text-align: center;
    }
</style>


<form class="row">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3 class="number_pending">150</h3>
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
                <h3 class="number_pending">150</h3>
                <p class="text">Pending Leave Form/s</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>
</form>

@endsection
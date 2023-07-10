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
                <p class="text">Pending Leave Form/s</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>
</form>

@endsection
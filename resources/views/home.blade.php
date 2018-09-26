@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   
                    @include('home/chart1')
                    @include('home/chart2')
                    @include('home/chart3')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

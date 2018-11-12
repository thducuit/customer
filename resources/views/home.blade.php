@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @include('home/chart1', ['categories' => $categories, 'chart1' => $chart1, 'table1' => $table1])
                    @include('home/chart2', ['suppliers' => $suppliers, 'chart2' => $chart2, 'table2' => $table2])
                </div>
            </div>
        </div>
    </div>
</div>
<?php //echo '<pre>'; print_r($labels2); ?>
<script>
    chartdata1 =  {!! json_encode($chart1) !!};
    chartdata2 =  {!! json_encode($chart2) !!};
    labels1 = {!! json_encode($labels1) !!};
    labels2 = {!! json_encode($labels2) !!};
</script>
@endsection



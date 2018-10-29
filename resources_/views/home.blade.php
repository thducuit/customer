@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @include('home/chart1', ['categories' => $categories, 'chart1' => $chart1])
                    @include('home/chart2', ['suppliers' => $suppliers, 'chart2' => $chart2])
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var chartdata1 =  {!! json_encode($chart1) !!};
    var chartdata2 =  {!! json_encode($chart2) !!};

    new TQ_Chart('chart-category', 'Expected Sales 2018', chartdata1);
    new TQ_Chart('chart-supplier', 'Expected Cost 2018', chartdata2);
</script>
@endsection



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Log</div>

                <div class="panel-body">
                	<div class="pull-right action-block">
                		<form class="filter-form" method="get">
                			<input type="text" name="filler_date"  class="form-control datepicker" value="{{ date('d-m-Y', strtotime($filler_date)) }}" />	
                		</form>
                    </div>
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>ID</th>
                    			<th>Loại</th>
                    			<th>Nội dung</th>
                    			<th>Ngày</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($logs as $log)
                    		<tr>
                    			<td>{{ $log->id }}</td>
                    			<td class="log-{{ $log->type }}">{{ $log->type }}</td>
                    			<td>{{ $log->content }}</td> 
                    			<td>
                                    {{ date('d-m-Y H:i:s', strtotime($log->created_at)) }}       
                                </td>
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                            <div class="col-md-6"><input type="text" name="filler_date_from"  class="form-control datepicker" value="{{ date('d-m-Y', strtotime($filler_date_from)) }}" placeholder="from" /></div>
                            <div class="col-md-6"><input type="text" name="filler_date_to"  class="form-control datepicker" value="{{ date('d-m-Y', strtotime($filler_date_to)) }}" placeholder="to"/></div>	
                		</form>
                    </div>
                    <table id="log-table" class="table table-striped table-bordered">
                    	<thead>
                    		<tr>
                                <th>ID</th>
                    			<th>Tên khách hàng</th>
                                <th>Dịch vụ</th>
                    			<th>Nhà cung cấp</th>
                    			<th>Ngày</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($logs as $log)
                    		<tr>
                    			<td>{{ $log->id }}</td>
                                <td>{{ $log->customer ? sprintf("%s[%s]", $log->customer->customer, $log->customer->services) : ''  }}</td>
                    			<td>{{ $log->category ? $log->category->title : '' }}</td> 
                                <td>{{ $log->supplier ? $log->supplier->name :  '' }}</td>
                    			<td>
                                    {{ date('d-m-Y H:i:s', strtotime($log->created_at)) }}       
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/log/delete') }}" data-method="delete" data-id="{{ $log->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
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
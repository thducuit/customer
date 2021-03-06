@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Log thông báo khách hàng</div>

                <div class="panel-body">
                	<div class="pull-right action-block row">
                		<form class="filter-form" method="get">
                            <div class="col-md-6"><input type="text" name="filler_date_from"  class="form-control datepicker" value="{{ $filler_date_from ? date('d-m-Y', strtotime($filler_date_from)) : date('d-m-Y', strtotime('-6 day')) }}" placeholder="from" /></div>
                            <div class="col-md-6"><input type="text" name="filler_date_to"  class="form-control datepicker" value="{{ $filler_date_to ? date('d-m-Y', strtotime($filler_date_to)) : date('d-m-Y') }}" placeholder="to"/></div>	
                		</form>
                    </div>
                    <table id="log-table" class="table table-striped table-bordered">
                    	<thead>
                    		<tr>
                                <th>ID Khách hàng</th>
                    			<th>Tên khách hàng</th>
                                <th>Dịch vụ</th>
                                <th>Trạng thái</th>
                    			<th>Ngày</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($logs as $log)
                            @php
                                if($log->status== \App\Management::STATUS_RUNNING){
                                    $color='success';
                                    $status='Đang chạy';
                                }else if($log->status== \App\Management::STATUS_WARNING){
                                    $color='warning';
                                    $status='Sắp hết hạn';
                                }else if($log->status== \App\Management::STATUS_EXPIRED){
                                    $color='danger';
                                    $status='Đã hết hạn';
                                }else{
                                    $status=null;
                                }
                            @endphp
                    		<tr>
                                <td>{{ $log->customer_id }}</td>
                                <td>{{ $log->customer ? sprintf("%s[%s]", $log->customer->customer, $log->customer->services) : ''  }}</td>
                    			<td>{{ $log->category ? $log->category->title : '' }}</td> 
                                <td>
                                    <span class = "label label-{{ $color }}">{{ $status }}</span>
                                </td>
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
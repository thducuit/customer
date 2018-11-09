@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Log theo dõi dịch vụ</div>

                <div class="panel-body">
                	<div class="pull-right action-block row">
                		<form class="filter-form" method="get">
                            <div class="col-md-6"><input type="text" name="filler_date_from"  class="form-control datepicker" value="{{ $filler_date_from ? date('d-m-Y', strtotime($filler_date_from)) : date('d-m-Y') }}" placeholder="from" /></div>
                            <div class="col-md-6"><input type="text" name="filler_date_to"  class="form-control datepicker" value="{{ $filler_date_to ? date('d-m-Y', strtotime($filler_date_to)) : date('d-m-Y', strtotime('+1 day')) }}" placeholder="to"/></div>	
                		</form>
                    </div>
                    <table id="log-table" class="table table-striped table-bordered">
                    	<thead>
                    		<tr>
                                <th>ID</th>
                                <th>ID Dịch vụ</th>
                    			<th>Tên dịch vụ</th>
                                <th>Loại dịch vụ</th>
                    			<th>Nhà cung cấp</th>
                                <th>Trạng thái</th>
                    			<th>Ngày</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($logs as $log)
                            @php
                                if($log->status== \App\Service::STATUS_RUNNING){
                                    $color='success';
                                    $status='Đang chạy';
                                }else if($log->status== \App\Service::STATUS_WARNING){
                                    $color='warning';
                                    $status='Sắp hết hạn';
                                }else if($log->status== \App\Service::STATUS_EXPIRED){
                                    $color='danger';
                                    $status='Đã hết hạn';
                                }else{
                                    $status=null;
                                }
                            @endphp
                    		<tr>
                                <th>{{ $log->id }}</th>
                    			<td>{{ $log->service_id }}</td>
                                <td>{{ $log->service ? sprintf("%s", $log->service->title) : ''  }}</td>
                    			<td>{{ $log->category ? $log->category->title : '' }}</td> 
                                <td>{{ $log->supplier ? $log->supplier->name :  '' }}</td>
                                <td>
                                    <span class = "label label-{{ $color }}">{{ $status }}</span>
                                </td>
                    			<td>
                                    {{ date('d-m-Y H:i:s', strtotime($log->created_at)) }}       
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/log/delete2') }}" data-method="delete" data-id="{{ $log->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dịch vụ đang thuê</div>

                <div class="panel-body">
                    <div class="pull-right action-block">
                        <a href="/quan-ly-dich-vu-thue?expand=open" class="btn btn-info btn-add">Thêm mới</a>
                    </div>
                    <table id="ser-table" class="table table-stripe table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Thứ tự</th>
                                <th>Tên dịch vụ</th>
                                <th>Loại dịch vụ</th>
                    			<th>Tên nhà cung cấp</th>
                                <th>Ngày tạo</th>
                                <th>Ngày hết hạn</th>
                                <th>Trang thái</th>
                                <th>Giá</th>
                                <th></th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                            @php
                                $count = 0;
                            @endphp
                    		@foreach($services as $ser)
                            @php
                                if($ser->status== \App\Service::STATUS_RUNNING){
                                    $color='success';
                                    $status='Đang chạy';
                                }else if($ser->status== \App\Service::STATUS_WARNING){
                                    $color='warning';
                                    $status='Sắp hết hạn';
                                }else if($ser->status== \App\Service::STATUS_EXPIRED){
                                    $color='danger';
                                    $status='Đã hết hạn';
                                }else{
                                    $status=null;
                                }
                            @endphp
                    		<tr>
                                <td>{{ ++$count }}</td>
                    			<td>{{ $ser->title }}</td>
                                <td>
                                    {{ $ser->category && $ser->category->title ? $ser->category->title : '' }}
                                </td>
                                <td>
                                    {{ $ser->supplier && $ser->supplier->name ? $ser->supplier->name : '' }}
                                </td>
                                <td>{{ date('d-m-Y', strtotime($ser->datecreated)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($ser->dateexpired)) }}</td>
                    			<td class="text-center">
                                    <span class = "label label-{{ $color }}">{{ $status }}</span>
                                </td>
                                <td>{{ $ser->price }}</td>
                                <td>
                                    <a href="/quan-ly-dich-vu-thue?expand=open&id={{ $ser->id }}"><span class="glyphicon glyphicon-pencil"></span></a>      
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/service/delete') }}" data-method="delete" data-id="{{ $ser->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
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

<div class="bottom-bar {{ $expand && $expand == 'open' ? 'active' : '' }}">
    <a href="#" class="btn btn-danger btn-close-bottom-bar pull-right">Đóng lại</a>
    <div class="controller">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('service/sub/upsert', ['service' => $service, 'categories' => $categories, 'suppliers' => $suppliers])
            </div>
        </div>
    </div>
</div>
@endsection

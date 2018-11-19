@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nhà cung cấp</div>

                <div class="panel-body">
                    <div class="pull-right action-block">
                        <a href="/quan-ly-nha-cung-cap?expand=open" class="btn btn-info btn-add">Thêm mới</a>
                    </div>
                    <table id="sup-table" class="table table-stripe table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Thứ tự</th>
                    			<th>Tên nhà cung cấp</th>
                                <th></th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                            @php
                                $count = 0;
                            @endphp
                    		@foreach($suppliers as $sup)
                    		<tr>
                                <td>{{ ++$count }}</td>
                    			<td>{{ $sup->name }}</td>
                    			<td>
                                    <a href="/quan-ly-nha-cung-cap?expand=open&id={{ $sup->id }}"><span class="glyphicon glyphicon-pencil"></span></a>      
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/supplier/delete') }}" data-method="delete" data-id="{{ $sup->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
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
                @include('supplier/sub/upsert', ['supplier' => $supplier])
            </div>
        </div>
    </div>
</div>
@endsection

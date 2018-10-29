@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Khách hàng</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="pull-left action-block">
                            <form method="get" >
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="key" class="form-control" placeholder="Tên khách hàng ..." value="{{ $key }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="cat" class="form-control">
                                            <option value="0">-- Dịch vụ --</option>
                                            @foreach($categories as $cate)
                                                <option {{ $cat == $cate->id ? 'selected':'' }} value="{{ $cate->id }}">{{ $cate->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option {{ $status == -1 ? 'selected':'' }}>-- Trạng thái --</option>
                                            <option {{ $status == \App\Management::STATUS_RUNNING ? 'selected':'' }} value="{{ \App\Management::STATUS_RUNNING }}">Đang chạy</option>
                                            <option {{ $status == \App\Management::STATUS_WARNING ? 'selected':'' }} value="{{ \App\Management::STATUS_WARNING }}">Sắp hết hạn</option>
                                            <option {{ $status == \App\Management::STATUS_EXPIRED ? 'selected':'' }} value="{{ \App\Management::STATUS_EXPIRED }}">Đã hết hạn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-info">Tìm</button>
                                    <input type="hidden" name="sort" value="{{ $sort }}" />
                                    <a href="/quan-ly-khach-hang" class="btn btn-danger">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right action-block">
                            <a href="/quan-ly-khach-hang?expand=open" class="btn btn-info btn-add">Thêm mới</a>
                        </div>
                    </div>
                    <form method="post" action="/quan-ly-khach-hang">
                        {{ csrf_field() }}
                        <div class="col-md-12 action-block">
                            <button type="submit" class="btn btn-info pull-right">
                                <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                        </div>
                        <table id="cus-table" class="table table-bordered table-customer">
                            <col width="10">
                            <col width="100">
                            <col width="300">
                        	<thead>
                        		<tr>
                        			<!-- <th>ID</th> -->
                                    <th>Thứ tự</th>
                        			<th>Dịch vụ</th>
                        			<th>Đối tác</th>
                                    <!--<th>Nhà cung cấp</th>-->
                                    <th>Ngày tạo</th>
                        			<th>Hết hạn</th>
                                    <th>Trạng thái </th>
                                    <th>Liên hệ</th>
                        			<th>Giá</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                        		</tr>
                        	</thead>
                        	<tbody>
                                @foreach($customers as $cus)
                                @php
                                    if($cus->status== \App\Management::STATUS_RUNNING){
                                        $color='success';
                                        $status='Đang chạy';
                                    }else if($cus->status== \App\Management::STATUS_WARNING){
                                        $color='warning';
                                        $status='Sắp hết hạn';
                                    }else if($cus->status== \App\Management::STATUS_EXPIRED){
                                        $color='danger';
                                        $status='Đã hết hạn';
                                    }else{
                                        $status=null;
                                    }
                                @endphp
                        		<tr>
                        			<!-- <td>{{ $cus->id }}</td> -->
                                    <td><input type="text" name="order[{{ $cus->id }}]" value="{{ $cus->order }}" class="form-control input-xs"></td>
                        			<td>
                                        @if( $cus->category && $cus->category->gallery)
                                            <img width="30" src="{{ 'uploads/' . $cus->category->gallery }}" class="img-responsive">
                                        @endif         
                                    </td>
                                    <td>
                                        <strong>
                                            <a href="{{ route('customer', ['expand' => 'open', 'id' => $cus->id, 'key' => $key, 'cat' => $cat, 'page' => $page, 'sort' => $sort, 'status' => $cus->status]) }}">{{ $cus->customer }}</a></strong> <br>
                                        <small>{{ $cus->services }}</small>
                                    </td>
                                    <!--<td>{{ $cus->supplier ? $cus->supplier->name : '' }}</td>-->
                                    <td>{{ date('d-m-Y', strtotime($cus->datecreated)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($cus->dateexpired)) }}</td>
                                    <td>
                                        <span class = "label label-{{ $color }}">{{ $status }}</span>
                                    </td>
                                    <td>
                                        @if($cus->contact)
                                            {{ $cus->contact }} <br>
                                        @endif
                                        @if($cus->phone) 
                                            {{ $cus->phone }} <br>
                                        @endif
                                        <a href="#">{{ $cus->email }} </a>
                                    </td>
                                    <td>{{ $cus->price }}</td>
                                    
                                    <td>
                                        <a href="{{ route('customer', ['expand' => 'open', 'id' => $cus->id, 'key' => $key, 'cat' => $cat, 'page' => $page, 'sort' => $sort, 'status' => $cus->status]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-delete" data-action="{{ url('/customer/delete') }}" data-method="delete" data-id="{{ $cus->id }}"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-extra" data-name='{{ $cus->customer }} - {{ $cus->services }}' data-id="{{ $cus->id }}">Gia hạn</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-send-mail" data-name='{{ $cus->customer }} - {{ $cus->services }}' data-id="{{ $cus->id }}">Gửi mail</a>
                                    </td>
                        		</tr>
                                @endforeach
                        	</tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<div class="bottom-bar {{ $expand && $expand == 'open' ? 'active' : '' }}">
    <a href="#" class="btn btn-danger btn-close-bottom-bar pull-right">Đóng lại</a>
    <div class="controller">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('customer/sub/upsert', ['customer' => $customer])
                @include('customer/sub/extra', ['expand' => $expand])
                @include('customer/sub/mail', ['expand' => $expand, 'templates' => $templates])

            </div>
        </div>
    </div>
</div>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dịch vụ</div>

                <div class="panel-body">
                    <div class="pull-right action-block">
                        <a href="/quan-ly-dich-vu?expand=open" class="btn btn-info btn-add">Thêm mới</a>
                        <a href="#" class="btn btn-primary btn-send-mail">Gửi mail</a>
                    </div>
                    <table id="cat-table" class="table table-stripe table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Thứ tự</th>
                    			<th>Tiêu đề</th>
                    			<th>Hình</th>
                    		    <th>Trạng thái</th>
                                <th>Loại danh mục</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach($categories as $cat)
                            <tr>
                    			<td>{{ ++$count }}</td>
                    			<td>{{ $cat->title }}</td>
                    			<td>
                                    @if($cat->gallery)
                                    <img width="80" src="{{ 'uploads/' . $cat->gallery }}" class="img-responsive">
                                    @endif
                                </td>
                    			<td>
                                    @if($cat->status == 1)
                                    <button class="btn btn-success btn-sm">Đang hoạt động</button>      
                                    @else   
                                    <button class="btn btn-default btn-sm">Tạm dừng</button>         
                                    @endif
                                </td>
                                <td>
                                    @if($cat->is_for_rent == 0)
                                    <button class="btn btn-danger btn-sm">Đang cho thuê</button>      
                                    @else   
                                    <button class="btn btn-default btn-sm">Không cho thuê</button>         
                                    @endif
                                </td>
                    			<td>
                                    <a href="/quan-ly-dich-vu?expand=open&id={{ $cat->id }}"><span class="glyphicon glyphicon-pencil"></span></a>      
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/category/delete') }}" data-method="delete" data-id="{{ $cat->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
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
                @include('category/sub/upsert', ['category' => $category])
                @include('category/sub/mail', ['expand' => $expand, 'templates' => $templates, 'categories' => $categories])
            </div>
        </div>
    </div>
</div>

@endsection

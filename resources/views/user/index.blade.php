@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tài khoản</div>
                
                <div class="panel-body">
                	<div class="pull-right action-block">
	                    <a href="/quan-ly-tai-khoan?expand=open" class="btn btn-info btn-add">Thêm mới</a>
	                </div>
                    <table id="user-table" class="table table-stripe table-bordered">
                    	<thead>
                    		<tr>
                    			<th>ID</th>
                    			<th>Tên</th>
                                <th>Email</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($users as $user)
                    		<tr>
                    			<td>{{ $user->id }}</td>
                    			<td>{{ $user->name }}</td>
                    			<td>
                                    {{ $user->email }}    
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/user/delete') }}" data-method="delete" data-id="{{ $user->id }}"><span class="glyphicon glyphicon-remove"></span></a>  
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
                @include('user/sub/upsert', ['user' => $user])
            </div>
        </div>
    </div>
</div>

@endsection

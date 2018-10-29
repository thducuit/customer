@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Email Template</div>

                <div class="panel-body">
                    <div class="pull-right action-block">
                        <a href="/quan-ly-mau-email?expand=open" class="btn btn-info btn-add">Thêm mới</a>
                    </div>
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>ID</th>
                    			<th>Tiêu đề</th>
                    			<th>Trạng thái</th>
                                <th>Mẫu mail tự động</th>
                                <th></th>
                    			<th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($templates as $temp)
                    		<tr>
                    			<td>{{ $temp->id }}</td>
                    			<td>{{ $temp->title }}</td>
                    			<td>
                                    @if($temp->status == 1)
                                    <button class="btn btn-success btn-sm">Đang sử dụng</button>      
                                    @else   
                                    <button class="btn btn-default btn-sm">Tạm ngưng</button>         
                                    @endif
                                </td>
                                <td>
                                    @if($temp->auto == 1)
                                    <a class="btn btn-danger btn-sm"  href="/quan-ly-mau-email?expand=open&id={{ $temp->id }}&auto=1">Đang kích hoạt</a>      
                                    @else   
                                    <a class="btn btn-default btn-sm btn-auto-mail" href="/quan-ly-mau-email?expand=open&id={{ $temp->id }}&auto=1">Kích hoạt</a>         
                                    @endif
                                </td>
                    			<td>
                                    <a href="/quan-ly-mau-email?expand=open&id={{ $temp->id }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            
                                </td>
                                <td>
                                    <a href="#" class="btn-delete" data-action="{{ url('/template/delete') }}" data-method="delete" data-id="{{ $temp->id }}"><span class="glyphicon glyphicon-remove"></span></a> 
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
<div class="bottom-bar {{ $expand && $expand == 'open' ? 'active' : '' }}">
    <a href="#" class="btn btn-danger btn-close-bottom-bar pull-right">Đóng lại</a>
    <div class="controller">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-bottom-bar {{ $auto && $auto == 1 ? 'hide' : '' }}">
                    <div class="panel-heading">Tạo mới</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/template/update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $template->id }}">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Tiêu đề</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" 
                                    value="{{ $template ? $template->title : old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Trạng thái</label>

                                <div class="col-md-6">
                                    <select id="status" type="text" class="form-control" name="status" >
                                        <option value="1">Đang sử dụng</option>
                                        <option value="0">Tạm dừng</option>
                                    </select>
                                    <input type="hidden" class="status" value="{{ $template ? $template->status : old('status') }}">

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Nội dung</label>

                                <div class="col-md-12">
                                    <textarea class="form-control editor" id="editor" name="content">{{ $template ? $template->content : old('content') }}</textarea>
                                     
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default panel-bottom-bar panel-auto-mail {{ $auto && $auto == 1 ? '' : 'hide' }}">
                    <div class="panel-heading">Cài đặt auto mail</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/template/auto') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="auto_id" id="auto_id" value="{{ $template ? $template->id : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Thêm cc</label>

                                <div class="col-md-6">
                                    <input id="cc_input" type="text" name="cc" class="form-control" value="{{ $template ? $template->cc : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
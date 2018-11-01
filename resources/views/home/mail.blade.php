@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Gửi mail</div>

                <div class="panel-body">
                    <form class="form-horizontal form-mail" role="form" method="POST" action="{{ url('/mail/send') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Dịch vụ</label>

                            <div class="col-md-6">
                                @foreach($categories as $cat)
                                <label class="checkbox-inline"><input name="categories[]" type="checkbox" value="{{ $cat->id }}">{{ $cat->title }}</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Thêm email gửi</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control email_tag" name="email" value="{{ old('email') }}" placeholder="Tab giữa các email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mẫu Email</label>

                            <div class="col-md-6">
                                <select class="form-control" name="template_id" id="template_id">
                                    <option value="0">-- Chọn mẫu Email --</option>
                                    @foreach($templates as $temp)
                                    <option value="{{ $temp->id }}">{{ $temp->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tiêu đề email</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" 
                                value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nội dung email</label>

                            <div class="col-md-6">
                                <textarea class="form-control editor" id="editor" name="content">{{ old('content') }}</textarea>
                                <small>Tag: {category} {datecreated} {dateexpired} {project} {customer} {contact} {price} {note} {email} {phone} {STATUS}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">
                                    Gửi mail
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
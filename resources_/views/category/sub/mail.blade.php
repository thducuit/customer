<div class="panel panel-default panel-bottom-bar panel-send-mail {{ $expand && $expand == 'open' ? 'hide' : '' }}">
    <div class="panel-heading">Gửi email</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/category/mail') }}">
            {{ csrf_field() }}
            <div id="mail_name_customer"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Mẫu Email</label>

                <div class="col-md-6">
                    <select class="form-control" name="template_id">
                        @foreach($templates as $temp)
                        <option value="{{ $temp->id }}">{{ $temp->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-md-4 control-label">Tiêu đề</label>

                <div class="col-md-6">
                    <input type="text" name="title" class="form-control">
                </div>
            </div> -->
            <div class="form-group">
                <label class="col-md-4 control-label">Thêm CC</label>

                <div class="col-md-6">
                    <input type="text" name="cc" class="form-control email_tag">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Chọn loại dịch vụ</label>

                <div class="col-md-6">
                    <select class="form-control" multiple name="categories[]">
                    	@foreach($categories as $cat)
                    	<option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    	@endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Send
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
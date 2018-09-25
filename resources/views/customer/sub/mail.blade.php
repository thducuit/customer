<div class="panel panel-default panel-bottom-bar panel-send-mail {{ $expand && $expand == 'open' ? 'hide' : '' }}">
    <div class="panel-heading">Gửi email</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/mail') }}">
            {{ csrf_field() }}
            <input type="hidden" name="mail_id" id="mail_id" value="">
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
            <div class="form-group">
                <label class="col-md-4 control-label">Trạng thái</label>

                <div class="col-md-6">
                    <select class="form-control" name="status">
                        <option value="đã hết hạn">đã hết hạn</option>
                        <option value="sắp hết hạn">sắp hết hạn</option>
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
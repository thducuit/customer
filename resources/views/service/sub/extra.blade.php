<div class="panel panel-default panel-bottom-bar panel-extra {{ $expand && $expand == 'open' ? 'hide' : '' }}">
    <div class="panel-heading">Gia hạn</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/service/extra') }}">
            {{ csrf_field() }}
            <input type="hidden" name="extra_id" id="extra_id" value="">
            <div id="extra_name_customer"></div>
            <div class="form-group">
                <label class="col-md-4 control-label">Thời gian gia hạn</label>

                <div class="col-md-2">
                    <input type="text" name="period" class="form-control">
                </div>

                <div class="col-md-2">
                    <select class="form-control" name="unit">
                        <option value="day">ngày</option>
                        <option value="month">tháng</option>
                        <option value="year">năm</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Lưu lại
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="panel panel-default panel-bottom-bar">
    <div class="panel-heading">Tạo mới</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/supplier/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $supplier->id }}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Tên nhà cung cấp</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" 
                    value="{{ $supplier ? $supplier->name : old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('chart_bg_color') ? ' has-error' : '' }}">
                <label for="chart_bg_color" class="col-md-4 control-label">Màu nền chart</label>

                <div class="col-md-6">
                    <input type="text" name="chart_bg_color" class="chart_bg_color form-control" value="{{ $category ? $category->chart_bg_color : old('chart_bg_color') }}">

                    @if ($errors->has('chart_bg_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('chart_bg_color') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('chart_bd_color') ? ' has-error' : '' }}">
                <label for="chart_bd_color" class="col-md-4 control-label">Màu viền chart</label>

                <div class="col-md-6">
                    <input type="text" name="chart_bd_color" class="chart_bd_color form-control" value="{{ $category ? $category->chart_bd_color : old('chart_bd_color') }}">    
                    
                    @if ($errors->has('chart_bd_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('chart_bd_color') }}</strong>
                        </span>
                    @endif
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
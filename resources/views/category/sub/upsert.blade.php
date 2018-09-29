<div class="panel panel-default panel-bottom-bar">
    <div class="panel-heading">Tạo mới</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/category/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label">Tiêu đề</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" 
                    value="{{ $category ? $category->title : old('title') }}" required autofocus>

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
                        <option value="1">Đang hoạt động</option>
                        <option value="0">Tạm dừng</option>
                    </select>
                    <input type="hidden" class="status" value="{{ $category ? $category->status : old('status') }}">

                    @if ($errors->has('status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('chart_bg_color') ? ' has-error' : '' }}">
                <label for="chart_bg_color" class="col-md-4 control-label">Màu nền chart</label>

                <div class="col-md-6">
                    <input type="text" name="chart_bg_color" id="chart_bg_color" class="chart_bg_color jscolor {hash:true} form-control" value="{{ $category ? $category->chart_bg_color : old('chart_bg_color') }}">

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
                    <input type="text" name="chart_bd_color" id="chart_bd_color" class="chart_bd_color jscolor {hash:true} form-control" value="{{ $category ? $category->chart_bd_color : old('chart_bd_color') }}">    
                    
                    @if ($errors->has('chart_bd_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('chart_bd_color') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                <label for="photo" class="col-md-4 control-label">Photo</label>

                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                    @if($category->gallery)
                    <img width="30" src="{{ 'uploads/' . $category->gallery }}" class="img-responsive">
                    @endif
                    @if ($errors->has('photo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('photo') }}</strong>
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
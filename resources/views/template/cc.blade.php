@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm CC</div>

                <div class="panel-body">
                    <div class="col-md-12">
                    	<form class="form-horizontal" role="form" method="POST" action="{{ url('/template/cc') }}">
	            			{{ csrf_field() }}
	                    	<div class="form-group">
	                    		<input type="text" name="email" class="form-control email_tag" value="{{ $config_cc->value }}">
	                    	</div>
	                    	<div>
	                    		<button type="submit" type="button" class="btn btn-primary">Lưu lại</button>
	                    	</div>
	                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

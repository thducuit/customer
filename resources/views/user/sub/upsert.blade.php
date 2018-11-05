<div class="panel panel-default panel-bottom-bar">
	<div class="panel-heading">Đổi mật khẩu</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('user/change') }}">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $choosen_user->id }}">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Tên</label>

                    <div class="col-md-6">
                        {{ $choosen_user->name }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-6">
                        {{ $choosen_user->email }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Mật khẩu mới</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Nhập lại Mật khẩu</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
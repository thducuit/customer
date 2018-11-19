<div class="panel panel-default panel-bottom-bar">
    <div class="panel-heading">Tạo mới</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/update') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $customer->id }}">
            <div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
                <label for="customer" class="col-md-4 control-label">Khách hàng (*)</label>

                <div class="col-md-6">
                    <input id="customer" type="text" class="form-control" name="customer" 
                    value="{{ old('customer') ? old('customer') : $customer->customer }}" required autofocus>

                    @if ($errors->has('customer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customer') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('services') ? ' has-error' : '' }}">
                <label for="services" class="col-md-4 control-label">Dự án (*)</label>

                <div class="col-md-6">
                    <input id="services" type="text" class="form-control" name="services" 
                    value="{{ old('services') ? old('services') : $customer->services }}" required >

                    @if ($errors->has('services'))
                        <span class="help-block">
                            <strong>{{ $errors->first('services') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="status" class="col-md-4 control-label">Trạng thái (*)</label>

                <div class="col-md-6">
                    <select id="status" type="text" class="form-control" name="status" >
                        <option value="0">Đang hoạt động</option>
                        <option value="1">Sắp hết hạn</option>
                        <option value="2">Đã hết hạn</option>
                    </select>
                    <input type="hidden" class="status" value="{{ old('status') || old('status') == 0 ? old('status') : ($customer->status) ? : 0 }}">

                    @if ($errors->has('status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category" class="col-md-4 control-label">Dịch vụ (*)</label>

                <div class="col-md-6">
                    <select id="category_id" class="form-control" name="category_id">
                        <option value="0" selected>----</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" class="category_id" 
                        value="{{ old('category_id') ? old('category_id') : $customer->category_id }}">

                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--<div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                <label for="supplier" class="col-md-4 control-label">Nhà cung cấp (*)</label>

                <div class="col-md-6">
                    <select id="supplier_id" class="form-control" name="supplier_id">
                        <option value="0" selected>----</option>
                        @foreach($suppliers as $sup)
                            <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" class="supplier_id" 
                        value="{{ old('supplier_id') ? old('supplier_id') : $customer->supplier_id }}">

                    @if ($errors->has('supplier'))
                        <span class="help-block">
                            <strong>{{ $errors->first('supplier') }}</strong>
                        </span>
                    @endif
                </div>
            </div>-->

            <div class="form-group">
                <label class="col-md-4 control-label">Ngày tạo / Hết hạn (*)</label>

                <div class="col-md-3">
                    @php
                        $date_created = old('datecreated') ? old('datecreated') : ( $customer->datecreated ? date('d-m-Y', strtotime($customer->datecreated)) : date('d-m-Y') );
                    @endphp
                    <input id="created" type="text" class="form-control datepicker" name="datecreated" 
                    value="{{ $date_created }}" required>
                </div>
                <div class="col-md-3">
                    @php
                        $date_expired = old('dateexpired') ? old('dateexpired') : ( $customer->dateexpired ? date('d-m-Y', strtotime($customer->dateexpired)) : date('d-m-Y', strtotime('tomorrow')) );
                    @endphp
                    <input id="expired" type="text" class="form-control datepicker" name="dateexpired" 
                    value="{{ $date_expired }}" required>
                </div>
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price" class="col-md-4 control-label">Giá tiền (*)</label>

                <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="price" 
                    value="{{ old('price') ? old('price') : $customer->price }}" required>

                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                <label for="contact" class="col-md-4 control-label">Liên hệ (*)</label>

                <div class="col-md-6">
                    <input id="contact" type="text" class="form-control" name="contact" 
                    value="{{ old('contact') ? old('contact') : $customer->contact }}" required>

                    @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email (*)</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control email_tag" name="email" 
                    value="{{ old('email') ? old('email') : $customer->email }}" >

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-md-4 control-label">Phone (*)</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" 
                    value="{{ old('phone') ? old('phone') : $customer->phone }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="note" class="col-md-4 control-label">Ghi chú</label>

                <div class="col-md-6">
                    <textarea  id="note" type="file" class="form-control" name="note">{{ old('note') ? old('note') : $customer->note }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Lưu lại
                    </button>
                    <a href="#" style="margin:0" class="btn btn-danger btn-close-bottom-bar pull-right">Đóng lại</a>
                </div>
            </div>
        </form>
    </div>
</div>
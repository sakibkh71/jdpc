@extends('layouts.master')

@section('content')
            
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/save_user') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name<span class="mendatory-fld">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address<span class="mendatory-fld">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('utype') ? ' has-error' : '' }}">
                            <label for="utype" class="col-md-4 control-label">User Type<span class="mendatory-fld">*</span></label>

                            <div class="col-md-6">
                                <select id="utype" type="text" class="form-control" name="utype">
                                    <option value="">Select user type</option>
                                    {{-- <option value="3" @if(old('utype')==3){{'selected'}}@endif>Super admin</option> --}}
                                    <option value="4" @if(old('utype')==4){{'selected'}}@endif>Admin</option>
                                    <option value="5" @if(old('utype')==5){{'selected'}}@endif>Data entry operator</option>
                                    {{-- <option value="6" @if(old('utype')==6){{'selected'}}@endif>Client</option> --}}
                                    <option value="7" @if(old('utype')==7){{'selected'}}@endif>Merchant</option>
                                </select>
                                @if ($errors->has('utype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('utype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mob" class="col-md-4 control-label">Contact No.</label>

                            <div class="col-md-6">
                                <input id="mob" type="text" class="form-control" name="mob" value="{{ old('mob') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="details" class="col-md-4 control-label">Details</label>

                            <div class="col-md-6">
                                <textarea id="details" type="text" class="form-control" name="details">{{ old('details') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password<span class="mendatory-fld">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password<span class="mendatory-fld">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

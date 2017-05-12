@extends('layouts.master')

@section('content')

    <table class="table">
	    <tr>
	    	<th>Sl.</th>
    		<th>Name</th>
            <th>Photo</th>
    		<th>User Type</th>
    		<th>Email<br/>Contact No.</th>
    		<th>Company Name<br>Website</th>
    		<th>Address</th>
    		<th>Details</th>
    		{{-- <th>Status</th> --}}
    		<th>Actions</th>	
	    </tr>
	    @if(count($all) > 0)
	    	<?php $count = 1; ?>
	    	@foreach($all as $info)
	    		@if($info->id != 5)
				<tr>
					<td>{{$count++}}</td>
					<td>{{$info->name}}</td>
                    <td>
                        @if(!empty($info->img1))
                            <img width="100px" src="{{asset("assets/user_img/small/$info->img1")}}">
                        @endif
                    </td>
					<td>
						@foreach($info->getRoles() as $rol)
							{{$rol->name}}
						@endforeach
						{{-- 
						@if($info->is('superadmin'))
							{{"Super admin"}}
						@elseif($info->is('admin'))
							{{"Admin"}}
						@elseif($info->is('dataentry'))
							{{"Data entry operator"}}
						@elseif($info->is('client'))
							{{"Client"}}
						@elseif($info->is('merchant'))
							{{"Merchant"}}
						@endif	 
						--}}
					</td>
					<td>
                        {{$info->email}}<br>
                        {{$info->mob}}
                    </td>
                    <td>
                        {{$info->company_name}}<br>
                        {{$info->website}}
                    </td>
					<td>{{$info->address}}</td>
					<td>{{$info->details}}</td>
					{{-- <td style="text-align: center">
						@if($info->display==1)
							<i style="color:green;" class="fa fa-check" aria-hidden="true"></i>
						@else
							<i style="color:red;" class="fa fa-times" aria-hidden="true"></i>
						@endif
					</td> --}}
					<td>
						<button class="btn btn-xs btn-success edit-btn" data-toggle="modal" data-target=".edit-btn-modal" data-options='{"id":"<?php echo $info->id; ?>"}'>
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</button>

						<a href="{{url("admin/remove_user/$info->id")}}" onclick="return confirm('Want to delete?');">
							<button class="btn btn-xs btn-danger">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</button>
						</a>

						<button class="btn btn-xs btn-primary ch-password" data-toggle="modal" data-target=".modal-pass" data-options='{"id":"<?php echo $info->id; ?>"}'>
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</button>
					</td>
				</tr>
				@endif
	    	@endforeach
	    @endif
    </table>


<!-- Edit user modal -->
<div class="modal fade bs-example-modal-lg edit-btn-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Edit user</h4>
	    </div>
	    <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('admin/edit_user') }}">
                {{ csrf_field() }}

				<input type="hidden" name="hdn_user_id" value="" class="hdn-user-id">
				<input type="hidden" name="old_user_role" value="" class="old_user_role">

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
                            <option value="3" @if(old('utype')==3){{'selected'}}@endif>Super admin</option>
                            <option value="4" @if(old('utype')==4){{'selected'}}@endif>Admin</option>
                            <option value="5" @if(old('utype')==5){{'selected'}}@endif>Data entry operator</option>
                            <option value="6" @if(old('utype')==6){{'selected'}}@endif>Client</option>
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
                    <label for="company" class="col-md-4 control-label">Company Name</label>

                    <div class="col-md-6">
                        <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="website" class="col-md-4 control-label">Website</label>

                    <div class="col-md-6">
                        <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}">
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

                <div class="form-group">
                    <label for="photos1" class="col-md-4 control-label">Image</label>
                    <div class="col-md-6">
                        <input type="file" name="photos1" id="photos1">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Update
                        </button>
                    </div>
                </div>
            </form>
	          
	    </div>
    </div>
  </div>
</div>

<!-- Change password modal -->
<div class="modal fade bs-example-modal-lg modal-pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Change password</h4>
	    </div>
	    <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/change_password') }}">
                {{ csrf_field() }}

				<input type="hidden" name="id_for_password" value="" class="id-for-password">

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
                            <i class="fa fa-btn fa-user"></i> Change password
                        </button>
                    </div>
                </div>
            </form>
	          
	    </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">

	$('.edit-btn').click(function(event) {
		
		var id = $(this).data( "options" ).id;
		$('.hdn-user-id').val(id);

		$.ajax({
			url: "{{url('admin/fetch_edit_info')}}",
			type: 'POST',
			data: {id: id},
		})
		.done(function(data) {
			
			$('.old_user_role').val(data['role_id']);
			$('#utype').val(data['role_id']);
			$('#name').val(data['name']);
			$('#email').val(data['email']);
			$('#mob').val(data['mob']);
			$('#address').val(data['address']);
            $('#details').val(data['details']);
            $('#company').val(data['company']);
			$('#website').val(data['website']);
		});
		
	});

	$('.ch-password').click(function(event) {
		
		var id = $(this).data( "options" ).id;
		$('.id-for-password').val(id);
	});

</script>
@endsection
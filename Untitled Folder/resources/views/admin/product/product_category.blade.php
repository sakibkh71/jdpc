@extends('layouts.master')

@section('content')
	<button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target=".add-product">
		<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category
	</button>

	<div class="row">
		<table class="table">
			<tr>
				<th>Sl.</th>
				<th>Title</th>
				<th>Details</th>
				<th>Actions</th>
			</tr>
			@if(count($all) > 0)
				<?php $count=1; ?>
				@foreach($all as $info)
					<tr>
						<td>{{$count++}}</td>
						<td>{{$info->name}}</td>
						<td>{{$info->details}}</td>
						<td>
							<button class="btn btn-xs btn-success edit-btn"	data-toggle="modal" data-target="#myModal" data-options='{"id":"<?php echo $info->id; ?>"}'>
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</button>

							<a href="{{url("admin/product_category/$info->id")}}" onclick="return confirm('Want to delete?');">
								<button class="btn btn-xs btn-danger">
									<i class="fa fa-trash-o" aria-hidden="true"></i>
								</button>
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</table>		
	</div>


<!-- Modal add products category -->
<div class="modal fade bs-example-modal-lg add-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Add Product Category</h4>
	    </div>
	    <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/product_category') }}">
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

                <div class="form-group">
                    <label for="details" class="col-md-4 control-label">Details</label>

                    <div class="col-md-6">
                        <textarea id="details" type="text" class="form-control" name="details">{{ old('details') }}</textarea>

                        @if ($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Save
                        </button>
                    </div>
                </div>
            </form>
	    </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
    	<div class="modal-body">
    		{{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/product_category') }}"> --}}
    		
			<?php $urrl = "admin/product_category"; ?>

    		{{ Form::open(['method' => 'PUT','class' => 'form-horizontal', 'url' => "admin/product_category/0"]) }}
                {{ csrf_field() }}

                <input type="hidden" name="hdn_id" class="hdn_id" value="">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="edit-name" class="col-md-4 control-label">Name<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit-name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit-details" class="col-md-4 control-label">Details</label>

                    <div class="col-md-6">
                        <textarea id="edit-details" type="text" class="form-control" name="details">{{ old('details') }}</textarea>

                        @if ($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Update
                        </button>
                    </div>
                </div>
            {{ Form::close() }}
    	</div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
	
	$('.edit-btn').click(function(event) {
		
		var id = $(this).data("options").id;
		$('.hdn_id').val(id);
		var APP_URL = {!! json_encode(url('/')) !!}

		$.ajax({
			url: APP_URL+"/admin/product_category/"+id+"/edit",
			type: 'GET',
		})
		.done(function(data) {
			
			$('#edit-name').val(data['name']);
			$('#edit-details').val(data['details']);
		});
	});

</script>
@endsection
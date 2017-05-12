@extends('layouts.master')

@section('style')
<style type="text/css">
    #start {
        z-index: 100000;
    }
</style>
@endsection

@section('content')
	<button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target=".add-product">
		<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Discount
	</button>

	<div class="row">
		<table class="table">
			<tr>
				<th>Sl.</th>
                <th>Percent</th>
				<th>Category</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Details</th>
                <th>Banner</th>
                <th>Status</th>
                <th>Action</th>
			</tr>
            @if(count($all) > 0)
                <?php $count=1; ?>
                @foreach($all as $info)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$info->percent." %"}}</td>
                        <td>
                            @if($info->cate_id == 1)
                                {{"One product"}}
                            @elseif($info->cate_id == 2)
                                {{"Category wise"}}
                            @elseif($info->cate_id == 3)
                                {{"Merchant wise"}}
                            @elseif($info->cate_id == 4)
                                {{"All Product"}}
                            @else
                                {{"--"}}
                            @endif
                        </td>
                        <td>{{$info->start}}</td>
                        <td>{{$info->end}}</td>
                        <td>{{$info->details}}</td>
                        <td>
                            @if(!empty($info->img1))
                                <img width="100px" src="{{asset("assets/discount/small/$info->img1")}}">
                            @endif
                        </td>
                        <td>
                            @if($info->display == 1)
                                {{"Active"}}
                            @else
                                {{"Diactive"}}
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-xs btn-success edit-btn" data-toggle="modal" data-target="#myModal" data-options='{"id":"<?php echo $info->id; ?>"}'>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>

                            <a href="{{url("admin/discount/$info->id")}}" onclick="return confirm('Want to delete?');">
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

<!-- Modal add products -->
<div class="modal fade bs-example-modal-lg add-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Add Dicount Info</h4>
	    </div>
	    <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('admin/discount') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('percent') ? ' has-error' : '' }}">
                    <label for="percent" class="col-md-4 control-label">Percent<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="percent" type="number" class="form-control" name="percent" value="{{ old('percent') }}" placeholder="Discount in percent(ex: 10 or 23)">

                        @if ($errors->has('percent'))
                            <span class="help-block">
                                <strong>{{ $errors->first('percent') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cate_id') ? ' has-error' : '' }}">
                    <label for="cate_id" class="col-md-4 control-label">Discount Category<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="cate_id" type="text" class="form-control" name="cate_id">
                            <option value="">Select category</option>
                            <option value="1" @if(old('cate_id')==1){{'selected'}}@endif>One product</option>
                            <option value="2" @if(old('cate_id')==2){{'selected'}}@endif>Category wise</option>
                            <option value="3" @if(old('cate_id')==3){{'selected'}}@endif>Merchant wise</option>
                            {{-- <option value="4">All products</option> --}}
                        </select>

                        @if ($errors->has('cate_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cate_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="details" class="col-md-4 control-label">Details</label>

                    <div class="col-md-6">
                        <textarea id="details" type="text" class="form-control" name="details">{{ old('details') }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                    <label for="start" class="col-md-4 control-label">Start Date<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="start" type="text" class="form-control" name="start" value="{{ old('start') }}">

                        @if ($errors->has('start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                    <label for="end" class="col-md-4 control-label">End Date<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="end" type="text" class="form-control" name="end" value="{{ old('end') }}">

                        @if ($errors->has('end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('end') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="photos1" class="col-md-4 control-label">Banner</label>
                    <div class="col-md-6">
                        <input type="file" name="photos1" id="photos1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="display" class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                        <input id="display" type="checkbox" name="display" checked="checked" value="1"> Active
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
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Discount</h4>
      </div>
    	<div class="modal-body">
    		{{ Form::open(['method' => 'PUT','enctype' => 'multipart/form-data','class' => 'form-horizontal', 'url' => "admin/discount/0"]) }}
                {{ csrf_field() }}

                <input type="hidden" name="hdn_id" class="hdn_id" value="">

                <div class="form-group{{ $errors->has('edit_percent') ? ' has-error' : '' }}">
                    <label for="edit_percent" class="col-md-4 control-label">Percent<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_percent" type="number" class="form-control" name="edit_percent" value="{{ old('edit_percent') }}" placeholder="Discount in percent(ex: 10 or 23)">

                        @if ($errors->has('edit_percent'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_percent') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('edit_cate_id') ? ' has-error' : '' }}">
                    <label for="edit_cate_id" class="col-md-4 control-label">Discount Category<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="edit_cate_id" type="text" class="form-control" name="edit_cate_id">
                            <option value="">Select category</option>
                            <option value="1" @if(old('edit_cate_id')==1){{'selected'}}@endif>One product</option>
                            <option value="2" @if(old('edit_cate_id')==2){{'selected'}}@endif>Category wise</option>
                            <option value="3" @if(old('edit_cate_id')==3){{'selected'}}@endif>Merchant wise</option>
                            {{-- <option value="4">All products</option> --}}
                        </select>

                        @if ($errors->has('edit_cate_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_cate_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_details" class="col-md-4 control-label">Details</label>

                    <div class="col-md-6">
                        <textarea id="edit_details" type="text" class="form-control" name="edit_details">{{ old('edit_details') }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('edit_start') ? ' has-error' : '' }}">
                    <label for="edit_start" class="col-md-4 control-label">Start Date<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_start" type="text" class="form-control" name="edit_start" value="{{ old('edit_start') }}">

                        @if ($errors->has('edit_start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_start') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('edit_end') ? ' has-error' : '' }}">
                    <label for="edit_end" class="col-md-4 control-label">End Date<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_end" type="text" class="form-control" name="edit_end" value="{{ old('edit_end') }}">

                        @if ($errors->has('edit_end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_end') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="photos1" class="col-md-4 control-label">Banner</label>
                    <div class="col-md-6">
                        <input type="file" name="photos1" id="">
                        <span style="color:green;" id="edit_photos1"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_display" class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                        <input id="edit_display" type="checkbox" name="edit_display" value="1"> Active
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
	
    $(function(){
        $("#start").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-mm-dd',
          appendText: "(yyyy-mm-dd)"
        });
    });

    $(function(){
        $("#end").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-mm-dd',
          appendText: "(yyyy-mm-dd)"
        });
    });

    var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    

	$('.edit-btn').click(function(event) {
		
		var id = $(this).data("options").id;
		$('.hdn_id').val(id);

		var APP_URL = {!! json_encode(url('/')) !!}

		$.ajax({
			url: APP_URL+"/admin/discount/"+id+"/edit",
			type: 'GET',
		})
		.done(function(data) {
			
            $('#edit_percent').val(data['percent']);
            $('#edit_cate_id').val(data['cate_id']);
            $('#edit_details').val(data['details']);
            $('#edit_start').val(data['start']);
            $('#edit_end').val(data['end']);
            //$display $img1 $img2

            if(data['display'] > 0){
                $('#edit_display').attr('checked','checked');
            }
            else{
                $('#edit_display').removeAttr('checked','checked');
            }

            if(data['img1'].length > 0){
                $('#edit_photos1').html('Already have a image');
            }
            else{
                $('#edit_photos1').html('');
            }

		});
	});

</script>
@endsection
@extends('layouts.master')

@section('content')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
      </div>
    	<div class="modal-body">
    		{{ Form::open(['method' => 'PUT','enctype' => 'multipart/form-data','class' => 'form-horizontal', 'url' => "admin/product/0"]) }}
                {{ csrf_field() }}

                <input type="hidden" name="hdn_id" class="hdn_id" value="{{$id}}">

                <div class="form-group{{ $errors->has('edit_name') ? ' has-error' : '' }}">
                    <label for="edit_name" class="col-md-4 control-label">Name<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_name" type="text" class="form-control" name="edit_name" value="{{$name}}" placeholder="Product name">

                        @if ($errors->has('edit_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('edit_item_code') ? ' has-error' : '' }}">
                    <label for="edit_item_code" class="col-md-4 control-label">Item Code</label>

                    <div class="col-md-6">
                        <input id="edit_item_code" type="text" class="form-control" name="edit_item_code" value="{{$item_code}}" placeholder="Product item code">

                        @if ($errors->has('edit_item_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_item_code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('eidt_cate_id') ? ' has-error' : '' }}">
                    <label for="edit_cate_id" class="col-md-4 control-label">Product Category<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="edit_cate_id" type="text" class="form-control" name="edit_cate_id">
                            <option value="">Select category</option>
                            @if(count($category) > 0)
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id == $cate_id){{'selected'}}@endif>{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has('edit_cate_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_cate_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('edit_merchant_id') ? ' has-error' : '' }}">
                    <label for="edit_merchant_id" class="col-md-4 control-label">Merchant<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="edit_merchant_id" type="text" class="form-control" name="edit_merchant_id">
                            <option value="">Select merchant</option>
                            @if(count($marchant) > 0)
                                @foreach($marchant as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id == $merchant_id){{'selected'}}@endif>{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    @if ($errors->has('edit_merchant_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('edit_merchant_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edit_specification" class="col-md-4 control-label">Specification</label>

                    <div class="col-md-6">
                        <textarea id="edit_specification" type="text" class="form-control" name="edit_specification">{{ $specification }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_over_view" class="col-md-4 control-label">Over View</label>
                    <div class="col-md-6">
                        <textarea id="edit_over_view" type="text" class="form-control" name="edit_over_view">{{ $over_view }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('edit_quantity') ? ' has-error' : '' }}">
                    <label for="edit_quantity" class="col-md-4 control-label">Quantity<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_quantity" type="number" class="form-control" name="edit_quantity" value="{{ $quantity }}">

                        @if ($errors->has('edit_quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('edit_quantity') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_weight" class="col-md-4 control-label">Weight</label>
                    <div class="col-md-6">
                        <input id="edit_weight" type="text" class="form-control" name="edit_weight" value="{{ $weight }}" placeholder="Exam: 1.2 gm or 1 kg">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_price" class="col-md-4 control-label">Price</label>
                    <div class="col-md-6">
                        <input id="edit_price" type="number" class="form-control" name="edit_price" value="{{ $price }}" placeholder="Exam: 1200 or 500 or 150 ">
                    </div>
                </div>

                <div class="form-group">
                    <label for="discount_id" class="col-md-4 control-label">Discount</label>

                    <div class="col-md-6">
                        <select id="discount_id" type="text" class="form-control" name="discount_id">
                            @if(count($discountss) > 0)
                                    <option value="0">Select discount</option>
                                @foreach($discountss as $dis)
                                    <option value="{{$dis->id}}">{{$dis->percent."% - ".$dis->details}}</option>
                                @endforeach
                                    <option value="0">Remove discount</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photos1" class="col-md-4 control-label">Image 01(Main image)</label>
                    <div class="col-md-6">
                        <input type="file" name="photos1" id="">
                        
                    </div>
                </div>

                

                <div class="form-group">
                    <label for="edit_display" class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                        <input id="edit_display" @if($display == 1) {{"checked"}} @endif type="checkbox" name="edit_display" value="1"> Publish product
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

@endsection

@section('script')
	<script src="{{URL::asset('assets/ckeditor/ckeditor.js')}}"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function($) {
	        CKEDITOR.replace( 'edit_specification' );
	    });
	</script>
@endsection
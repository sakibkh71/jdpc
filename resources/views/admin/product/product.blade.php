@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-md-8">
            <form class="form-inline" role="form" method="POST" action="{{ url('admin/search_product') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3"></label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail3" placeholder="Product name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3"></label>
                    <input type="text" class="form-control" name="code" id="exampleInputEmail3" placeholder="Product code">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3"></label>
                    <select id="" type="text" class="form-control" name="cate_id">
                        <option value="">Select category</option>
                        @if(count($category) > 0)
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target=".add-product">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Product
            </button>  
        </div>
    </div>

	<div class="row" style="margin-top:20px;">
		<table class="table">
			<tr>
				<th>Sl.</th>
				<th>Name<br>Category<br>Merchant</th>
                <th>Image</th>
                {{-- <th>Image2</th> --}}
				<th>Specification</th>
                <th>Over view</th>
				{{-- <th>Features</th> --}}
                <th>Quantity<br>Weight<br>Price</th>
                <th>Actions</th>
			</tr>
            @if(count($all) > 0)
                <?php $count=1; ?>
                @foreach($all as $info)
                <tr>
                    <td>{{$count++}}-{{$info->id}}</td>
                    <td>
                        #Name: {{$info->name}}<br>
                        #Code: {{$info->item_code}}<br>
                        #Category: {{$info->one_category->name or ''}}<br>
                        {{-- #Merchant: {{$info->merchant->name or ''}} --}}
                        #   @if($info->display == 1) {{"Show"}}
                            @else
                                <span style="color:red;">{{"Hide"}}</span>
                            @endif
                    </td>
                    <td>
                        @if(!empty($info->img1))
                            <img width="100px" src="{{asset("assets/product_img/small/$info->img1")}}">
                        @endif
                    </td>
                    {{-- <td>
                        @if(!empty($info->img2))
                            <img width="100px" src="{{asset("assets/product_img/small/$info->img2")}}">
                        @endif
                    </td> --}}
                    <td>{!! $info->specification !!}</td>
                    <td>{{$info->over_view}}</td>
                    {{-- <td>{{$info->features}}</td> --}}
                    <td>
                        #Quantity: {{$info->quantity}}<br>
                        #Weight: {{$info->weight}}<br>
                        #Price: {{$info->price}}
                        @if($info->discount_id > 0)
                        <span style="color:red;">
                        <?php
                            $percent = $info->discount->percent;
                            $dis_amount = round(($info->price*$percent)/100, 0, PHP_ROUND_HALF_DOWN);
                            $new_price = $info->price - $dis_amount;
                            echo "-".$dis_amount."($percent%)=".$new_price;
                        ?>
                        </span>
                        @endif
                    </td>
                    <td>
                        <!-- <button class="btn btn-xs btn-success edit-btn" data-toggle="modal" data-target="#myModal" data-options='{"id":"<?php echo $info->id; ?>"}'>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button> -->
                        <a href="{{url("admin/product/$info->id/edit")}}">
                            <button class="btn btn-xs btn-success edit-btn">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </a>
                            

                        <a href="{{url("admin/product/$info->id")}}" onclick="return confirm('Want to delete?');">
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
	        <h4 class="modal-title" id="gridSystemModalLabel">Add Product</h4>
	    </div>
	    <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('admin/product') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Product name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('item_code') ? ' has-error' : '' }}">
                    <label for="item_code" class="col-md-4 control-label">Item Code</label>

                    <div class="col-md-6">
                        <input id="item_code" type="text" class="form-control" name="item_code" value="{{ old('item_code') }}" placeholder="Product item code">

                        @if ($errors->has('item_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="bar_code" class="col-md-4 control-label">Bar Code</label>
                    <div class="col-md-6">
                        <input id="bar_code" type="text" class="form-control" name="bar_code" value="{{ old('bar_code') }}" placeholder="Product bar code.">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cate_id') ? ' has-error' : '' }}">
                    <label for="cate_id" class="col-md-4 control-label">Product Category<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="cate_id" type="text" class="form-control" name="cate_id">
                            <option value="">Select category</option>
                            @if(count($category) > 0)
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}" @if(old('cate_id')==$cat->id){{'selected'}}@endif>{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has('cate_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cate_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('merchant_id') ? ' has-error' : '' }}">
                    <label for="merchant_id" class="col-md-4 control-label">Merchant<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="merchant_id" type="text" class="form-control" name="merchant_id">
                            <option value="">Select merchant</option>
                            @if(count($marchant) > 0)
                                @foreach($marchant as $cat)
                                    <option value="{{$cat->id}}" @if(old('merchant_id')==$cat->id){{'selected'}}@endif>{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    @if ($errors->has('merchant_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('merchant_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="specification" class="col-md-4 control-label">Specification</label>

                    <div class="col-md-6">
                        <textarea id="specification" type="text" class="form-control" name="specification">{{ old('specification') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="over_view" class="col-md-4 control-label">Over View</label>
                    <div class="col-md-6">
                        <textarea id="over_view" type="text" class="form-control" name="over_view">{{ old('over_view') }}</textarea>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label for="features" class="col-md-4 control-label">Product Features</label>
                    <div class="col-md-6">
                        <textarea id="features" type="text" class="form-control" name="features">{{ old('features') }}</textarea>
                    </div>
                </div> --}}

                {{-- <div class="form-group">
                    <label for="stall_location" class="col-md-4 control-label">Stall Location</label>
                    <div class="col-md-6">
                        <textarea id="stall_location" type="text" class="form-control" name="stall_location">{{ old('stall_location') }}</textarea>
                    </div>
                </div> --}}

                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label for="quantity" class="col-md-4 control-label">Quantity<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">

                        @if ($errors->has('quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="weight" class="col-md-4 control-label">Weight</label>
                    <div class="col-md-6">
                        <input id="weight" type="text" class="form-control" name="weight" value="{{ old('weight') }}" placeholder="Exam: 1.2 gm or 1 kg">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-4 control-label">Price</label>
                    <div class="col-md-6">
                        <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Exam: 1200 or 500 or 150 ">
                    </div>
                </div>

                <div class="form-group">
                    <label for="photos1" class="col-md-4 control-label">Product Img</label>
                    <div class="col-md-6">
                        <input type="file" name="photos1" id="photos1">
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label for="photos2" class="col-md-4 control-label">Image 02</label>
                    <div class="col-md-6">
                        <input type="file" name="photos2" id="photos2">
                    </div>
                </div> --}}

                <div class="form-group">
                    <label for="display" class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                        <input id="display" type="checkbox" name="display" checked="checked" value="1"> Publish product
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
{{-- <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
      </div>
    	<div class="modal-body">
    		{{ Form::open(['method' => 'PUT','enctype' => 'multipart/form-data','class' => 'form-horizontal', 'url' => "admin/product/0"]) }}
                {{ csrf_field() }}

                <input type="hidden" name="hdn_id" class="hdn_id" value="">

                <div class="form-group{{ $errors->has('edit_name') ? ' has-error' : '' }}">
                    <label for="edit_name" class="col-md-4 control-label">Name<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_name" type="text" class="form-control" name="edit_name" value="{{ old('edit_name') }}" placeholder="Product name">

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
                        <input id="edit_item_code" type="text" class="form-control" name="edit_item_code" value="{{ old('edit_item_code') }}" placeholder="Product item code">

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
                                    <option value="{{$cat->id}}" @if(old('edit_cate_id')==$cat->id){{'selected'}}@endif>{{$cat->name}}</option>
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
                                    <option value="{{$cat->id}}" @if(old('edit_merchant_id')==$cat->id){{'selected'}}@endif>{{$cat->name}}</option>
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
                        <textarea id="edit_specification" type="text" class="form-control" name="edit_specification">{{ old('edit_specification') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_over_view" class="col-md-4 control-label">Over View</label>
                    <div class="col-md-6">
                        <textarea id="edit_over_view" type="text" class="form-control" name="edit_over_view">{{ old('edit_over_view') }}</textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('edit_quantity') ? ' has-error' : '' }}">
                    <label for="edit_quantity" class="col-md-4 control-label">Quantity<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <input id="edit_quantity" type="number" class="form-control" name="edit_quantity" value="{{ old('edit_quantity') }}">

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
                        <input id="edit_weight" type="text" class="form-control" name="edit_weight" value="{{ old('edit_weight') }}" placeholder="Exam: 1.2 gm or 1 kg">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_price" class="col-md-4 control-label">Price</label>
                    <div class="col-md-6">
                        <input id="edit_price" type="number" class="form-control" name="edit_price" value="{{ old('edit_price') }}" placeholder="Exam: 1200 or 500 or 150 ">
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
                        <span style="color:green;" id="edit_photos1"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_display" class="col-md-4 control-label"></label>
                    <div class="col-md-6">
                        <input id="edit_display" type="checkbox" name="edit_display" value="1"> Publish product
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
</div> --}}


@endsection

@section('script')

<script src="{{URL::asset('assets/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        CKEDITOR.replace( 'specification' );
        CKEDITOR.replace( 'edit_specification' );
    });

    $("#myModal").on("hidden.bs.modal", function(){
        
        $('.hdn_id').val('');
        $('#edit_name').val('');
        $('#edit_item_code').val('');
        $('#edit_cate_id').val('');
        $('#edit_merchant_id').val('');
        $('#edit_over_view').val('');
        $('#edit_features').val('');
        $('#edit_stall_location').val('');
        $('#edit_quantity').val('');
        $('#edit_weight').val('');
        $('#edit_price').val('');
        $('#discount_id').val('');
    });
	
	$('.edit-btn').click(function(event) {
		
		var id = $(this).data("options").id;
		$('.hdn_id').val(id);

		var APP_URL = {!! json_encode(url('/')) !!}

		$.ajax({
			url: APP_URL+"/admin/product/"+id+"/edit",
			type: 'GET',
		})
		.done(function(data) {
			
            $('#edit_name').val(data['name']);
            $('#edit_item_code').val(data['item_code']);
            $('#edit_cate_id').val(data['cate_id']);
            $('#edit_merchant_id').val(data['merchant_id']);
            //$('#edit_specification').val(data['specification']);
            CKEDITOR.instances['edit_specification'].setData(data['specification']);
            $('#edit_over_view').val(data['over_view']);
            $('#edit_features').val(data['features']);
            $('#edit_stall_location').val(data['stall_location']);
            $('#edit_quantity').val(data['quantity']);
            $('#edit_weight').val(data['weight']);
            $('#edit_price').val(data['price']);
            $('#discount_id').val(data['discount_id']);
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

            if(data['img2'].length > 0){
                $('#edit_photos2').html('Already have a image');
            }
            else{
                $('#edit_photos2').html('');
            }
		});
	});

</script>
@endsection
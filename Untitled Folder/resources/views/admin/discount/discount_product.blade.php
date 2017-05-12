@extends('layouts.master')

@section('content')
    <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target=".assign-discount">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Assign Discount
    </button>

	<div class="row">
		<table class="table">
			<tr>
				<th>Sl.</th>
				<th>Name<br>Category<br>Merchant</th>
                <th>Image1</th>
                <th>Image2</th>
				<th>Specification</th>
                <th>Over view</th>
				<th>Features</th>
                <th>Quantity<br>Weight<br>Price</th>
                <th></th>
			</tr>
            @if(count($all) > 0)
                <?php $count=1; ?>
                @foreach($all as $info)
                <tr>
                    <td>{{$count++}}</td>
                    <td>
                        #Name: {{$info->name}}<br>
                        #Code: {{$info->item_code}}<br>
                        #Category: {{$info->one_category->name}}<br>
                        #Merchant: {{$info->merchant->name}}
                    </td>
                    <td>
                        @if(!empty($info->img1))
                            <img width="100px" src="{{asset("assets/product_img/small/$info->img1")}}">
                        @endif
                    </td>
                    <td>
                        @if(!empty($info->img2))
                            <img width="100px" src="{{asset("assets/product_img/small/$info->img2")}}">
                        @endif
                    </td>
                    <td>{{$info->specification}}</td>
                    <td>{{$info->over_view}}</td>
                    <td>{{$info->features}}</td>
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
                        <button class="btn btn-xs btn-success edit-btn" data-toggle="modal" data-target="#myModal" data-options='{"id":"<?php echo $info->id; ?>"}'>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            @endif
		</table>		
	</div>

<!-- Modal assign discount -->
<div class="modal fade bs-example-modal-lg assign-discount" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Assign Discount</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('admin/assign_discount') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">Type<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="type" type="text" class="form-control cls-type" name="type">
                            <option value="">Select Type</option>
                            <option value="1" @if(old('type')==1){{'selected'}}@endif>{{"Merchant"}}</option>
                            <option value="2" @if(old('type')==2){{'selected'}}@endif>{{"Category"}}</option>
                        </select>

                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cate_id') ? ' has-error' : '' }} cls-category">
                    <label for="cate_id" class="col-md-4 control-label">Product Category<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="cate_id" type="text" class="form-control" name="cate_id">
                            <option value="0">Select category</option>
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

                <div class="form-group{{ $errors->has('merchant_id') ? ' has-error' : '' }} cls-merchant">
                    <label for="merchant_id" class="col-md-4 control-label">Merchant<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="merchant_id" type="text" class="form-control" name="merchant_id">
                            <option value="0">Select merchant</option>
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


                <div class="form-group{{ $errors->has('discount_id') ? ' has-error' : '' }}">
                    <label for="discount_id" class="col-md-4 control-label">Discount<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="discount_id" type="text" class="form-control" name="discount_id">
                            <option value="">Select Discount Type</option>
                            @if(count($discountss) > 0)
                                @foreach($discountss as $dis)
                                    <option value="{{$dis->id}}">{{$dis->percent."% - ".$dis->details}}</option>
                                @endforeach
                            @endif
                        </select>

                        @if($errors->has('discount_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('discount_id') }}</strong>
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
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
      </div>
    	<div class="modal-body">
    		{{ Form::open(['method' => 'POST','enctype' => 'multipart/form-data','class' => 'form-horizontal', 'url' => "admin/edit_product_discount"]) }}
                {{ csrf_field() }}

                <input type="hidden" name="hdn_id" class="hdn_id" value="">


                <div class="form-group">
                    <label for="edit_cate_id" class="col-md-4 control-label">Discount<span class="mendatory-fld">*</span></label>

                    <div class="col-md-6">
                        <select id="edit_cate_id" type="text" class="form-control" name="cate_id">
                            @if(count($discountss) > 0)
                                @foreach($discountss as $dis)
                                    <option value="{{$dis->id}}">{{$dis->percent."% - ".$dis->details}}</option>
                                @endforeach
                                    <option value="0">Remove discount</option>
                            @endif
                        </select>
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
	
    $(document).ready(function() {
        
        var val = $('.cls-type').val();

        if(val == 1){
            $('.cls-merchant').show();
            $('.cls-category').hide();
        }
        else if(val == 2){
            $('.cls-merchant').hide();
            $('.cls-category').show();
        }
        else{
            $('.cls-merchant').hide();
            $('.cls-category').hide();
        }
    });

    $('.cls-type').change(function(event) {
        
        var val = $(this).val();

        if(val == 1){
            $('.cls-merchant').show();
            $('.cls-category').hide();
            $('#cate_id').val('0');
        }
        else if(val == 2){
            $('.cls-merchant').hide();
            $('#merchant_id').val('0');
            $('.cls-category').show();
        }
        else{
            $('.cls-merchant').hide();
            $('#merchant_id').val('0');
            $('.cls-category').hide();
            $('#cate_id').val('0');
        }
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
            $('#edit_cate_id').val(data['discount_id']);
		});
	});

</script>
@endsection
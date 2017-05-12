@extends('front_end.layout.layout_inner')

@section('style')
	<style type="text/css">
		
		.navbar{
          margin-bottom: 0px !important;
        }
	</style>
@endsection

@section('content')

	<div class="left">
        <img src="{{URL::asset('assets/front_end/img/left.png')}}" alt="">
    </div>
    <div class="right">
        <img src="{{URL::asset('assets/front_end/img/right.png')}}" alt="">
    </div>

   	<div class="col-xs-12 col-sm-6 col-md-10 product_right" style="">
		<div class="row">
			<?php $j=0; ?>
			@if($all)
				@foreach($all as $info)
					<?php $j = $j+1; ?>
					<a href="{{url("product_details/$info->id")}}">
			            <div class="col-xs-6 col-lg-6">

			            	@if (Storage::exists('product_img/big/'.$info->img1) && !empty($info->img1))
								<img src="{{URL::asset("assets/product_img/big/$info->img1")}}" alt="" class="img-responsive" width="100%">
							@else
								<img src="{{URL::asset("assets/front_end/demo.png")}}" alt="" class="img-responsive" width="100%">
							@endif

							<p style="text-align: center;font-weight: bold;color:#3E6736; padding:15px;">
								{{str_limit($info->name, $limit = 20, $end = '...')}} 
							</p>
							{{-- <p>Category: {{$info->one_category->name or ''}}</p>
							<p>Weight: {{$info->weight}}</p>
							<p>Tk. {{$info->price}}</p> --}}
							{{-- <p class="org">{{$info->merchant->name or ''}}</p>--}}
							{{-- <p><a class="btn btn-success btn-xs" href="{{url("product_details/$info->id")}}" role="button">Details »</a></p> --}}
						</div>
					</a>
				@endforeach
			@endif

			@if(count($all) == 0)
				<span style="color: #118A71;">
					<h3>No product available ...</h3>
				</span>
			@endif

          </div>
          <div>
        	@if($all && $category != 'from index page')
				{{ $all->appends(['category' => $category])->appends(['amount' => $amount])->links() }}
        	@endif
          </div>
		  {{-- <hr> category=1&amount=0+Tk-579+Tk
		<div class="row">
            <div class="col-xs-6 col-lg-3 product">
				<img src="{{URL::asset('assets/front_end/img/p1.jpg')}}" alt="" class="img-responsive" width="100%"><br>
				<b>Lunch Box</b>
				<p>Category: Basket</p>
				<p>Size: 5x8 ft</p>
				<p>Tk. 467.00</p>
				<p class="org">JuteCrafts Ltd.</p>           
				<p><a class="btn btn-success btn-xs" href="#" role="button">Details »</a></p>
			</div>
        </div> --}}
	
  	</div>

@endsection



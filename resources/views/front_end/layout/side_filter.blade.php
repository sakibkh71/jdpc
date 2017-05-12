		{{-- <img src="{{URL::asset('assets/front_end/img/logo.png')}}" alt="" > --}}
		
		<form class="form-horizontal" role="form" method="GET" action="{{url('search_by_cate_amount')}}">

			{{-- {{ csrf_field() }} --}}

	  		<h3>Categories</h3>
			<div class="radio">
			  <label>
			    <input name="category" class="cls-cat" checked="checked" value="0" type="radio">
			    All
			  </label>
			</div>
			
			@foreach($product_category as $pc)
			<div class="radio">
			  <label>
			    <input name="category" class="cls-cat" value="{{$pc->id}}" type="radio">
			    {{$pc->name}}
			  </label>
			</div>
			@endforeach
	    	<h3>Price range</h3>

			<p>
				<input type="text" name="amount" id="amount" style="border:0; font-weight:bold;">
			</p>
			<div id="slider-range"></div><br>
			  
			<p class="text-center">
				<button href="#" type="submit" class="btn btn-danger btn-block glyphicon glyphicon-search btn-side-filter" role="button"></button>
			</p>
    	</form>
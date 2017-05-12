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
    <div class="col-xs-12 col-sm-6 col-md-10" style="padding-top:20px;">
        <ul class="list-inline">
            <li>
                <a href="#">
                    {{$info->one_category->name}}
                </a>
                <span aria-hidden="true" class="glyphicon glyphicon-chevron-right">
                </span>
            </li>
            <li>
                <a href="#">
                    {{$info->name}}
                </a>
                <span aria-hidden="true" class="glyphicon glyphicon-chevron-right">
                </span>
            </li>
            <li class="active">
                Details
            </li>
        </ul>
        <hr>
            <div class="row related">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    @if (Storage::exists('product_img/big/'.$info->img1) && !empty($info->img1))
                        <img alt="{{$info->img1}}" style="" class="img-responsive" src="{{URL::asset("assets/product_img/big/$info->img1")}}"/>
                    @else
                        <img alt="{{$info->img1}}" style="height:380px;width:470px;" class="img-responsive" src="{{URL::asset("assets/front_end/demo.png")}}"/>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6" style="min-height:380px;">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 style="margin-top:0;">
                                {{$info->name}}
                            </h3>        
                        </div>   
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Item code
                                </th>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{$info->item_code}}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Price
                                </th>
                                <td>
                                    :
                                </td>
                                <td>
                                    TK. {{$info->price}}
                                </td>
                            </tr>
                            {{-- <tr>
                                <th scope="row">
                                    Weight
                                </th>
                                <td>
                                    :
                                </td>
                                <td>
                                    @if($info->weight)
                                        {{$info->weight}}
                                    @else
                                        {{"N/A"}}
                                    @endif
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <hr>
                        <div class="panel-group pro_de" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
                                            <span class="glyphicon glyphicon-plus">
                                            </span>
                                            Overview
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseOne">
                                    <div class="panel-body text-justify">
                                        @if($info->over_view)
                                            {{$info->over_view}}
                                        @else
                                            {{"N/A"}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                                            <span class="glyphicon glyphicon-minus">
                                            </span>
                                            Product Specification
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseTwo">
                                    <div class="panel-body text-justify">
                                        @if($info->specification)
                                            {!! $info->specification !!}
                                        @else
                                            {{"N/A"}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">
                                            <span class="glyphicon glyphicon-plus">
                                            </span>
                                            Product Features
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseThree">
                                    <div class="panel-body text-justify">
                                        @if($info->features)
                                            {{$info->features}}
                                        @else
                                            {{"N/A"}}
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseFive">
                                            <span class="glyphicon glyphicon-plus">
                                            </span>
                                            Stall Location
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseFive">
                                    <div class="panel-body text-justify">
                                        @if($info->stall_location)
                                            {{$info->stall_location}}
                                        @else
                                            {{"N/A"}}
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseFour">
                                            <span class="glyphicon glyphicon-plus">
                                            </span>
                                            Merchant Info
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseFour">
                                    <div class="panel-body text-justify">
                                        Name: {{$info->merchant->name or "N/A"}}<br>
                                        Email: {{$info->merchant->email or "N/A"}}<br>
                                        Mobile No: @if($info->merchant->mob)
                                                        {{$info->merchant->mob}}
                                                    @else
                                                        {{"N/A"}}
                                                    @endif
                                                    <br>
                                        Company Name:   @if($info->merchant->company_name)
                                                        {{$info->merchant->company_name}}
                                                        @else
                                                            {{"N/A"}}
                                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </hr>
                </div>
                <h3 style="color:#d80000;">
                    Related Products
                </h3>
                <hr>
                    @if($related)
                        @foreach($related as $info)
                            <div class="col-sm-6 col-md-3">
                                <p class="text-center">
                                    <img alt="{{$info->name}}" height="156px" width="155px" src="{{URL::asset("assets/product_img/small/$info->img1")}}"/>
                                </p>
                                <p class="pro_rela text-center">
                                    <a href="{{url("product_details/$info->id")}}">
                                        {{$info->name}}
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    @endif
                </hr>
            </div>
        </hr>
    </div>
@endsection


@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
		}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
		});
	});
</script>
@endsection

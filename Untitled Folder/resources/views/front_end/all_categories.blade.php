@extends('front_end.layout.layout')

@section('content')

  <div class="container">
  <div class="row">
      <a href="{{url("products/1")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p1.jpg')}}" alt="">
              <div class="overlay">
                 <h2>BAGS</h2>
              </div>
          </div>
      </div>
      </a>
      <a href="{{url("products/8")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p2.jpg')}}" alt="">
              <div class="overlay">
                 <h2>OFFICE ITEM</h2>
                 
              </div>
          </div>
      </div>
      </a>
      <a href="{{url("products/7")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" height="400px" src="{{URL::asset('assets/front_end/img/p3.jpg')}}" alt="">
              <div class="overlay">
                 <h2>BUSKETS</h2>
                 
              </div>
          </div>
      </div>
      </a>
      <a href="{{url("products/4")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p4.jpg')}}" alt="">
              <div class="overlay">
                 <h2>DECORATION ITEM</h2>
                 
              </div>
          </div>
      </div>
      </a>
      
  </div><br>
  <div class="row">
      <a href="{{url("products/9")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p5.jpg')}}" alt="">
              <div class="overlay">
                 <h2>HOME TEXTILE</h2>
                 
              </div>
          </div>
      </div>
      </a>
      <a href="{{url("products/6")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p6.jpg')}}" alt="">
              <div class="overlay">
                 <h2>FASHION AND TEXTILE</h2>
                 
              </div>
          </div>
      </div>
      </a>
      <a href="{{url("products/10")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p7.jpg')}}" alt="">
              <div class="overlay">
                 <h2>VARIOUS SHOES</h2>
                 
              </div>
          </div>
      </div>
      </a>
      <a href="{{url("products/11")}}">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect">
              <img class="img-responsive" src="{{URL::asset('assets/front_end/img/p8.jpg')}}" alt="">
              <div class="overlay">
                 <h2>CARFET / FLOOR MAT</h2>
              </div>
          </div>
      </div>
      </a>
      
  </div>
</div>
@stop

@section('script')
  
@stop
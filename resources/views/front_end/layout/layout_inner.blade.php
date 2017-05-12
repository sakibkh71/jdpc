<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <title>JDPC|{{$title or 'Products'}}</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
      <!-- Bootstrap -->
      <link href="{{URL::asset('assets/front_end/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{URL::asset('assets/front_end/css/custom.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

      @yield('style')
      
	</head>

  <body id="page">
  		   
    <div id="wrap">

      @include('front_end.layout.top_nav')
      <!-- Begin page content  main_con-->
      <div class="container " style="background:#fff;">
        <div class="col-xs-6 col-md-2">
            @include('front_end.layout.side_filter')
        </div>
        @yield('content')
      </div>

    </div>
    
      @include('front_end.layout.footer')

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>	
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="{{URL::asset('assets/front_end/js/modernizr.custom.86080.js')}}"></script>
    <script src="{{URL::asset('assets/front_end/js/bootstrap.min.js')}}"></script>

    @yield('script')

    <script>

    $(document).ready(function() {
    
      var value = localStorage.getItem("cls_cat");   

      if(value != null){
        $('input[name=category][value='+value+']').attr('checked', true); 
      }

      $('.cls-cat').click(function(event){
        
        var value = $(this).val();
        localStorage.setItem("cls_cat", value);
      });

      $('.btn-side-filter').click(function(event) {
        
        var value = $('#amount').val();
        var arr = value.split('-');
        localStorage.setItem("amount_min", arr[0].slice(0,-3));
        localStorage.setItem("amount_max", arr[1].slice(0,-3));
      });

    });    

    $(function() {
    
    var start=localStorage.getItem("amount_min")===null?0:localStorage.getItem("amount_min");
    var end=localStorage.getItem("amount_max")===null?15000:localStorage.getItem("amount_max");
    
    $("#slider-range").slider({

      range: true,
      min: 0,
      max: 15000,
      values: [ start, end ],
      slide: function( event, ui ) {
       $( "#amount" ).val(ui.values[ 0 ] + " Tk-" + ui.values[ 1 ] +" Tk");
      }
      });

      $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
      " Tk-" + $( "#slider-range" ).slider( "values", 1 ) +" Tk");
      });

      var page_url = $(location).attr('href').slice(0,-1);
      var base_url = {!! json_encode(url('/')) !!};
      
      // if(base_url.length == page_url.length){
      //   alert('index page');
      // }
      // else{
      //   alert('not');
      // }

    </script>
  </body>
</html>
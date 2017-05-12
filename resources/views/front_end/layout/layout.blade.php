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
      <link href="{{URL::asset('assets/front_end/css/jquery-ui.css')}}" rel="stylesheet">
      {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}

      <style type="text/css">
        #overlay{
          margin-top: 8%;
          text-align: center;
        }
      </style>

      @yield('style')
      
	</head>

  <body id="page" class="bg">
  		   
    <div id="wrap">

      @include('front_end.layout.top_nav')
      
      <!-- Begin page content -->
      @yield('content')

      

    </div>
      
      @include('front_end.layout.footer')

    {{-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>	 --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <script src="{{URL::asset('assets/front_end/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/front_end/js/jquery-ui.js')}}"></script>
    {{-- <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> --}}
    <script type="text/javascript" src="{{URL::asset('assets/front_end/js/modernizr.custom.86080.js')}}"></script>
    <script src="{{URL::asset('assets/front_end/js/bootstrap.min.js')}}"></script>

    <script>
    $(document).ready(function() {
      
      localStorage.removeItem("cls_cat");
      localStorage.removeItem("amount_min");
      localStorage.removeItem("amount_max");
    });
    </script>

    @yield('script')


  </body>
</html>
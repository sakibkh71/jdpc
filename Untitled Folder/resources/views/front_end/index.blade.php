<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JDPC</title>
  

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}

 <!-- Bootstrap -->
    <link href="{{URL::asset('assets/front_end/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/front_end/css/custom.css')}}" rel="stylesheet">

    

  </head>

<body>


<div class="video-overlay"></div>

<video class="sqs-html5-video" style="height:90%" poster="{{URL::asset('assets/front_end/demo_bg.jpg')}}" autoplay loop>
    <source src="{{URL::asset('assets/front_end/02n.webm')}}" type="video/webm">
    <source src="{{URL::asset('assets/front_end/01n.mp4')}}" type="video/mp4">
    {{-- <source src="{{URL::asset('assets/front_end/jdpc.mov')}}" type="video/mov"> --}}
  
</video>

  <div class="col-md-12 text-copy text-center zoomin">
    <a class="navbar-brand " href="{{url('categories')}}">
      <img src="{{URL::asset('assets/front_end/img/logo.png')}}" alt="" class="img-responsive">
    </a>


  </div>
  <script src="{{URL::asset('assets/front_end/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('assets/front_end/js/modernizr.custom.86080.js')}}"></script>
  <script src="{{URL::asset('assets/front_end/js/bootstrap.min.js')}}"></script>
  </body>
</html>
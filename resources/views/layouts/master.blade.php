<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{"JDPC|"}}{{ $title or 'Admin'}}</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link href="{{URL::asset('assets/temp/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/temp/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/temp/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/temp/css/style.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/temp/css/main-style.css')}}" rel="stylesheet" />
    
    <style type="text/css">
        
        .mendatory-fld{
            color: #F94F3B;
        }

        .user-section {
            background: #04B173 !important;
        }

        #navbar{
            background: #118A71;
        }

        .navbar-static-side ul li {
            border-bottom: none !important;
        }

        #page-wrapper{
            background-color: #F5F5F5;
        }

    </style>
    @yield('style')
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        @include('layouts.navbar_top')
        <!-- end navbar top -->

        <!-- navbar side -->
        @include('layouts.navbar_side')
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{$title or 'Admin Panel'}}</h1>
                </div>
            </div>

            @include('layouts.msg')

            @yield('content')
            
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{URL::asset('assets/temp/plugins/jquery-1.10.2.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="{{URL::asset('assets/temp/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/temp/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('assets/temp/plugins/pace/pace.js')}}"></script>
    <script src="{{URL::asset('assets/temp/scripts/siminta.js')}}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    @yield('script')
</body>

</html>

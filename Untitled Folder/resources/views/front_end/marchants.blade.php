@extends('front_end.layout.layout_inner')

@section('content')
    <div class="col-xs-12 col-sm-6 col-md-10 text-justify">
        <ul class="list-inline bg-info">
            <li><a href="#">Home</a> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></li>
            <li class="active">Marchants</li>
        </ul>
        <hr>
        <div class="row">
            @if($all)
                @foreach($all as $info)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            @if($info->img1)
                                <img src="{{asset("assets/user_img/big/$info->img1")}}" alt="{{$info->name}}" >
                            @else
                                <img src="{{asset('assets/front_end/img/logo.png')}}" alt="" >
                            @endif
                            <div class="caption">
                                <h4>{{$info->name}}</h4>
                                <p><strong>Address:</strong> <br>
                                {{$info->address or "N/A"}}
                                <br>
                                phone: {{$info->mob or "N/A"}}<br>
                                 e-mail: <a class="mailto" href="{{$info->email}}">{{$info->email}}</a><br>
                                 Web: <a href="{{$info->website}}">{{$info->website}}</a>
                                </p>
                                <p><strong>Details:</strong> <br>
                                    {{$info->details}}
                                </p>
                            </div>
                        </div>
                    </div>   
                @endforeach
            @endif
        </div>
    </div>
@endsection


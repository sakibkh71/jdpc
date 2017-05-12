
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="{{url('/')}}"><img src="{{URL::asset('assets/front_end/img/logo.png')}}" alt="" class="img-responsive"></a>
        </div>
        <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="{{url('/')}}">Home</a></li>
                  <li>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
                      <ul class="dropdown-menu"> 
                          <li>
                            <a href="{{url("categories")}}">All</a>
                          </li>
                          @if($product_category)
                            @foreach($product_category as $pc)
                              <li>
                                <a href="{{url("products/$pc->id")}}">{{$pc->name}}</a>
                              </li>
                            @endforeach
                          @endif
                      </ul>
                  </li>
              </ul>
            
            <div class="col-sm-3 col-md-3 pull-right search_fil">
            <form action="{{url('search_by_name')}}" method="POST">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Product name or Item code ..." name="name">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>        
        </div><!--/.nav-collapse -->
    </div>
    
</div>
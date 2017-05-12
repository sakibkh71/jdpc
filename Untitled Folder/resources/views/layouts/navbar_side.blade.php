<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="{{URL::asset('assets/temp/img/user.jpg')}}" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong>{{Auth::user()->name}}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{url('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-archive" aria-hidden="true"></i> Products Info.<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/product_category')}}">All Categories</a>
                            </li>
                            <li>
                                <a href="{{url('admin/product')}}">All Products</a>
                            </li>
                            <li>
                                <a href="{{url('admin/discount')}}">Discount Info</a>
                            </li>
                            <li>
                                <a href="{{url('admin/discount_product')}}">Discount Products</a>
                            </li>
                        </ul>
                    </li>

                    @if (Auth::user()->is('admin|superadmin'))

                    <li class="">
                        <a href="{{url('admin/merchants')}}"><i class="fa fa-user" aria-hidden="true"></i> Merchants</a>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="">
                                <a href="#">User <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{url('admin/add_user')}}">Add user</a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/all_user')}}">All users</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    @endif
                    
                </ul>
            </div>
        </nav>
@extends('layouts.master')
@section('content')

        {{-- <div class="row">
        
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>Jonny Deen </b><i class="fa  fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answere. nbsp;
                </div>
            </div>
            
        </div> --}}


        {{-- <div class="row">
            <div class="col-lg-3">
                <div class="alert alert-danger text-center">
                    <i class="fa fa-calendar fa-3x"></i>&nbsp;<b>20 </b>Meetings Sheduled This Month

                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-success text-center">
                    <i class="fa  fa-beer fa-3x"></i>&nbsp;<b>27 % </b>Profit Recorded in This Month  
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-info text-center">
                    <i class="fa fa-rss fa-3x"></i>&nbsp;<b>1,900</b> New Subscribers This Year

                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-warning text-center">
                    <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b>2,000 $ </b>Payment Dues For Rejected Items
                </div>
            </div>
        </div>
 --}}
        <div class="row">
            @if (Auth::user()->is('admin|superadmin'))
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                            <h3>{{$merchant->count()}} </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Merchants
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-th fa-3x" aria-hidden="true"></i>
                            <h3>{{$products->count()}} </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Products
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                            <h3>20</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Users
                            </span>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-th fa-3x" aria-hidden="true"></i>
                            <h3>{{$products->count()}} </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Products
                            </span>
                        </div>
                    </div>
                </div>
            @endif
                
            {{-- <div class="col-lg-3">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body red">
                        <i class="fa fa-archive fa-3x" aria-hidden="true"></i>
                        <h3>2,700 </h3>
                    </div>
                    <div class="panel-footer">
                        <span class="panel-eyecandy-title">Best Selling Products
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body red">
                        <i class="fa fa-circle-o fa-3x" aria-hidden="true"></i>
                        <h3>2,700 </h3>
                    </div>
                    <div class="panel-footer">
                        <span class="panel-eyecandy-title">Stock Zero
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body green">
                        <i class="fa fa-thumbs-up fa-3x"></i>
                        <h3>2,700 </h3>
                    </div>
                    <div class="panel-footer">
                        <span class="panel-eyecandy-title">Stock Below 5
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body blue">
                        <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                        <h3>2,700 </h3>
                    </div>
                    <div class="panel-footer">
                        <span class="panel-eyecandy-title">Best Merchant
                        </span>
                    </div>
                </div>
            </div> --}}

        </div>
@endsection
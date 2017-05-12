<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\User;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(Auth::user()->is('admin')){
    	    $data['title'] = "Admin panel";
        }
        else{
            $data['title'] = "User panel";
        }   
        
    	$data['products'] = product::where('display',1)->get();
    	$data['merchant'] = User::whereHas('roles', function($q){
                            $q->where('slug', 'merchant');
                        })->orderBy('id','desc')->where('display',1)->get();;
    	return view('admin.admin_home', $data);
    }
}

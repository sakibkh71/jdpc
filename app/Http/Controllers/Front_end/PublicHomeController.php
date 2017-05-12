<?php

namespace App\Http\Controllers\Front_end;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;

class PublicHomeController extends Controller
{
    public function index()
    {
    	$data['title'] = "Home";
    	return view('front_end.index',$data);
    }

    public function categories()
    {
        $data['title'] = "Categories";
        return view('front_end.all_categories',$data);
    }

    public function products($id)
    {
    	$data['title'] = "Products";
        $data['category'] = "";
        $data['amount'] = "";
    	$data['all'] = Product::with('one_category','merchant')->where('cate_id',$id)->where('display',1)->paginate(26);
        return view('front_end.product',$data);
    }

    public function product_details($id)
    {
    	$data['title'] = "Details";
    	$data['info'] = Product::with('one_category','merchant')->where('id',$id)->first();
    	$data['related'] = Product::where('cate_id',$data['info']->cate_id)->where('id','!=',$id)->take(4)->get();
        return view('front_end.product_details',$data);
    }

    public function search_by_cate_amount(Request $req)
    {
        $data['title'] = "Search result";
        $category = $data['category'] = $req->category;
        $amount = $data['amount'] = $req->amount;

        $pieces = explode("-", $amount);
        $from = substr($pieces[0],0,-3);
        $to = substr($pieces[1],0,-3);

        if($category > 0)
        {
        $data['all'] = Product::with('one_category','merchant')
                        ->where('cate_id',$category)
                        ->whereBetween('price', [$from, $to])
                        ->where('display',1)->paginate(26);
        }
        else
        {
        $data['all'] = Product::with('one_category','merchant')
                        ->whereBetween('price', [$from, $to])
                        ->where('display',1)->paginate(26);   
        }
        

        return view('front_end.product',$data);
    }

    public function search_by_name(Request $req)
    {
        $data['title'] = "Search Result";
        $name = $req->name;
        $data['category'] = "from index page";
        
        $for_item_code = str_replace (" ", "", $name);

        $data['all'] = Product::with('one_category','merchant')
                        ->where('item_code', $for_item_code)
                        ->where('display',1)->get();

        if(count($data['all']) == 0)
        {
        $data['all'] = Product::with('one_category','merchant')
                        ->where('name', 'like', "%$name%")
                        ->where('display',1)->get();
        }


        return view('front_end.product',$data);
    }

    public function privacy_policy(){

        $data['title'] = "Privacy Policy";

        return view('front_end.privacy_policy',$data);
    }

    public function terms_of_use(){

        $data['title'] = "Terms of Use";

        return view('front_end.terms_of_use',$data);
    }

    public function marchants(){

        $data['title'] = "Marchants";

        $data['all']  = User::whereHas('roles', function($q){
                            $q->where('slug', 'merchant');
                        })->orderBy('id','desc')->get();

        return view('front_end.marchants',$data);
    }
}

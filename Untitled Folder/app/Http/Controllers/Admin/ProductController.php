<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

use App\User;
use Bican\Roles\Models\Role;
use App\Models\Discountm;
use Bican\Roles\Traits\RoleHasRelations;
use Validator;
use Image;
use Storage;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['title'] = "Products";
        $data['category'] = ProductCategory::where('display',1)->get();
        $data['marchant'] =  User::whereHas('roles', function($q){
            $q->where('slug', 'merchant');
        })->get();

        date_default_timezone_set("Asia/Dhaka");
        $today = date("Y-m-d");
        $data['discountss'] = Discountm::where('end','>=',$today)->where('display',1)->get();
        $data['all'] = Product::with('one_category','merchant','discount')->orderBy('id','DESC')->get();

        return view('admin.product.product',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $name = $request->name;
        $cate_id = $request->cate_id;
        $item_code = $request->item_code;
        $merchant_id = $request->merchant_id;
        $specification = $request->specification;
        $over_view = $request->over_view;
        // $features = $request->features;
        // $stall_location = $request->stall_location;
        $quantity = $request->quantity;
        $weight = $request->weight;
        $price = $request->price;
        $display = $request->display;

        $quantity = $quantity>0?$quantity:0;
        $display = $display==1?1:0;
        $post_by = Auth::User()->id;

        $data = [
            'name' => $name,
            'cate_id' => $cate_id,
            'merchant_id' => $merchant_id,
            'quantity' => $quantity,
        ];

        $validator = Validator::make($data, [
            'name' => 'required',
            'cate_id' => 'required',
            'quantity' => 'required',
            'merchant_id' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Product info not saved. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
            $sav = new Product;
            $sav->name = $name;
            $sav->item_code = $item_code;
            $sav->cate_id = $cate_id;
            $sav->merchant_id = $merchant_id;
            $sav->specification = $specification;
            $sav->over_view = $over_view;
            // $sav->features = $features;
            // $sav->stall_location = $stall_location;
            $sav->quantity = $quantity;
            $sav->weight = $weight;
            $sav->price = $price;
            $sav->display = $display;
            $sav->post_by = $post_by;

                //img1
                $file1 = $request->file('photos1');
                $new_name1 = $this->store_img($request,'photos1',$file1,'img1');

                if($new_name1 != 'noImg'){
                    if($new_name1 != 'error'){
                        Image::make($file1->getRealPath())->save('assets/product_img/big/'.$new_name1); 
                        Image::make($file1->getRealPath())->resize(398, 360)->save('assets/product_img/small/'.$new_name1);
                        $sav->img1 = $new_name1;        //save value
                    }
                    else{
                        return redirect()->back()->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

                //img2
                $file2 = $request->file('photos2');
                $new_name2 = $this->store_img($request,'photos2',$file2,'img2');

                if($new_name2 != 'noImg'){
                    if($new_name2 != 'error'){
                        Image::make($file2->getRealPath())->save('assets/product_img/big/'.$new_name2); 
                        Image::make($file2->getRealPath())->resize(398, 360)->save('assets/product_img/small/'.$new_name2);
                        $sav->img2 = $new_name2;        //save value
                    }
                    else{
                        return redirect()->back()->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

            $sav->save();


            return redirect()->back()->with('success','Product saved successfully !');
        }

    }

    
    public function show($id) //delete item
    {
        $del = Product::find($id);
        $this->delete_after_update($del->img1); //calling function
        $this->delete_after_update($del->img2);
        $del->delete();

        return redirect()->back()->with('success','Data deleted !');
    }

    
    public function edit($id)
    {
        $fet = Product::find($id);
        $data['name'] = $fet->name;
        $data['item_code'] = $fet->item_code;
        $data['cate_id'] = $fet->cate_id;
        $data['merchant_id'] = $fet->merchant_id;
        $data['specification'] = $fet->specification;
        $data['over_view'] = $fet->over_view;
        // $data['features'] = $fet->features;
        // $data['stall_location'] = $fet->stall_location;
        $data['quantity'] = $fet->quantity;
        $data['weight'] = $fet->weight;
        $data['price'] = $fet->price;
        $data['display'] = $fet->display;
        $data['img1'] = $fet->img1;
        $data['img2'] = $fet->img2;
        $data['discount_id'] = $fet->discount_id;

        return $data;
    }

    
    public function update(Request $request, $id)
    {
        $id = $request->hdn_id;

        $del = Product::find($id); //for delete img
        
        $name = $request->edit_name;
        $item_code = $request->edit_item_code;
        $cate_id = $request->edit_cate_id;
        $merchant_id = $request->edit_merchant_id;
        $specification = $request->edit_specification;
        $over_view = $request->edit_over_view;
        $features = $request->edit_features;
        $stall_location = $request->edit_stall_location;
        $quantity = $request->edit_quantity;
        $weight = $request->edit_weight;
        $price = $request->edit_price;
        $discount_id = $request->discount_id;
        $display = $request->edit_display;

        $quantity = $quantity>0?$quantity:0;
        $display = $display==1?1:0;
        $post_by = Auth::User()->id;

        $data = [
            'edit_name' => $name,
            'edit_cate_id' => $cate_id,
            'edit_merchant_id' => $merchant_id,
            'edit_quantity' => $quantity,
        ];

        $validator = Validator::make($data, [
            'edit_name' => 'required',
            'edit_cate_id' => 'required',
            'edit_quantity' => 'required',
            'edit_merchant_id' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('admin/product')
                    ->with('danger','Product info not updated. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
            $sav = Product::find($id);
            $sav->name = $name;
            $sav->item_code = $item_code;
            $sav->cate_id = $cate_id;
            $sav->merchant_id = $merchant_id;
            $sav->specification = $specification;
            $sav->over_view = $over_view;
            $sav->features = $features;
            $sav->stall_location = $stall_location;
            $sav->quantity = $quantity;
            $sav->weight = $weight;
            $sav->price = $price;
            $sav->discount_id = $discount_id;
            $sav->display = $display;
            $sav->post_by = $post_by;

                //img1
                $file1 = $request->file('photos1');
                $new_name1 = $this->store_img($request,'photos1',$file1,'img1');

                if($new_name1 != 'noImg'){
                    if($new_name1 != 'error'){
                        Image::make($file1->getRealPath())->save('assets/product_img/big/'.$new_name1); 
                        Image::make($file1->getRealPath())->resize(398, 360)->save('assets/product_img/small/'.$new_name1);
                        $sav->img1 = $new_name1;        //save value

                        //delete previous img
                        $this->delete_after_update($del->img1);
                    }
                    else{
                        return redirect('admin/product')->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

                //img2
                $file2 = $request->file('photos2');
                $new_name2 = $this->store_img($request,'photos2',$file2,'img2');

                if($new_name2 != 'noImg'){
                    if($new_name2 != 'error'){
                        Image::make($file2->getRealPath())->save('assets/product_img/big/'.$new_name2); 
                        Image::make($file2->getRealPath())->resize(398, 360)->save('assets/product_img/small/'.$new_name2);
                        $sav->img2 = $new_name2;        //save value

                        //delete previous img
                        $this->delete_after_update($del->img2);
                    }
                    else{
                        return redirect('admin/product')->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

            $sav->save();

            return redirect('admin/product')->with('success','Product updated successfully !');
        }

    }

    
    public function destroy($id)
    {
        //
    }

    public function delete_after_update($img){

        if (Storage::exists('product_img/big/'.$img) && !empty($img))
            {
                Storage::delete('product_img/big/'.$img); 
            }
        if (Storage::exists('product_img/small/'.$img) && !empty($img))
            {
                Storage::delete('product_img/small/'.$img); 
            }
    }

    public function store_img($request,$imgg,$file,$img_n)
    {
        if($request->hasFile($imgg)){
            $extension = $file->getClientOriginalExtension();
            $os = array("jpg", "jpeg", "png");

            if (in_array($extension, $os)){
                $newFileName = $img_n."_".date('d_m_y_h_m_s').".".$extension;

                return $newFileName;
            }
            else{
                //return redirect()->back()->with('msg','Please use jpg or png image.');
                return "error";
            }
        }
        else{
            return "noImg";
        }
    }

    public function search_product(Request $req)
    {
        $name = $req->name;
        $cate_id = $req->cate_id;
        $code = str_replace (" ", "", $req->code);

        $data['title'] = "Product Search Result";
        $data['category'] = ProductCategory::where('display',1)->get();
        $data['marchant'] =  User::whereHas('roles', function($q){
            $q->where('slug', 'merchant');
        })->get();

        if(!empty($name) && !empty($cate_id) && !empty($code))
        {
            $data['all'] = Product::with('one_category','merchant','discount')
                            ->where('name', 'like', "%$name%")
                            ->where('cate_id',$cate_id)
                            ->where('item_code',$code)
                            ->get();
        }
        elseif(!empty($name) && !empty($cate_id))
        {
            $data['all'] = Product::with('one_category','merchant','discount')
                            ->where('name', 'like', "%$name%")
                            ->where('cate_id',$cate_id)
                            ->get();
        }
        elseif(!empty($name) && !empty($code))
        {
            $data['all'] = Product::with('one_category','merchant','discount')
                            ->where('name', 'like', "%$name%")
                            ->where('item_code',$code)
                            ->get();
        }
        elseif(!empty($cate_id) && !empty($code))
        {
            $data['all'] = Product::with('one_category','merchant','discount')
                            ->where('cate_id',$cate_id)
                            ->where('item_code',$code)
                            ->get();
        }
        elseif(!empty($name))
        {
            $data['all'] = Product::with('one_category','merchant','discount')->where('name', 'like', "%$name%")->get();
        }
        elseif(!empty($cate_id))
        {
            $data['all'] = Product::with('one_category','merchant','discount')->where('cate_id',$cate_id)->get();
        }
        elseif(!empty($code))
        {
            $data['all'] = Product::with('one_category','merchant','discount')->where('item_code',$code)->get();
        }
        else{
            echo "WRONG";
        }

        date_default_timezone_set("Asia/Dhaka");
        $today = date("Y-m-d");
        $data['discountss'] = Discountm::where('end','>=',$today)->where('display',1)->get();

        return view('admin.product.product',$data);
    }
}

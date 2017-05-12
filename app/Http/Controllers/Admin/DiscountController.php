<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Discountm;
use App\Models\ProductCategory;
use App\Models\Product;
use App\User;
use Validator;
use Image;
use Storage;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['title'] = "Discount";
        $data['all'] = Discountm::all();

        return view('admin.discount.discount',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $percent = $request->percent;
        $cate_id = $request->cate_id;
        $details = $request->details;
        $start = $request->start;
        $end = $request->end;

        $display = $request->display;
        $display = $display==1?1:0;

        $data = [
            'percent' => $percent,
            'cate_id' => $cate_id,
            'start' => $start,
            'end' => $end,
        ];

        $validator = Validator::make($data, [
            'percent' => 'required',
            'cate_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Discount info not saved. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
            $sav = new Discountm;
            $sav->percent = $percent;
            $sav->cate_id = $cate_id;
            $sav->details = $details;
            $sav->start = $start;
            $sav->end = $end;
            $sav->display = $display;

                //img1
                $file1 = $request->file('photos1');
                $new_name1 = $this->store_img($request,'photos1',$file1,'img1');

                if($new_name1 != 'noImg'){
                    if($new_name1 != 'error'){
                        Image::make($file1->getRealPath())->save('assets/discount/big/'.$new_name1); 
                        Image::make($file1->getRealPath())->resize(233, 233)->save('assets/discount/small/'.$new_name1);
                        $sav->img1 = $new_name1;        //save value
                    }
                    else{
                        return redirect()->back()->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

            $sav->save();


            return redirect()->back()->with('success','Product saved successfully !');
        }
    }

    
    public function show($id)  //delete
    {
        $del = Discountm::find($id);
        $this->delete_after_update($del->img1); //calling function
        $del->delete();

        return redirect()->back()->with('success','Data deleted !');
    }

   
    public function edit($id)
    {
        $fet = Discountm::find($id);
        $data['percent'] = $fet->percent;
        $data['cate_id'] = $fet->cate_id;
        $data['details'] = $fet->details;
        $data['start'] = $fet->start;
        $data['end'] = $fet->end;
        $data['display'] = $fet->display;
        $data['img1'] = $fet->img1;

        return $data;
    }

    
    public function update(Request $request, $id)
    {
        $id = $request->hdn_id;

        $del = Discountm::find($id); //for delete img

        $percent = $request->edit_percent;
        $cate_id = $request->edit_cate_id;
        $details = $request->edit_details;
        $start = $request->edit_start;
        $end = $request->edit_end;

        $display = $request->edit_display;
        $display = $display==1?1:0;

        $data = [
            'percent' => $percent,
            'cate_id' => $cate_id,
            'start' => $start,
            'end' => $end,
        ];

        $validator = Validator::make($data, [
            'percent' => 'required',
            'cate_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Discount info not saved. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
            $sav = Discountm::find($id);
            $sav->percent = $percent;
            $sav->cate_id = $cate_id;
            $sav->details = $details;
            $sav->start = $start;
            $sav->end = $end;
            $sav->display = $display;

                //img1
                $file1 = $request->file('photos1');
                $new_name1 = $this->store_img($request,'photos1',$file1,'img1');

                if($new_name1 != 'noImg'){
                    if($new_name1 != 'error'){
                        Image::make($file1->getRealPath())->save('assets/discount/big/'.$new_name1); 
                        Image::make($file1->getRealPath())->resize(233, 233)->save('assets/discount/small/'.$new_name1);
                        $sav->img1 = $new_name1;        //save value

                        //delete previous img
                        $this->delete_after_update($del->img1);
                    }
                    else{
                        return redirect()->back()->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

                //echo $new_name1;
            $sav->save();


            return redirect()->back()->with('success','Data updated successfully !');
        }
    }

    
    public function destroy($id)
    {
        //
    }

    public function delete_after_update($img){

        if (Storage::exists('discount/big/'.$img) && !empty($img))
            {
                Storage::delete('discount/big/'.$img); 
            }
        if (Storage::exists('discount/small/'.$img) && !empty($img))
            {
                Storage::delete('discount/small/'.$img); 
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
                return "error";
            }
        }
        else{
            return "noImg";
        }
    }

    public function discount_product(){

        $data['title'] = "Discount Products";
        
        $data['all'] = Product::with('one_category','merchant','discount')->where('discount_id','>',0)->get();
        $data['category'] = ProductCategory::where('display',1)->get();
        $data['marchant'] =  User::whereHas('roles', function($q){
            $q->where('slug', 'merchant');
        })->get();

        date_default_timezone_set("Asia/Dhaka");
        $today = date("Y-m-d");
        $data['discountss'] = Discountm::where('end','>=',$today)->where('display',1)->get();

        return view('admin.discount.discount_product',$data);
    }

    public function edit_product_discount(Request $req){

        $id = $req->hdn_id;
        $discount = $req->cate_id;

        $sav = Product::find($id);
        $sav->discount_id = $discount;
        $sav->save();

        return redirect('admin/discount_product')->with('success','Discount updated successfully !');
    }

    public function assign_discount(Request $request){

        $cate_id = $request->cate_id;
        $type = $request->type;
        $merchant_id = $request->merchant_id;
        $discount_id = $request->discount_id;

        $data = [
            'type' => $type,
            'discount_id' => $discount_id,
        ];

        $validator = Validator::make($data, [
            'type' => 'required',
            'discount_id' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Data not saved. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
            
            if($merchant_id > 0 || $cate_id > 0)
            {
                if($merchant_id > 0)
                {
                    $fet = Product::where('merchant_id',$merchant_id)->get();
                }
                elseif($cate_id > 0)
                {
                    $fet = Product::where('cate_id',$cate_id)->get();
                }
                else{
                    $fet = 0;
                }

                if(count($fet) > 0)
                {
                    foreach($fet as $info)
                    {
                        $sav = Product::find($info->id);
                        $sav->discount_id = $discount_id;
                        $sav->save();
                    }

                    return redirect()->back()
                        ->with('success','Discount assigned successfully !!');
                }
                else{
                    return redirect()->back()
                        ->with('warning','Data not available !!');
                }


            }
            else{
                return redirect()->back()
                        ->with('danger','Please select merchant or category. Try again !')
                        ->withInput();
            }
        }
    }
}

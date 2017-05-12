<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['title'] = "Product Categories";
        $data['all'] = ProductCategory::all();

        return view('admin.product.product_category',$data);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $req)
    {
        $name = $req->name;
        $details = $req->details;

        $data = [
            'name' => $name,
            'details' => $details,
        ];

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Product category not saved. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
            $sav = new ProductCategory;
            $sav->name = $name;
            $sav->details = $details;
            $sav->display = 1;
            $sav->save();

            return redirect('admin/product_category')->with('success', 'Category created successfully !');
        }
    }

    
    public function show($id)  //delete item
    {
        $del = ProductCategory::find($id)->delete();

        return redirect()->back()->with('success','Category deleted successfully!');
    }

    
    public function edit($id)
    {
        $fet = ProductCategory::find($id);
        $data['name'] = $fet->name;
        $data['details'] = $fet->details;

        return $data;
    }

    
    public function update(Request $request, $id)
    {
        $id = $request->hdn_id;
        $name = $request->name;
        $details = $request->details;

        if(!empty($name) && !empty($id)){

            $sav = ProductCategory::find($id);
            $sav->name = $name;
            $sav->details = $details;
            $sav->save();

            return redirect()->back()->with('success','Data updated successfully !');
        }

        return redirect()->back()->with('danger','Data not updated. Try again !');
    }

    
    public function destroy($id)
    {
        //
    }
}

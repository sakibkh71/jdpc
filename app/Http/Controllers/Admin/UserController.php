<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Bican\Roles\Models\Role;
use Image;
use Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add_user(){

    	$data['title'] = "User Registration";
    	return view('admin.user.add_user',$data);
    }

    public function save_user(Request $req){

    	$name = $req->name;
    	$email = $req->email;
    	$utype = $req->utype;
    	$password = $req->password;
    	$mob = $req->mob;
    	$address = $req->address;
    	$details = $req->details;

    	$data = [
    		'name' => $name,
    		'email' => $email,
    		'utype' => $utype,
    		'password' => $password,
    		'password_confirmation' => $req->password_confirmation,
    	];

    	$validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'utype' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        else{

        	$sav = new User;
        	$sav->name = $name;
        	$sav->email = $email;
        	$sav->password = bcrypt($password);
        	$sav->mob = $mob;
        	$sav->address = $address;
        	$sav->details = $details;
        	$sav->display = 1;
        	$sav->save();

        	$last_insert_id = $sav->id;
        	$user = User::find($last_insert_id);      //bicon assign role
			$user->attachRole($utype);

			return redirect('admin/all_user')->with('success', 'User created successfully !');
        }
    }

    public function all_user(){

    	$data['title'] = "Users";
    	$data['all']  = User::whereHas('roles', function($q){
                            $q->where('slug','!=','merchant');
                        })->orderBy('id','desc')->get();

    	return view('admin.user.all_user',$data);
    }

    public function remove_user($id){

        $del = User::find($id);
        $del->delete();

        return redirect()->back()->with('success', 'User removed successfully !');
    }

    public function fetch_edit_info(Request $req){

        $id = $req->id;

        $fet = User::find($id);

        $data['name'] = $fet->name;
        $data['email'] = $fet->email;
        $data['mob'] = $fet->mob;
        $data['address'] = $fet->address;
        $data['details'] = $fet->details;
        $data['company'] = $fet->company_name;
        $data['website'] = $fet->website;
        
        foreach($fet->getRoles() as $rol){
            $data['role_id'] = $rol->id;
        }

        return $data;
    }

    public function edit_user(Request $req){

        $id = $req->hdn_user_id;

        $del = User::find($id); //for delete img

        $old_user_role = $req->old_user_role;
        $name = $req->name;
        $email = $req->email;
        $utype = $req->utype;
        $mob = $req->mob;
        $company = $req->company;
        $website = $req->website;
        $address = $req->address;
        $details = $req->details;

        $data = [
            'name' => $name,
            'email' => $email,
            'utype' => $utype,
        ];

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'utype' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Data not updated. Please try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{

            $sav = User::find($id);
            $sav->name = $name;
            $sav->email = $email;
            $sav->mob = $mob;
            $sav->company_name = $company;
            $sav->website = $website;
            $sav->address = $address;
            $sav->details = $details;
            $sav->display = 1;

                //img1
                $file1 = $req->file('photos1');

                $new_name1 = $this->store_img($req,'photos1',$file1,'img1');

                if($new_name1 != 'noImg'){
                    if($new_name1 != 'error'){
                        Image::make($file1->getRealPath())->save('assets/user_img/big/'.$new_name1); 
                        Image::make($file1->getRealPath())->resize(233, 233)->save('assets/user_img/small/'.$new_name1);
                        $sav->img1 = $new_name1;        //save value

                        //delete previous img
                        $this->delete_after_update($del->img1);
                    }
                    else{
                        return redirect()->back()->with('danger','Data not saved. Problem with you image. Try again!');
                    }
                }

            $sav->save();

            $user = User::find($id);      //bicon assign role
            $user->detachRole($old_user_role);
            $user->attachRole($utype);

            return redirect()->back()->with('success', 'User info updated successfully !');
        }
    }

    public function change_password(Request $req){

        $password = $req->password;
        $id = $req->id_for_password;

        $data = [
            'password' => $password,
            'password_confirmation' => $req->password_confirmation,
        ];

        $validator = Validator::make($data, [
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->with('danger','Password not changed. Try again !')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{

            $sav = User::find($id);
            $sav->password = bcrypt($password);
            $sav->save();

            return redirect('admin/all_user')->with('success', 'Password changed successfully !');
        }
    }

    public function merchants(){

        $data['title'] = "Merchants";
        $data['all']  = User::whereHas('roles', function($q){
                            $q->where('slug', 'merchant');
                        })->orderBy('id','desc')->get();

        return view('admin.user.merchants',$data);
    }

    public function delete_after_update($img){

        if (Storage::exists('user_img/big/'.$img) && !empty($img))
            {
                Storage::delete('user_img/big/'.$img); 
            }
        if (Storage::exists('user_img/small/'.$img) && !empty($img))
            {
                Storage::delete('user_img/small/'.$img); 
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor_user;
use App\Models\vendorr_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Image;
class UserController extends Controller
{
    //

    function login(Request $req)
    {
        
        $req->validate([
            'email'=> 'required',
            'password' => 'required'
        ]);
        
        $user=vendorr_user::where('email',$req->input('email'))->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return redirect('/login-vendor');
        }
        else
        {
            session()->put('zrole',$user['vendor-admin']);
            session()->put('username',$user['name']);
            session()->put('id',$user['id']);
            session()->put('shopname',$user['shopname']);
            session()->put('email',$user['email']);
            return redirect('/dashboard');
        }
       
        
    }
    function register(Request $req)
    {
       
        $req->validate([
            'xmobile' => 'required',
            'shopname' => 'required',
            'name' =>'required',
            'email'=> 'required',
            'password' => 'required'
        ]);
        $sender_id='499';
        $apiKey='ZHVyam95OmR1cmpveTk4NQ=='; 
        $mobileNo=$req->xmobile;
        $otp=rand(1000000,99999999);
        $message="আপনার নিবন্ধকরণ নিশ্চিত করার জন্য ".$otp." নম্বরটি ব্যবহার করুন। ধন্যবাদ ".$req->shopname."
        -vShop Team";
        //$message='Thank You '.$req->shopname.' Use '.$otp.' this otp for confirm your registration!';
        $sendSms=$this->techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message);
        session()->put('otp',$otp);
        session()->put('vendor',$req->input());
        return redirect("/otp-form");

    }
    function checkOtp(Request $req)
    {
        $req->validate([
            'otp' => 'required'
            
        ]);

        $vendor=session('vendor');
        
        $sotp=session('otp');
        $otp=$req->input('otp');
        if($sotp!=$otp)
        {
            return redirect("/otp-form")->with('wrong',"You submit wrong Otp");
        }

        $user= new vendorr_user();
        $user->password=Hash::make($vendor["password"]);
        $user->email=$vendor["email"];
        $user->shopname=$vendor['shopname'];
        $user->name=$vendor['name'];
        $user->xmobile=$vendor['xmobile'];
        $user->save();
        if($user)
        {
            session()->put('xmobile',$vendor['xmobile']);
            session()->put('id',$user['id']);
            session()->put('name',$vendor['name']);
            session()->put('shopname',$user['shopname']);
            session()->put('email',$user['email']);
            session()->put('zrole',"vendor-admin");
            
            return redirect('/dashboard');
        }
        else
            echo "Something goes wrong!";
     
    }
    function techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message){
        $url = 'https://24smsbd.com/api/bulkSmsApi';
        $data = array('sender_id' => $sender_id,
         'apiKey' => $apiKey,
         'mobileNo' => $mobileNo,
         'message' =>$message	
         );
        
         $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
            $output = curl_exec($curl);
            curl_close($curl);
            return $output;
    }
    function requestResetPass(Request $req)
    {
        
        $req->validate([
            'xmobile' => 'required'
            
        ]);
        $xmobile=$req->xmobile;
        $sql="SELECT * FROM `vendorr_user` where xmobile='".$xmobile."' order by id desc limit 1";
        $data=DB::select($sql);
        if(empty($data))
        {
            return redirect("/lost-pass-form")->with('wrong',"Have not account with this number!");
        }
        $sender_id='499';
        $apiKey='ZHVyam95OmR1cmpveTk4NQ=='; 
        $otp=rand(1000000,99999999);
        $message="আপনার পাসওয়ার্ড পরিবর্তন করার জন্য একটি অনুরোধ এসেছে । পাসওয়ার্ড পরিবর্তনের  জন্য ".$otp." নম্বরটি ব্যবহার করুন।। ধন্যবাদ ".$data[0]->shopname."
        -vShop Team";
        //$message='Thank You '.$req->shopname.' Use '.$otp.' this otp for confirm your registration!';
        $sendSms=$this->techno_bulk_sms($sender_id,$apiKey,$xmobile,$message);
        session()->put('otp',$otp);
        session()->put('data',$data[0]);
        return redirect("/otp-form-pass");
    }
    function checkOtpPass(Request $req)
    {
        $req->validate([
            'otp' => 'required',
            'password'=> 'required'
            
        ]);

        $data=session('data');
        $sotp=session('otp');
        $otp=$req->input('otp');
        if($sotp!=$otp)
        {
            return redirect("/otp-form-pass")->with('wrong',"You submit wrong Otp");
        }

        $pass=$req->input('password');
        $newPass=Hash::make($pass);
        $xmobile=$data->xmobile;
        $id=$data->id;
        $sql="UPDATE `vendorr_user` SET password='".$newPass."' where xmobile='".$xmobile."' and id=".$id;
        DB::update($sql);
        
        session()->put('xmobile',$xmobile);
        session()->put('id',$id);
        session()->put('shopname',$data->shopname);
        session()->put('email',$data->email);
        session()->put('zrole',"vendor-admin"); 
        return redirect('/dashboard');
       
    }

    //bank detials
    function showBankDetails()
    {
        $id=session('id');
        $sql="SELECT * FROM `vendorr_user` where id=".$id;
        $data=DB::select($sql);
        return view('admin.showBankDetails',['data'=>$data[0]]);
        // return $data;
    }
    public function updateBankInfoForm($id)
    {
        $sid=session('id');
        if($id!=$sid)
        {
            return redirect('/show-bank-details')->with('alert', 'You are trying to update other bank info. You can be suspended!');
        }
        $sql="SELECT * FROM `vendorr_user` where id=".$id;
        $data=DB::select($sql);
        return view('admin.updateBankInfoForm',['data'=>$data]);
    }
    function updateBankInfo(Request $req)
    {
        $req->validate([
            'bank_account_name' => 'required',
            'bank_name'=> 'required',
            'bank_account_number' => 'required',
            'bank_routing_number'=> 'required',
            'bank_branch' => 'required'
            
        ]);
        $sql="UPDATE `vendorr_user` SET `bank_name`='".$req->input('bank_name')."',`bank_branch`='".$req->input('bank_branch')."',`bank_account_number`='".$req->input('bank_account_number')."',`bank_account_name`='".$req->input('bank_account_name')."',`bank_routing_number`='".$req->input('bank_routing_number')."' WHERE id=".$req->input('id');
        DB::update($sql);
        return redirect('/show-bank-details');
        // return $req->input();
    }

    //BusinessDetails
    function showBusinessDetails()
    {
        $id=session('id');
        $sql="SELECT * FROM `vendorr_user` where id=".$id;
        $data=DB::select($sql);
        return view('admin.showBusinessDetails',['data'=>$data[0]]);
    }
    function updateBusinessInfoForm($id)
    {
        $sid=session('id');
        if($id!=$sid)
        {
            return redirect('/show-business-details')->with('alert', 'You are trying to update other business info. You can be suspended!');
        }
        $sql="SELECT * FROM `vendorr_user` where id=".$id;
        $data=DB::select($sql);
        return view('admin.updateBusinessInfoForm',['data'=>$data]);
    }
    function updateBusinessInfo(Request $req)
    {
        $req->validate([
            'shop_contact_no' => 'required',
            'shop_desc'=> 'required',
            'file_path' => 'required',
            'logo_path'=> 'required'
        ]);

        // $img=$req->file('file_path');
        // $logo=$req->file('logo_path');
        

        $image=$req->file('file_path');
        $file_path="shop_photo/".uniqid().mt_rand().$req->input('shop_contact_no').".jpg";
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(500,500);
        $image_resize->save(storage_path('app/vendor/'.$file_path));
        
        $logo=$req->file('file_path');
        $logo_path="logo/".uniqid().mt_rand().$req->input('shop_contact_no').".jpg";
        $logo_resize = Image::make($logo->getRealPath());
        $logo_resize->resize(300,300);
        $logo_resize->save(storage_path('app/vendor/'.$logo_path));


   
        
        

        $sql="UPDATE `vendorr_user` SET `shop_contact_no`='".$req->input('shop_contact_no')."',`shop_desc`='".$req->input('shop_desc')."',`file_path`='".$file_path."',`logo_path`='".$logo_path."' WHERE id=".$req->input('id');

        DB::update($sql);
        return redirect('/show-business-details');
        // return $req->input();
    }

    // function updateBusinessInfo(Request $req)
    // {
    //     $req->validate([
    //         'shop_contact_no' => 'required',
    //         'shop_desc'=> 'required',
    //         'file_path' => 'required',
    //         'logo_path'=> 'required'
    //     ]);

    //     // $img=$req->file('file_path');
    //     $logo=$req->file('logo_path');
        
        
    //     $image=$req->file('file_path');
    //     $file_path="shop_photo/".uniqid().mt_rand().$req->input('shop_contact_no').".jpg";
    //     $image_resize = Image::make($image->getRealPath());
    //     $image_resize->resize(300,300);
    //     $image_resize->save(storage_path('app/vendor/'.$file_path));
        


    //     // $file_path=$img->store('vendor/shop_photo');
    //     $logo_path=$logo->store('vendor/logo');
    //     // $file_path=str_replace("vendor/","",$file_path);
    //     // $logo_path=str_replace("vendor/","",$logo_path);
        
        

    //     $sql="UPDATE `vendor_users` SET `shop_contact_no`='".$req->input('shop_contact_no')."',`shop_desc`='".$req->input('shop_desc')."',`file_path`='".$file_path."',`logo_path`='".$logo_path."' WHERE id=".$req->input('id');

    //     DB::update($sql);
    //     return redirect('/show-business-details');
    //     // return $req->input();
    // }


    function logout()
    {
        session()->flush();
        return redirect('/login-vendor');
    }
    
}

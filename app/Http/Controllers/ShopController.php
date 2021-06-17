<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    //
    function index()
    {
        $sql="SELECT * FROM `vendor_users`";
        $data=DB::select($sql);
        return view('admin.showShopList',['data'=>$data]);
        
    }

    function shopDetails($id)
    {
        $sql="SELECT * FROM `vendor_users` where id=".$id;
        $data=DB::select($sql);
        return view('admin.shopDetails',['data'=>$data[0]]);
    }
    function updateShopStatus($zactive,$id)
    {
        $sql="UPDATE `vendor_users` SET `zactive`='".$zactive."' WHERE id=".$id;
        DB::update($sql);
        return redirect('/shop-details/'.$id);
    }
}

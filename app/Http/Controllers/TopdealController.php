<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TopdealController extends Controller
{
    //
    function index()
    {
        $sql="SELECT e.id,s.xitemid,file_path,xtitle,sku,xcat,e.enlistType FROM seitems as s,enlist as e WHERE e.enlistType='2' and e.zactive=1 and s.xitemid=e.xitemid order by e.id desc";
        $data=DB::select($sql);
        return view("admin.topdealList",["data"=>$data]);
    }

    function removeTopDeal($id)
    {
        $sql="UPDATE `enlist` SET `zactive`=0 WHERE id=".$id;
        DB::update($sql);
        return redirect('/topdeal-list');
    }

    function showProduct()
    {
        $sql='SELECT xitemid,file_path,xtitle,sku,xcat FROM seitems WHERE zactive in ("Accepted","Enlisted") and xitemid not in (SELECT xitemid FROM enlist WHERE enlistType=2 and zactive=1)';
        $data=DB::select($sql);
        return view("admin.showProductsForDeal",['data'=>$data]);
    }

    function topdealForm($xitemid)
    {
        $sql="select * from seitems where xitemid=".$xitemid;
        $data=DB::select($sql);
        return view('admin.topdealForm',['data'=>$data]);
    }
    function addTopdeal(Request $req)
    {
        $success=0;
        $xmrp=$req->input("xmrp");
        $stock=$req->input("stock");
        $disAmt=$req->input("disAmt");
        $disType=$req->input("disType");
        $xitemid=$req->input("xitemid");
        $xsourceid=session('id');
        if($disType=="Percentage")
        {
            $x=($disAmt/100)*$xmrp;
            $disAmt=$xmrp-$x;
        }
        else if($disType=="Flat")
        {
            $disAmt=$xmrp-$disAmt;
        }
        else
        {
            $disAmt=$xmrp;
        }
        $xdate=date('Y-m-d');
        $sql="INSERT INTO `enlist`(`xitemid`,`xsourceid`, `xmrp`, `disAmt`, `stock`,`enlistType`,`xdate`) VALUES ('".$xitemid."','1','".$xmrp."','".$disAmt."','".$stock."',2,'".$xdate."')";
        $success=DB::insert($sql);
        
            
        return redirect('/topdeal-list');
        
    }
}

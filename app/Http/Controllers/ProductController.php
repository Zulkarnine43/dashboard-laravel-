<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seitem;
use Illuminate\Support\Facades\DB;
use Image;
class ProductController extends Controller
{
    //
    function products()
    {
        // echo session('id');
        // die;
       
        $sql="SELECT * FROM seitems where zactive in ('Accepted','Pending') and zactive <> 'Rejected' order by xitemid desc";
        $data=DB::select($sql);
        return view('admin.products',['data'=>$data]);
    }
    function addProductFrom()
    {
        $sql="select * from categories order by id desc";
        $category=DB::select($sql);
        return view('admin.productFrom',['category'=>$category]);
    }

    // function uploadProductInfo(Request $req)
    // {
    //     $req->validate([
    //         'xtitle' => 'required',
    //         'tag' => 'required',
    //         'upload_file'=> 'required'
    //     ]);

    

    //     $images=$req->file('upload_file');
    //     $imageName="";
    //     foreach($images as $image)
    //     {
    //         $new_name=$image->store('products');
    //         $imageName=$imageName.$new_name.",";
    //     }
    //     $imageName=substr($imageName, 0, -1);
    //     $product= new Seitem();
    //     $product->xtitle=$req->input('xtitle');
    //     $product->xdate=date("Y-m-d");
    //     $product->file_path=$imageName;
        
    //     $product->xsourceid=session('id');
    //     $product->xdesc=$req->input('xdesc');
    //     $product->sku=$req->input('sku');
    //     $product->tag=$req->input('tag');
    //     $product->xbrand=$req->input('xbrand');
    //     $product->xcat=$req->input('xcat');
    //     $product->save();

    //     return $this->products();
        
    //     //return $product;
    // }

    function uploadProductInfo(Request $req)
    {
        $req->validate([
            'xtitle' => 'required',
            'tag' => 'required',
            'upload_file'=> 'required'
        ]);

        
        

        $images=$req->file('upload_file');
        $imageName="";
        foreach($images as $image)
        {
            $new_name="products/".uniqid().mt_rand().".jpg";
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save(storage_path('app/'.$new_name));
           
            $imageName=$imageName.$new_name.",";
        }
        // $imageName=substr($imageName, 0, -1);
        // $imageName=substr($imageName, 0,);
        // echo $imageName;
        // die;
        $product= new Seitem();
        $product->xtitle=$req->input('xtitle');
        $product->xdate=date("Y-m-d");
        $product->file_path=$imageName;
        
        $product->xsourceid=session('id');
        $product->xdesc=$req->input('xdesc');
        $product->sku=$req->input('sku');
        $product->tag=$req->input('tag');
        $product->xbrand=$req->input('xbrand');
        $product->xcat=$req->input('xcat');
        $product->save();

        return $this->products();
        
        //return $product;
    }


    function editProduct($id)
    {
        $sql="select * from seitems where zactive='Pending' and xitemid=".$id;
        $data=DB::select($sql);

        $sql="select * from categories order by id desc";
        $category=DB::select($sql);
        // return $data;
        return view("admin.editProductFrom",["data"=>$data,"category"=>$category]);
    }

    function edit(Request $req)
    {
        $req->validate([
            'xtitle' => 'required',
            'tag' => 'required',
            'xcat'=> 'required'
        ]);
        $sql="";
        if($req->file('upload_file'))
        {
            

            $images=$req->file('upload_file');
            $imageName="";
            foreach($images as $image)
            {
                $new_name="products/".uniqid().mt_rand().".jpg";
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                $image_resize->save(storage_path('app/'.$new_name));
               
                $imageName=$imageName.$new_name.",";
            }
            // $imageName=substr($imageName, 0, -1);
            // echo $imageName;
            // die;
            $sql="UPDATE seitems SET zutime='".date('Y-m-d')."',xtitle='".$req->input('xtitle')."',file_path='".$imageName."',xdesc='".$req->input('xdesc')."',sku='".$req->input('sku')."',tag='".$req->input('tag')."',xbrand='".$req->input('xbrand')."',xcat='".$req->input('xcat')."' where xitemid=".$req->input('xitemid');
            
        }
        else
        {
            $sql="UPDATE seitems SET zutime='".date('Y-m-d')."',xtitle='".$req->input('xtitle')."',xdesc='".$req->input('xdesc')."',sku='".$req->input('sku')."',tag='".$req->input('tag')."',xbrand='".$req->input('xbrand')."',xcat='".$req->input('xcat')."' where xitemid=".$req->input('xitemid');
        }
        
        DB::update($sql);
        // return $this->products();
        return redirect('/products-list');
    }

    function enlistForm($id)
    {
        $sql="select * from seitems where zactive='Accepted' and xitemid=".$id;
        $data=DB::select($sql);
        return view('admin.enlistForm',['data'=>$data]);
    }

    function enlistProduct(Request $req)
    {
        // return $req->input();
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
        $sql="INSERT INTO `enlist`(`xitemid`,`xsourceid`, `xmrp`, `disAmt`, `stock`,`enlistType`,`xdate`) VALUES ('".$xitemid."','".$xsourceid."','".$xmrp."','".$disAmt."','".$stock."',1,'".$xdate."')";
        $success=DB::insert($sql);
        if($success==1)
        {
            $sql="UPDATE `seitems` SET `zactive`='Enlisted' where xitemid=".$xitemid;
            DB::update($sql);
            
            return redirect('/list-enlisted-product');
        }
        else
        {
            return "Have Some problem!";
        }
    }

    function listEnlistedProduct()
    {
        $sql="SELECT * FROM seitems where zactive in ('Enlisted') order by xitemid desc";
        $data=DB::select($sql);
        return view('admin.listEnlistedProduct',['data'=>$data]);
    }
    function removeEnlist($xitemid)
    {
        $sql="UPDATE `seitems` SET `zactive`='Accepted' where xitemid=".$xitemid;
        $sql2="UPDATE `enlist` SET `zactive`=0 WHERE xitemid=".$xitemid;
        DB::update($sql2);
        DB::update($sql);
        return redirect('/list-enlisted-product');
    }
    
}

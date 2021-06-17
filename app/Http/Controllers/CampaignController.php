<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Image;
class CampaignController extends Controller
{
    //
    function index()
    {
        $sql="SELECT * FROM `campaign` where zactive=1 and end_time > '".date('Y-m-d')."'";
        $data=DB::select($sql);
        echo "<pre>";
        print_r($data);
        // return $data;
    }
    // function createCampaign(Request $req)
    // {
    //     $req->validate([
    //         'name' => 'required',
    //         'minDis' => 'required',
    //         'reg_time'=> 'required',
    //         'start_time' => 'required',
    //         'end_time'=> 'required',
    //         'file'=> 'required'
    //     ]);
    //     $image=$req->file('file');
    //     $image_name=$image->store('campaigns');
    //     $sql="INSERT INTO `campaign`(`name`, `minDis`, `reg_time`, `start_time`, `end_time`,`image`)
    //     VALUES ('".$req->input('name')."','".$req->input('minDis')."','".$req->input('reg_time')."','".$req->input('start_time')."','".$req->input('end_time')."','".$image_name."')";
    //     DB::insert($sql);
    //     return redirect('/campaign-list');
    // }

    function createCampaign(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'minDis' => 'required',
            'reg_time'=> 'required',
            'start_time' => 'required',
            'end_time'=> 'required',
            'file'=> 'required'
        ]);
        // $image=$req->file;
        // $image_name="resize.jpg";
        // $image_resize = Image::make($image->getRealPath());
        // $image_resize->resize(300,300);
        // $image_resize->save(public_path('images/'.$image_name));
        
        $image=$req->file('file');
        $image_name=uniqid().mt_rand().$req->input('name').".jpg";
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300,300);
        $image_resize->save(storage_path('app/campaigns/'.$image_name));
        $image_name="campaigns/".$image_name;

        $sql="INSERT INTO `campaign`(`name`, `minDis`, `reg_time`, `start_time`, `end_time`,`image`)
        VALUES ('".$req->input('name')."','".$req->input('minDis')."','".$req->input('reg_time')."','".$req->input('start_time')."','".$req->input('end_time')."','".$image_name."')";
        DB::insert($sql);
        return redirect('/campaign-list');
    }




    /////////Seller
    function showCampaignsSeller()
    {
        $sql="SELECT *,IF((SELECT campaign_id FROM `campaign_reg_shop` where shop_id=1 and campaign_id=campaign.id)=id,'Already registered','Not registered') as isReg FROM `campaign` where zactive=1 and end_time > '".date('Y-m-d')."' order by id desc";
        $data=DB::select($sql);

        return view("admin.showCampaignSeller",['data'=>$data]);
    }
    function campaignReg($campaign_id)
    {
        // echo $campaign_id;
        // die;
        $shop_id=session('id');
        $isReg="SELECT r.campaign_id,r.shop_id,c.id FROM `campaign_reg_shop` as r,campaign as c WHERE c.id=r.campaign_id and r.campaign_id='".$campaign_id."' and r.shop_id=".$shop_id;
        // return DB::select($isReg);
        if(empty(DB::select($isReg)))
        {
            $sql="SELECT * FROM `campaign` where zactive=1 and end_time > '".date('Y-m-d')."' and id='".$campaign_id."' order by id desc";
            $data=DB::select($sql);
            return view("admin.campainReg",['data'=>$data[0]]);
        }
        else{
            echo "<script>alert('Campaign Created')</script>";
            return redirect('campaign-form');
            // return redirect('campaign-product-list/'.$campaign_id);
        }

    }
    function saveRegCampaign($campaign_id)
    {
        // echo $campaign_id;
        // die;
        $sql="INSERT INTO `campaign_reg_shop`(`campaign_id`, `shop_id`) VALUES ('".$campaign_id."','".session('id')."')";
        // echo $sql;
        // die;
        $data=DB::insert($sql);
        
        return redirect('campaign-product-list/'.$campaign_id);
    }

    function campaignProductList($campaign_id)
    {
        $sql_xitemid="SELECT e.xitemid FROM `campaign_reg_shop` as r,enlist as e where r.campaign_id='".$campaign_id."' and r.shop_id='".session('id')."' and e.enlistType=3 and e.xsourceid=r.id and e.zactive=1";
        $sql_enlist_id="SELECT en.id FROM `campaign_reg_shop` as rn,enlist as en where en.xitemid=s.xitemid and rn.campaign_id='".$campaign_id."' and rn.shop_id='".session('id')."' and en.enlistType=3 and en.xsourceid=rn.id and en.zactive=1";

        
        $sql="SELECT (".$sql_enlist_id.") as enlist_id,s.xitemid,file_path,xtitle,sku,xcat FROM seitems as s where s.xitemid in (".$sql_xitemid.") order by s.xitemid desc";

        $sql2="select campaign.name as campaign_name,campaign.id as campaign_id from campaign where campaign.id='".$campaign_id."' and campaign.zactive=1";
        $data=DB::select($sql);
        $campaign=DB::select($sql2);

        return view("admin.campaignProductList",["data"=>$data,'campaign'=>$campaign]);
    }
    function productsForCampaign($campaign_id)
    {
        $sql="SELECT xitemid,file_path,xtitle,sku,xcat FROM `seitems` where zactive in ('Accepted','Enlisted') and xitemid not in (SELECT xitemid FROM `enlist` where xsourceid=(SELECT id FROM campaign_reg_shop where campaign_id='".$campaign_id."' and shop_id='".session('id')."') and enlistType=3 and zactive=1)";

        $sql2="select campaign.name as campaign_name,campaign.id as campaign_id from campaign where campaign.id='".$campaign_id."' and campaign.zactive=1";

        $data=DB::select($sql);
        $campaign=DB::select($sql2);
        return view("admin.productsForCampaign",['data'=>$data,'campaign'=>$campaign]);
    }
    function campaignProductForm($campaign_id,$xitemid)
    {
        $sql="select * from seitems where xitemid=".$xitemid;
        $sql2="SELECT * FROM `campaign` where id=".$campaign_id;
        $data=DB::select($sql);
        $campaign=DB::select($sql2);
        return view('admin.campaignProductForm',['data'=>$data,'campaign'=>$campaign]);
    }

    function addProductToCampaign(Request $req)
    {
        $req->validate([
            'disAmt' => 'required',
            'xmrp' => 'required',
            'stock'=> 'required'
        ]);

        $success=0;
        $xmrp=$req->input("xmrp");
        $stock=$req->input("stock");
        $disAmt=$req->input("disAmt");
        $campaign_id=$req->input('campaign_id');
        $minDis=$req->input('minDis');
        $xitemid=$req->input("xitemid");
        $xsourceid=session('id');
        $minDis=str_replace('%','',$minDis);
       
        $minDis=$xmrp*($minDis/100);
        $dis=$xmrp-$disAmt;
        if($minDis>$dis)
        {
            return redirect("campaign-product-form/".$campaign_id."/".$xitemid)->with('dis',"Minimum discount amount not match");
        }
        
        


        $sql="SELECT * FROM `campaign_reg_shop` where campaign_id='".$campaign_id."' and shop_id='".session('id')."'";
        $xsourceid=DB::select($sql)[0]->id;
       
        $xdate=date('Y-m-d');
        $sql="INSERT INTO `enlist`(`xitemid`,`xsourceid`, `xmrp`, `disAmt`, `stock`,`enlistType`,`xdate`) VALUES ('".$xitemid."','".$xsourceid."','".$xmrp."','".$disAmt."','".$stock."',3,'".$xdate."')";
        $success=DB::insert($sql);    
        return redirect('campaign-product-list/'.$campaign_id);
    }
}

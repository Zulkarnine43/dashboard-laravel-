<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    //
    function index()
    {
        $sql="SELECT id,xdate,invoice,GROUP_CONCAT(sku) as sku,sum(xqty*unitsale) as unitsale,(select zactive from invoices where orders.invoice=invoices.invoice) as zactive FROM `orders` group by invoice order by id desc";
        
        $data=DB::select($sql);
        $sql2="SELECT count(*) as total,zactive FROM `invoices` group by zactive order by zactive";
        $status=DB::select($sql2);
        //return $status;

        return view('admin.orders',['data'=>$data,"status"=>$status]);
    }

    public function getOrderDetails($invoice)
    {
        $sql="SELECT xname,xmobile,xemail,xadd,invoice,ztime FROM `customeraddress` as d,invoices as i where i.invoice='".$invoice."' and i.addressid=d.id";
        // $sql2="SELECT xtitle,file_path,xqty,unitsale,xqty*unitsale as subtotal,s.xitemid,invoice FROM orders as o,seitems as s WHERE invoice='".$invoice."' and s.xitemid=o.xitemid";
        $sql2="SELECT xtitle,o.sku,file_path,xqty,unitsale,xqty*unitsale as subtotal,s.xitemid,invoice,COALESCE((select sum(transectionAmt) from payment_transection where transectionType='Payment' and payment_transection.invoice='".$invoice."'),0) as paidAmt FROM orders as o,seitems as s WHERE invoice='".$invoice."' and s.xitemid=o.xitemid";
        $sql3="SELECT * FROM `order_status` where invoice='".$invoice."' order by id";

        $statusInfo=DB::select($sql3);
        for($i=0;$i<count($statusInfo);$i++)
        {
            $zstatus[$statusInfo[$i]->zactive]=$statusInfo[$i]->zactive;
            
        }
        $zstatus['invoice']=$invoice;
        $orderitems=DB::select($sql2);
        $customer=DB::select($sql);
     
        return view("admin.orderDetailsPage",['customer'=>$customer,"orderitems"=>$orderitems,"statusInfo"=>$statusInfo,"zstatus"=>$zstatus]);
    }

    function updateOrderStatus(Request $req)
    {
        $req->validate([
            'note' => 'required'
        ]);
        // return $req->input();
        // die;
        $sql="UPDATE invoices SET zactive='".$req->input('zactive')."' where invoice='".$req->input('invoice')."'";

        $sql2="INSERT INTO `order_status`(`xdate`, `invoice`, `zactive`, `note`) VALUES ('".date('Y-m-d')."','".$req->input('invoice')."','".$req->input('zactive')."','".$req->input('note')."')";

        
        DB::update($sql);
        DB::insert($sql2);
        return redirect('/order-details/'.$req->input('invoice'));
    }

    function printMemo(Request $req)
    {
        $invoice=$req->input('invoice');
        
        
        $sql2="SELECT xtitle,o.sku,file_path,xqty,unitsale,xqty*unitsale as subtotal,s.xitemid,invoice,COALESCE((select sum(transectionAmt) from payment_transection where transectionType='Payment' and payment_transection.invoice='".$invoice."'),0) as paidAmt FROM orders as o,seitems as s WHERE invoice='".$invoice."' and s.xitemid=o.xitemid";
        $orderitems=DB::select($sql2);

        $sql="SELECT xname,xmobile,xemail,xadd,i.invoice as invoice,i.ztime as ztime FROM `customeraddress` as d,invoices as i where i.invoice='".$invoice."' and i.addressid=d.id";
        $customer=DB::select($sql);
        return view('admin.print',['customer'=>$customer,"orderitems"=>$orderitems]);
        //return view('admin.print');
    }
}

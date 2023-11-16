<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index()
    {
       
        $list = Order::where('status', '!=', 0)->get();
        $listOrderdetail=Orderdetail::all();
        return view("backend.order.index",compact("list","listOrderdetail"));
    }
    public function create()
    {
        $product=Product::where('status','!=',0)->get();
        $iduser=User::where('status','!=',0)->get();
        return view("backend.order.create",compact('iduser','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $orderdetail= new Orderdetail();
        $order=new Order();
        $order->name=$request->name;
        $order->email=$request->email;
        $order->user_id=$request->user_id;
        $order->phone=$request->phone;
        $order->address=$request->address;
        $order->note=$request->note;
        $order->created_by=Auth::id()??1; 
        $order->created_at=date('Y-m-d H:i:s');
        $order->status=$request->status;
        $order->save();
        $order_id=$order->id;
        $orderdetail->order_id=$order_id;
        $orderdetail->product_id=$request->product_id;
        $orderdetail->price=$request->price;
        $orderdetail->qty=$request->qty;
        $orderdetail->amount=$request->amount;
       
    
        if($orderdetail->save())
        {
            return redirect()->route('order.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm đơn hàng thành công']);

        }
        return redirect()->route('order.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order=Order::find($id);
        $orderdetails=Orderdetail::where('order_id','=',$id)->get();
        return view("backend.order.show",compact("order",'orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iduser=User::where('status','!=',0)->get();
        $order=Order::find($id);
        if($order==null)
        {
            return redirect()->route('order.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Order::all();
        return view("backend.order.edit",compact("order",'iduser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->name=$request->name;
        $order->email=$request->email;
        $order->user_id=$request->user_id;
        $order->phone=$request->phone;
        $order->address=$request->address;
        $order->note=$request->note;
        $order->created_by=Auth::id()??1; 
        $order->created_at=date('Y-m-d H:i:s');
        $order->status=$request->status;
        //up load file
        if ($order->save()){
            return redirect()->route('order.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('order.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
{
    $orderdetails = Orderdetail::where('order_id', '=', $id)->get();
    $orderdetails->each(function ($orderdetail) {
        $orderdetail->delete();
    });

    $order = Order::find($id);
    if ($order == NULL) {
        return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
    }

    if ($order->delete()) {
        return redirect()->route('order.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
    }

    return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
}
    public function trash()
    {
        $list = Order::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.order.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $order = Order::find($id);
        if($order==NULL)
        {
            return redirect()->route('order.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $order->status = 0;
         $order->updated_at =date('Y-m-d H:i:s');

         $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_order = Order::find($id);
        if($list_order==NULL)
        {
            return redirect()->route('order.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_order->status = 2;
            $list_order->updated_at=date('Y-m-d H:i:s');
            $list_order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_order->save();
        return redirect()->route('order.trash')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row =Order::find($id);
        if($row == NULL)
        {
            return redirect()->route('order.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('order.index')->with('message',['type' => 'success','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

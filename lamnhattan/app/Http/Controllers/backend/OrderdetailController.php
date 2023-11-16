<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class OrderdetailController extends Controller
{
    public function index()
    {
        $list = Orderdetail::where('order_id', '!=', 0)->get();
        return view("backend.orderdetail.index",compact("list"));
    }
    public function create()
    {
        return view("backend.orderdetail.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderdetail=new Orderdetail();
        $orderdetail->name=$request->name;
        $orderdetail->email=$request->email;
        $orderdetail->user_id=$request->user_id;
        $orderdetail->phone=$request->phone;
        $orderdetail->address=$request->address;
        $orderdetail->note=$request->note;
        $orderdetail->created_by=Auth::id()??1; 
        $orderdetail->created_at=date('Y-m-d H:i:s');
        $orderdetail->status=$request->status;
    
        if($orderdetail->save())
        {
            return redirect()->route('orderdetail.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm đề tài thành công']);

        }
        return redirect()->route('orderdetail.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderdetail=Orderdetail::find($id);
        return view("backend.orderdetail.show",compact("orderdetail"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $orderdetail=Orderdetail::find($id);
        if($orderdetail==null)
        {
            return redirect()->route('orderdetail.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Orderdetail::all();
        return view("backend.orderdetail.edit",compact("orderdetail"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderdetail = Orderdetail::find($id);
        $orderdetail->name=$request->name;
        $orderdetail->email=$request->email;
        $orderdetail->user_id=$request->user_id;
        $orderdetail->phone=$request->phone;
        $orderdetail->address=$request->address;
        $orderdetail->note=$request->note;
        $orderdetail->created_by=Auth::id()??1; 
        $orderdetail->created_at=date('Y-m-d H:i:s');
        $orderdetail->status=$request->status;
        //up load file
        if ($orderdetail->save()){
            return redirect()->route('orderdetail.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('orderdetail.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $orderdetail = Orderdetail::find($id);
        if ($orderdetail == NULL) {
            return redirect()->route('orderdetail.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $orderdetail->delete())
       {
        return redirect()->route('orderdetail.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('orderdetail.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = Orderdetail::where('status', '=', '0')->orderdetailBy('created_at', 'desc')->get();
        return view('backend.orderdetail.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $orderdetail = Orderdetail::find($id);
        if($orderdetail==NULL)
        {
            return redirect()->route('orderdetail.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $orderdetail->status = 0;
         $orderdetail->updated_at =date('Y-m-d H:i:s');

         $orderdetail->save();
        return redirect()->route('orderdetail.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_orderdetail = Orderdetail::find($id);
        if($list_orderdetail==NULL)
        {
            return redirect()->route('orderdetail.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_orderdetail->status = 2;
            $list_orderdetail->updated_at=date('Y-m-d H:i:s');
            $list_orderdetail->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_orderdetail->save();
        return redirect()->route('orderdetail.trash')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row =Orderdetail::find($id);
        if($row == NULL)
        {
            return redirect()->route('orderdetail.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('orderdetail.index')->with('message',['type' => 'success','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

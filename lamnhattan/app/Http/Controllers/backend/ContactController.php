<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function index()
    {
        $list = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.contact.index",compact("list"));
    }
    public function create()
    {
        $iduser=User::where('status','!=',0)->get();
        return view("backend.contact.create",compact('iduser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->user_id=$request->user_id;
        $contact->phone=$request->phone;
        $contact->title=$request->title;
        $contact->content=$request->content;
        $contact->replay_id=$request->replay_id;
        $contact->created_by=Auth::id()??1; 
        $contact->created_at=date('Y-m-d H:i:s');
        $contact->status=$request->status;
        if($contact->save())
        {
       
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm đề tài thành công']);

        }
        return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact=Contact::find($id);
        return view("backend.contact.show",compact("contact"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iduser=User::where('status','!=',0)->get();
        $contact=Contact::find($id);
        if($contact==null)
        {
            return redirect()->route('contact.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Contact::all();
        return view("backend.contact.edit",compact("contact",'iduser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->user_id=$request->user_id;
        $contact->phone=$request->phone;
        $contact->title=$request->title;
        $contact->content=$request->content;
        $contact->replay_id=$request->replay_id;
        $contact->created_by=Auth::id()??1; 
        $contact->created_at=date('Y-m-d H:i:s');
        $contact->status=$request->status;
        //up load file
        if ($contact->save()){
         
            return redirect()->route('contact.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == NULL) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $contact->delete())
       {
        return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = Contact::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.contact.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $contact = Contact::find($id);
        if($contact==NULL)
        {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $contact->status = 0;
         $contact->updated_at =date('Y-m-d H:i:s');

         $contact->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_contact = Contact::find($id);
        if($list_contact==NULL)
        {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_contact->status = 2;
            $list_contact->updated_at=date('Y-m-d H:i:s');
            $list_contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_contact->save();
        return redirect()->route('contact.trash')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Contact::find($id);
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('contact.index')->with('message',['type' => 'success','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

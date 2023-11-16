<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Links;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where('status',"!=",0)->get();
        return view("backend.topic.index",compact("list"));
    }
    public function create()
    {
        return view("backend.topic.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic=new Topic();
        $topic->name=$request->name;
        $topic->slug=Str::of($request->name)->slug('-');
        $topic->parent_id=$request->parent_id;
        $topic->metakey=$request->metakey;
        $topic->metadesc=$request->metadesc;
        $topic->created_by=Auth::id()??1; 
        $topic->created_at=date('Y-m-d H:i:s');
        $topic->status=$request->status;
        if($topic->save())
        {
            $link=new Links();
            $link->slug= $topic->slug;
            $link->table_id= $topic->id;
            $link->type= "topic";
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm đề tài thành công']);

        }
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic=Topic::find($id);
        return view("backend.topic.show",compact("topic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            return redirect()->route('topic.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Topic::all();
        return view("backend.topic.edit",compact("topic"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        //$topic->level = $request->level;        
        $topic->parent_id = $request->parent_id;
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->updated_at =date('Y-m-d H:i:s');
        $topic->updated_by = 1;
        $topic->status = $request->status;
        //up load file
        if ($topic->save()){
            $link=Links::where([["table_id","=",$id],["type","=","topic"]])->first();
            $link->slug= $topic->slug;
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == NULL) {
            return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $topic->delete())
       {
        $link=Links::where([["table_id","=",$id],["type","=","topic"]])->first();
        $link->delete();
        return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = Topic::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.topic.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $topic = Topic::find($id);
        if($topic==NULL)
        {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $topic->status = 0;
         $topic->updated_at =date('Y-m-d H:i:s');

         $topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_topic = Topic::find($id);
        if($list_topic==NULL)
        {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_topic->status = 2;
            $list_topic->updated_at=date('Y-m-d H:i:s');
            $list_topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_topic->save();
        return redirect()->route('topic.trash')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Topic::find($id);
        if($row == NULL)
        {
            return redirect()->route('topic.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('topic.index')->with('message',['type' => 'success','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

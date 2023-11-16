<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\Topic;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $list = Post::where("status",'!=',0)->get();
        return view("backend.post.index",compact("list"));
    }
    public function create()
    {   $listtopic = Topic::where("status",'!=',0)->get();
        return view("backend.post.create",compact("listtopic"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=new Post();
        $post->slug=Str::of($request->title)->slug('-');
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/post/".$post->image);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $post->slug . '.' . $extension;
            $post->image = $filename;
            $files->move(public_path('images/post'), $filename);
        }
        $post->topic_id=$request->topic_id;
        $post->title=$request->title;
        $post->detail=$request->detail;
        $post->type=$request->type;
        $post->metakey=$request->metakey;
        $post->metadesc=$request->metadesc;
        $post->created_by=Auth::id()??1;
        $post->created_at=date('Y-m-d H:i:s');
        $post->status=$request->status;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return view("backend.post.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {  $listtopic = Topic::where("status",'!=',0)->get();
        $post=Post::find($id);
        if($post==null)
        {
            return redirect()->route('post.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Post::all();
        return view("backend.post.edit",compact("post",'listtopic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->slug=Str::of($request->title)->slug('-');
        $post->topic_id=$request->topic_id;
        $post->title=$request->title;
        $post->detail=$request->detail;
        $post->type=$request->type;
        $post->metakey=$request->metakey;
        $post->metadesc=$request->metadesc;
        $post->created_by=Auth::id()??1;
        $post->created_at=date('Y-m-d H:i:s');
        $post->status=$request->status;
        //up load file
        $file = $request->file('image');
        if ($file != NULL) {
            $extention = $file->getClientOriginalExtension();
            if (in_array($extention, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $post->slug.'.'.$extention;
                $file->move(public_path('images/post'), $fileName);
                $post->image = $fileName;
            }
        }
        if ($post->save()){
            return redirect()->route('post.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('post.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $post = Post::find($id);
        if ($post == NULL) {
            return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $post->delete())
       {
        return redirect()->route('post.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = Post::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.post.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $post = Post::find($id);
        if($post==NULL)
        {
            return redirect()->route('post.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $post->status = 0;
         $post->updated_at =date('Y-m-d H:i:s');

         $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_post = Post::find($id);
        if($list_post==NULL)
        {
            return redirect()->route('post.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_post->status = 2;
            $list_post->updated_at=date('Y-m-d H:i:s');
            $list_post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Post::find($id);
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('post.index')->with('message',['type' => 'danger','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

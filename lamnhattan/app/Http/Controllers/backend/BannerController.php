<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
            $banner=Banner::where('status','!=',0)
            ->select('id','name','link','description','image','position')
            ->orderBy('created_at')
            ->get();
        return view("backend.banner.index",compact('banner'));
    }
    public function create()
    {
        return view("backend.Banner.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $banner = new Banner();
    $banner->name = $request->name;
    $banner->description = $request->description;
    $banner->link = $request->link;
    $banner->position = $request->position;
    $banner->created_by = Auth::id() ?? 1;
    $banner->created_at = now(); // Sử dụng helper function now() để lấy thời gian hiện tại
    $banner->status = $request->status;

    $file = $request->file('image'); // Lấy đối tượng UploadedFile

    if ($file) {
        $extension = $file->getClientOriginalExtension();

        if (in_array($extension, ['png', 'jpg', 'jpeg', 'webp'])) {
            $fileName = $banner->slug . '_' . time() . '.' . $extension;
            $file->move(public_path('images/banner'), $fileName);
            $banner->image = $fileName;
        }
    }

    $banner->save();

    return redirect()->route('banner.index');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner=banner::find($id);
        return view("backend.banner.show",compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $banner=banner::find($id);
        if($banner==null)
        {
            return redirect()->route('banner.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        return view("backend.banner.edit",compact("banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = banner::find($id);
        $banner->name=$request->name;
        $banner->description=$request->description;
        $banner->link=$request->link;
        $banner->position=$request->position;
        $banner->updated_by=Auth::id()??1; 
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->status=$request->status;
        //up load file
        $files=$request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/banner/".$banner->image);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $banner->slug . '.' . $extension;
            $banner->image = $filename;
            $files->move(public_path('images/banner'), $filename);
        }
       
        if ($banner->save()){
       
            return redirect()->route('banner.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('banner.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $banner = banner::find($id);
        if ($banner == NULL) {
            return redirect()->route('banner.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $banner->delete())
       {
      
        return redirect()->route('banner.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('banner.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = banner::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.banner.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $banner = banner::find($id);
        if($banner==NULL)
        {
            return redirect()->route('banner.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $banner->status = 0;
         $banner->updated_at =date('Y-m-d H:i:s');

         $banner->save();
        return redirect()->route('banner.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_banner = banner::find($id);
        if($list_banner==NULL)
        {
            return redirect()->route('banner.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_banner->status = 2;
            $list_banner->updated_at=date('Y-m-d H:i:s');
            $list_banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_banner->save();
        return redirect()->route('banner.index')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = banner::find($id);
        if($row == NULL)
        {
            return redirect()->route('banner.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('banner.index')->with('message',['type' => 'danger','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class SlideController extends Controller
{
    public function index()
    {
        $list = Slider::where('status','!=',0)->get();
        return view("backend.slider.index",compact("list"));
    }
    public function create()
    {
        return view("backend.slider.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider=new Slider();
        $slider->name=$request->name;
        $slider->link=$request->link;
        $slider->sort_order=$request->sort_order;
        $slider->position=$request->position;
        $slider->created_by=Auth::id()??1; 
        $slider->created_at=date('Y-m-d H:i:s');
        $slider->status=$request->status;
         $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/slider/".$slider->link);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $slider->name;
            $slider->link = $filename;
            $files->move(public_path('images/slider'), $filename);
        }
        if($slider->save())
        {
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm đề tài thành công']);

        }
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider=Slider::find($id);
        return view("backend.slider.show",compact("slider"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider=Slider::find($id);
        if($slider==null)
        {
            return redirect()->route('slider.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Slider::all();
        return view("backend.slider.edit",compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $slider->name=$request->name;
        $slider->link=$request->link;
        $slider->sort_order=$request->sort_order;
        $slider->position=$request->position;
        $slider->created_by=Auth::id()??1; 
        $slider->created_at=date('Y-m-d H:i:s');
        $slider->status=$request->status;
        $file = $request->file('image');
        if ($file != NULL) {
            $extention = $file->getClientOriginalExtension();
            if (in_array($extention, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $slider->name;
                $file->move(public_path('images/slider'), $fileName);
                $slider->link = $fileName;
            }
        }
        //up load file
        if ($slider->save()){
            return redirect()->route('slider.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $slider->delete())
       {
        return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = Slider::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.slider.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $slider = Slider::find($id);
        if($slider==NULL)
        {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $slider->status = 0;
         $slider->updated_at =date('Y-m-d H:i:s');

         $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_slider = Slider::find($id);
        if($list_slider==NULL)
        {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_slider->status = 2;
            $list_slider->updated_at=date('Y-m-d H:i:s');
            $list_slider->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_slider->save();
        return redirect()->route('slider.trash')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Slider::find($id);
        if($row == NULL)
        {
            return redirect()->route('slider.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('slider.index')->with('message',['type' => 'success','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

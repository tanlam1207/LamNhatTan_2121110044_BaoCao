<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Links;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.category.index",compact("list"));
    }   
    public function create()
    {
        return view("backend.Category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->slug=Str::of($request->name)->slug('-');
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/category/".$category->image);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $category->slug . '.' . $extension;
            $category->image = $filename;
            $files->move(public_path('images/category'), $filename);
        }
        $category->sort_order=$request->sort_order;
        $category->parent_id=$request->parent_id;
        $category->metakey=$request->metakey;
        $category->metadesc=$request->metadesc;
        $category->created_by=Auth::id()??1;
        $category->created_at=date('Y-m-d H:i:s');
        $category->status=$request->status;
        if($category->save())
        {
            $link=new Links();
            $link->slug= $category->slug;
            $link->table_id= $category->id;
            $link->type= "category";
            $link->save();
            return redirect()->route('category.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm danh mục thành công']);

        }
        return redirect()->route('category.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::find($id);
        return view("backend.category.show",compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            return redirect()->route('category.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Category::all();
        return view("backend.Category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->sort_order = $request->sort_order;
        //$category->level = $request->level;        
        $category->parent_id = $request->parent_id;
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        $category->updated_at =date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->status = $request->status;
        //up load file
        $file = $request->file('image');
        if ($file != NULL) {
            $extention = $file->getClientOriginalExtension();
            if (in_array($extention, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $category->slug.'.'.$extention;
                $file->move(public_path('images/category'), $fileName);
                $category->image = $fileName;
            }
        }
        if ($category->save()){
            $link=Links::where([["table_id","=",$id],["type","=","category"]])->first();
            $link->slug= $category->slug;
            $link->save();
            return redirect()->route('category.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('category.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $category = Category::find($id);
        if ($category == NULL) {
            return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $category->delete())
       {
        $link=Links::where([["table_id","=",$id],["type","=","category"]])->first();
        $link->delete();
        return redirect()->route('category.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('category.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trashh()
    {
        $list = Category::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.category.trashh', compact('list'));
    }
    public function delete($id)
    {
        
        $category = Category::find($id);
        if($category==NULL)
        {
            return redirect()->route('category.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $category->status = 0;
         $category->updated_at =date('Y-m-d H:i:s');

         $category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_category = Category::find($id);
        if($list_category==NULL)
        {
            return redirect()->route('category.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_category->status = 2;
            $list_category->updated_at=date('Y-m-d H:i:s');
            $list_category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_category->save();
        return redirect()->route('category.index')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Category::find($id);
        if($row == NULL)
        {
            return redirect()->route('category.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('category.index')->with('message',['type' => 'danger','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

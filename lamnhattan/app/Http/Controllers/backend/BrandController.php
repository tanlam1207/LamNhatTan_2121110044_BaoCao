<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Links;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::where('status', '!=', '0')->orderBy('created_at', 'desc')->get();
        return view("backend.brand.index",compact("list"));
    }
    public function create()
    {
      return view("backend.Brand.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand=new Brand();
        $brand->name=$request->name;
        $brand->slug=Str::of($request->name)->slug('_');
        $files = $request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/brand/".$brand->image);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $brand->slug . '.' . $extension;
            $brand->image = $filename;
            $files->move(public_path('images/brand'), $filename);
        }
        $brand->sort_order=$request->sort_order;
        $brand->metakey=$request->metakey;
        $brand->metadesc=$request->metadesc;
        $brand->created_by=Auth::id()??1;
        $brand->created_at=date('Y-m-d H:i:s');
        $brand->status=$request->status;
        if($brand->save())
        {
            $link=new Links();
            $link->slug= $brand->slug;
            $link->table_id= $brand->id;
            $link->type= "brand";
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type' => 'success', 'mgs' => 'Thêm thương hiệu thành công']);

        }
        return redirect()->route('brand.index')->with('message', ['type' => 'danger', 'mgs' => 'Thêm không thành công']);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand=Brand::find($id);
        return view("backend.Brand.show",compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            return redirect()->route('brand.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Brand::all();
        return view("backend.Brand.edit",compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $brand=Brand::find($id);
    
        // $brand->name= $request->name;
        // $brand->slug= Str::slug($brand->name= $request->name,'_');

        // $brand->metakey= $request->metakey;
        // $brand->metadesc= $request->metadesc;
        // $brand->sort_order= $request->sort_order;
        // $brand->status= $request->status;
        // $brand->updated_at=date('Y-m-d H:i:s');


        // if($brand->save())
        // {
        //     return redirect()->route('brand.index')->with('message',['type'=>'success','mgs'=>'Thêm thành công']);
        // }
        // ;}
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;
        //$brand->level = $request->level;        
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->updated_at =date('Y-m-d H:i:s');
        $brand->updated_by = 1;
        $brand->status = $request->status;
        //up load file
        $file = $request->file('image');
        if ($file != NULL) {
            $extention = $file->getClientOriginalExtension();
            if (in_array($extention, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $brand->slug.'.'.$extention;
                $file->move(public_path('images/brand'), $fileName);
                $brand->image = $fileName;
            }
        }
        if ($brand->save()){
            $link=Links::where([["table_id","=",$id],["type","=","brand"]])->first();
            $link->slug= $brand->slug;
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('brand.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);

    }
    public function destroys(string $id)
    {

        $brand = Brand::find($id);
        if ($brand == NULL) {
            return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $brand->delete())
       {
        $link=Links::where([["table_id","=",$id],["type","=","brand"]])->first();
        $link->delete();
        return redirect()->route('brand.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('brand.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);


    }
    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list = Brand::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.brand.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $brand = Brand::find($id);
        if($brand==NULL)
        {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $brand->status = 0;
         $brand->updated_at =date('Y-m-d H:i:s');

         $brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_brand = Brand::find($id);
        if($list_brand==NULL)
        {
            return redirect()->route('brand.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_brand->status = 2;
            $list_brand->updated_at=date('Y-m-d H:i:s');
            $list_brand->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_brand->save();
        return redirect()->route('brand.index')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Brand::find($id);
        if($row == NULL)
        {
            return redirect()->route('brand.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('brand.index')->with('message',['type' => 'danger','mgs' =>'Thay đổi trạng thái thành công!']);
    }
}

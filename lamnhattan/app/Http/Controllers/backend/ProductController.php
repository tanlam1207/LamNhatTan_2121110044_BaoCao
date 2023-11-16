<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index()
    {
        $list = Product::where("status",'!=',0)->get();
        return view("backend.Product.index",compact("list"));
    }
    public function create()
    {
        $idbrand=Brand::where('status','!=',0)->get();
        $idcategory=Category::where('status','!=',0)->get();
        return view("backend.Product.create",compact("idcategory","idbrand"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $product->slug=Str::of($request->name)->slug('-');
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->metakey=$request->metakey;
        $product->detail=$request->detail;
        $product->metadesc=$request->metadesc;
        $product->price=$request->price;
        $product->created_by=Auth::id()??1; 
        $product->created_at=date('Y-m-d H:i:s');
        $product->status=$request->status;
        $files = $request->file('image');
        if ($files != NULL) {
            $file = $files[0]; // Lấy hình ảnh đầu tiên từ danh sách
            $extension = $file->getClientOriginalExtension();
            
            if (in_array($extension, ['png', 'jpg', 'jpeg', 'webp'])) {
                $fileName = $product->slug . '_' . time() . '.' . $extension;
                $file->move(public_path('images/product'), $fileName);
                $product->image = $fileName; // Gán tên hình ảnh đầu tiên vào thuộc tính 'image' của 'Product'
                $product->save();
            }   
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::find($id);
        return view("backend.product.show",compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $idbrand=Brand::where('status','!=',0)->get();
        $idcategory=Category::where('status','!=',0)->get();
        $product=Product::find($id);
        if($product==null)
        {
            return redirect()->route('product.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = Product::all();
        return view("backend.product.edit",compact("product","idbrand","idcategory"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->metakey=$request->metakey;
        $product->detail=$request->detail;
        $product->metadesc=$request->metadesc;
        $product->price=$request->price;
        $product->updated_by=Auth::id()??1; 
        $product->updated_at=date('Y-m-d H:i:s');
        $product->status=$request->status;
        //up load file
        $files=$request->file('image');
        if ($files != NULL) {
            $extension = $files->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'jpeg'])) {
                //xóa hình cũ
                $image_path_delete=app_path("images/product/".$product->image);
                if(File::exists($image_path_delete)){
                    unlink($image_path_delete);
                }
            }
            //thêm
            $filename = $product->slug . '.' . $extension;
            $product->image = $filename;
            $files->move(public_path('images/product'), $filename);
        }
       
        if ($product->save()){
       
            return redirect()->route('product.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $product = Product::find($id);
        if ($product == NULL) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $product->delete())
       {
      
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    public function trash()
    {
        $list = Product::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
        return view('backend.product.trash', compact('list'));
    }
    public function delete($id)
    {
        
        $product = Product::find($id);
        if($product==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
         $product->status = 0;
         $product->updated_at =date('Y-m-d H:i:s');

         $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','mgs' => 'Xóa vào thùng rác thành công!']);
        }

    }
    public function restore($id)
    {
        $list_product = Product::find($id);
        if($list_product==NULL)
        {
            return redirect()->route('product.index')->with('message', ['type' => 'danger','mgs' => 'Mẫu tin không tồn tại!']);
        }
        else
        {
            $list_product->status = 2;
            $list_product->updated_at=date('Y-m-d H:i:s');
            $list_product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
            $list_product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success','mgs' => 'Khôi phục thành công!']);
        }
    }
    public function status($id)
    {
        $row = Product::find($id);
        if($row == NULL)
        {
            return redirect()->route('product.index')->with('message',['type' => 'danger','mgs' =>'Mẫu tin không tồn tại']);
       }
       $row ->updated_by =Auth::id() ?? 1;//đăng nhập
       $row ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('product.index')->with('message',['type' => 'danger','mgs' =>'Thay đổi trạng thái thành công!']);
    }
    public function getProductPrice($id)
    {
        $product = Product::find($id);
    
        if ($product) {
            return response()->json(['price' => $product->price, 'image' => asset('images/product/' . $product->image)]);

        }
    
        return response()->json(['error' => 'Product not found'], 404);
    }
}

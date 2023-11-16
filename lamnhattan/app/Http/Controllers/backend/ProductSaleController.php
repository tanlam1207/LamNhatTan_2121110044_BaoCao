<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\productsale;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductSaleController extends Controller
{
    public function index()
    {
        $list = productsale::where('product_id', '!=', 0)->get();
        return view("backend.ProductSale.index",compact("list"));
    }
    public function create()
    {
        $idproduct=Product::where('status','!=',0)->get();
        return view("backend.ProductSale.create",compact("idproduct"));
    }
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        if ($product) {
            $psale = new productsale();
            $psale->product_id = $request->product_id;
            $psale->qty = $request->qty;
            $productPrice = $product->price;
            $discountPercentage = $request->price_sale;
            $psale->price_sale = $productPrice - ($productPrice * $discountPercentage / 100);
    
            $psale->start_date = $request->start_date;
            $psale->end_date = $request->end_date;
            $psale->created_by = Auth::id() ?? 1;
            $psale->created_at = date('Y-m-d H:i:s');
            $psale->save();
    
            return redirect()->route('productsale.index')->with('message', ['type' => 'success','mgs' => 'Tạo mẫu tin thành công!']);
        } else {
            return redirect()->route('productsale.index')->with('message',['type' => 'danger','mgs' =>'Id sản phẩm không tồn tại!']);
        }
    }
    public function edit(string $id)
    {
        $idproduct=Product::where('status','!=',0)->get();
        $psale=productsale::find($id);
        if($psale==null)
        {
            return redirect()->route('product.index')->with("message",['type'=>'danger','msf'=>'không tồn tại mẫu tin này']);
        }
        $list = productsale::all();
        return view("backend.productsale.edit",compact("psale","idproduct"));
    }
    public function update(Request $request, string $id)
    {
        $product = Product::find($request->product_id);
        $psale = productsale::find($id);
        $psale->product_id = $request->product_id;
        $psale->qty = $request->qty;
        $productPrice = $product->price;
        $discountPercentage = $request->price_sale;
        $psale->price_sale = $productPrice - ($productPrice * $discountPercentage / 100);

        $psale->start_date = $request->start_date;
        $psale->end_date = $request->end_date;
        $psale->created_by = Auth::id() ?? 1;
        $psale->created_at = date('Y-m-d H:i:s');
        if ($psale->save()){
       
            return redirect()->route('productsale.index')->with('message', ['type' => 'success','mgs' => 'Cập nhật mẫu tin thành công!']);

        }
        return redirect()->route('productsale.index')->with('message', ['type' => 'success', 'mgs' => 'Cập nhật không thành công thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroys(string $id)
    {
        $psale = productsale::find($id);
        if ($psale == NULL) {
            return redirect()->route('productsale.index')->with('message', ['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
       if( $psale->delete())
       {
      
        return redirect()->route('productsale.index')->with('message', ['type' => 'success', 'mgs' => 'Xóa khỏi CSDL thành công']);
       }
       return redirect()->route('productsale.index')->with('message', ['type' => 'danger', 'mgs' => 'Xóa khỏi CSDL không thành công']);
    }
    
    
}

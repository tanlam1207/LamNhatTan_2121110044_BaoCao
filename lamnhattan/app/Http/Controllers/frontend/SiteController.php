<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Links;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    public function index($slug = null)
    {
        if ($slug == null) {
            return $this->home();
        } else {
            $link = Links::where('slug', $slug)->first();
            // var_dump($link);
            if ($link != NULL) {
                $type = $link->Type; //category, brand, topic, page
                switch ($type) {
                    case 'category': {
                            return $this->product_category($slug);
                        }
                    case 'brand': {
        
                            return $this->product_brand($slug);
                        }
                    case 'topic': {
                            return $this->post_topic($slug);
                        }
                    case 'page': {
                            return $this->post_page($slug);
                        }
                }
            } else {
                $product = Product::where([['slug', '=', $slug], ['status', '=', 1]])->first();
                if ($product != NULL) {
                    return $this->product_detail($product);
                } else {
                    $post = Post::where(['slug', '=', $slug], ['status', '=', 1])->get();
                    // var_dump($post);
                    if($post!=NULL){
                        return $this->post_topic($slug);
                    }else{
                        return $this->error_404($slug);
                    }
                }
                // var_dump($product);
            }
        }
        // return view('frontend.Home');
    }

    //home page

private function home()
{
    $list_category = Category::where([
        ['parent_id', '=', 0],
        ['status', '=', 1]
    ])->orderBy('sort_order', 'ASC')->take(3)->get();
    return view('frontend.home', compact('list_category'));
}


    //product_category
    private function product_category($slug)
    {
        // $list_product=Product::where('status', 1)->orderBy('created_at', 'DESC')->paginate(16);
        $category=Category::where([['slug', '=', $slug], ['status', '=', 1]])->first();
        if($category==null)
        {
            return $this->error_404($slug);
        }
        //
        $listcatid = array();
        array_push($listcatid, $category->id);
        $list_category1 = Category::where([['parent_id', '=', $category->id], ['status', '=', 1]])->get();
        if (count($list_category1)) {
            foreach ($list_category1 as $category1) {
                array_push($listcatid, $category1->id);
                $list_category2 = Category::where([['parent_id', '=', $category1->id], ['status', '=', 1]])->get();
                if (count($list_category2)) {
                    foreach ($list_category2 as $category2) {
                        array_push($listcatid, $category2->id);
                        $list_category3=Category::where([['parent_id', '=', $category2->id], ['status', '=', 1]])->get();
                        if (count($list_category3))
                        {
                            foreach ($list_category3 as $category3)
                            {
                                array_push($listcatid, $category3->id);
                            }
                        }
                    }
                }
            }
        }
        $categoryName = $category->name;
        $list_product = Product::where('status', 1)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
    
            if (request()->ajax()) {
                return response()->json([
                    'products' => $list_product->items(),
                    'categoryName' => $categoryName,
                    'nextPageUrl' => $list_product->nextPageUrl()
                ]);
            }
            
    
        return view('frontend.product-category', compact('list_product', 'categoryName'));
    }
    public function getProductsByCategory($categoryId)
{
    Log::info('categoryId: ' . $categoryId);
    $products = Product::with('category')->where('category_id', $categoryId)->get();
    Log::info('Ajax Request - Query: ' . Product::where('category_id', $categoryId)->toSql());
    Log::info('Ajax Request - Products: ' . json_encode($products));
    return response()->json(['products' => $products]);
}

public function getProductsByPrice(Request $request)
{
    // Lấy giá trị sắp xếp từ yêu cầu Ajax
    $sortOrder = $request->input('sort');

    // Query sản phẩm theo giá và sắp xếp
    $products = Product::where('status', 1)
        ->orderBy('price', $sortOrder)
        ->get();

    // Trả về dữ liệu JSON nếu là yêu cầu Ajax
    if ($request->ajax()) {
        return response()->json(['productss' => $products]);
    }

    // Nếu không phải Ajax, chuyển hướng hoặc hiển thị view tương ứng
    // ...
}
    
    
    //product_brand
    // private function product_brand($slug)
    // {
    //     $brand=Brand::where([['slug', '=', $slug],['status', '=', 1]])->first();
    //     if($brand==null)
    //     {
    //         return $this->error_404($slug);
    //     }
    //     $brandName=$brand->name;
    //     $list_product=Product::where([['status', '=', 1], ['brand_id', '=', $brand->id]])->paginate(6);
    //     if (request()->ajax()) {
    //         // Trả về dữ liệu JSON nếu là yêu cầu Ajax
    //         return response()->json(['products' => $list_product, 'brandName' => $brandName]);
    //     }
    //     return view('frontend.product-brand', compact('list_product','brandName'));
    // }
    public function getProductsByBrand($brandId)
{
    $productss = Product::with('brand')->where('brand_id', $brandId)->get();
    return response()->json(['products' => $productss]);
}
    
    //product all
    
    public function product()
    {
        $total = Product::where('status', 1)->count();
        $list_product = Product::with('productSale')  // Sử dụng eager loading để tối ưu hóa truy vấn
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        $list_category =Category::where('status','=',1)->get();
        foreach ($list_category as $category) {
            $productCountcat = Product::where('category_id', $category->id)->count();          
        }
        $list_brand =Brand::where('status','=',1)->get();
        return view('frontend.product', compact('list_product','list_category','list_brand','productCountcat','total'));
    }
    
    //product_detail
    private function product_detail($pro)
    {
        $image = Image::where('product_id',"=", $pro->id)->get();
        $listcatid = array();
        array_push($listcatid, $pro->category_id);
        $list_category1 = Category::where([['parent_id', '=', $pro->category_id], ['status', '=', 1]])->get();
        if (count($list_category1)) {
            foreach ($list_category1 as $category1) {
                array_push($listcatid, $category1->id);
                $list_category2 = Category::where([['parent_id', '=', $category1->id], ['status', '=', 1]])->get();
                if (count($list_category2)) {
                    foreach ($list_category2 as $category2) {
                        array_push($listcatid, $category2->id);
                        $list_category3=Category::where([['parent_id', '=', $category2->id], ['status', '=', 1]])->get();
                        if (count($list_category3))
                        {
                            foreach ($list_category3 as $category3)
                            {
                                array_push($listcatid, $category3->id);
                            }
                        }
                    }
                }
            }
        }
        $list_product = Product::where([['status','=', 1], ['id','!=', $pro->id]])
        // ->whereIn('category_id', $listcatid)
        ->orderBy('created_at', 'DESC')
        ->limit(5)->get();
        $list_cat = Category::where('status','=', 1)->get();
        foreach ($list_cat as $category) {
            $productCount = Product::where('category_id', $category->id)->count();          
        }
        return view('frontend.product-detail', compact('pro','image','list_product','list_cat','productCount'));
    }

    //post all
    public function post()
    {
        $list_post=Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(8);
        return view('frontend.post', compact('list_post'));
    }

    //post_topic
    private function post_topic($slug)
    {
        $topic=Topic::where([['slug', '=', $slug],['status', '=', 1]])->first();
        if($topic==null)
        {
            return $this->error_404($slug);
        }
        $toppicname=$topic->name;
        $list_post=Post::where([['topic_id', '=',$topic->id], ['status', '=','1'], ['type', '=', 'postHome']])->orderBy('created_at', 'DESC')
        ->paginate(4);
        return view('frontend.post-topic', compact('list_post','toppicname'));
    }

    //post_page
    private function post_page($slug)
    {
        $page=Post::where([['$slug', '=', $slug],['status', '=', 1], ['type', '=', 'page']])->first();
        if($page==null)
        {
            return $this->error_404($slug);
        }
        return view('frontend.post-page', compact('page'));
    }

    //post_detail
    private function post_detail($postdetail, $slug)
    {
        if($postdetail==null)
        {
            return $this->error_404($slug);
        }
        $list_post=Post::where([['status', '=', 1], ['id', '!=', $postdetail], ['topic_id', '=', $postdetail->topic_id]])->orderBy('created_at', 'DESC')
        ->limit(9)
        ->get();
        return view('frontend.post-detail', compact('postdetail', 'list_post'));
    }

    //error_404
    private function error_404($slug)
    {
        return view('frontend.404');
    }
}

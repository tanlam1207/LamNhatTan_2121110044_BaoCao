@extends('layouts.site')
@section('title', 'All Product')
@section('content')

<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll" tabindex="1" style="overflow-y: hidden; outline: none;">
                                               @foreach ($list_category as $cat )
                                               <li><a href="{{ route('site.slug',['slug'=>$cat->id]) }}">{{ $cat->name }} ({{ $productCountcat }})</a></li>     
                                               @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                @foreach ($list_brand as $brand )
                                                <li><a href="{{ route('site.slug',['slug'=>$brand->id]) }}">{{ $brand->name }}</a></li>     
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
             
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                 
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 6 of {{ $total }} results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="asc">Low To High</option>
                                    <option value="desc">High To Low</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class=" row product__cate">
                        @foreach ($list_product as $product )
                        <div class="col-lg-4 col-md-6 col-sm-6 category-product ">
                            <div class="product__item">
                                <div class="product__item__pic ">
                            <a href="{{ route('site.slug',['slug'=>$product->slug]) }}"> <img src="{{ asset('images/product/' . $product->image) }}"></a>
                                </div>
                                <div class="product__item__text ">
                                    <h6 class="ps-2">{{ $product->name }}</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="star_rating py-1">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                      </div>    
                                      <div class="price_product pb-4">
                                        @if ($product->productSale)
                                            <h6>
                                                <span class="price_discount">{{ $product->price }} VNĐ</span>
                                                <span class="price">{{ $product->productSale->price_sale }} VNĐ</span>
                                            </h6>
                                        @else
                                            <h6><span class="dark my-2">{{ $product->price }} VNĐ</span></h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  
              
                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            {{ $list_product->render('frontend.name')}}
                        </div>
                        {{-- <nav>
                            {!! $list_product->links() !!}
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
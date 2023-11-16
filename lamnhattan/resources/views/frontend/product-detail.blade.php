@extends('layouts.site')
@section('title', 'chi tiet san pham')
@section('content')
<div class="slide container3 row">
    <div class="col-md-12">
        <div class="page_product__breadcrumb py-3">
            <a class="page_product__breadcrumb_items" href="">Home</a>
            <span class="px-2">/</span>
            <a class="page_product__breadcrumb_items" href="">Wearable Items</a>
         </div>
     <div class="detail_product d-flex">
        <div class=" justify-content-start" style="width: 38%;">
          <div class="conttent-left">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators d-none">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                      aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                      aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                      aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                  @foreach ($image as $img)
                  <div class="carousel-item active" data-bs-interval="10000">
                      <img src="{{ asset('images/product/' . $img->name) }}" id="img1" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                      </div>
                  </div>
                  @endforeach

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
              <div class="row py-3 ">
                  <div class=" smallimg-item d-flex justify-content-center">
                      @foreach ($image as $key=>$item)
                      <a class="link-side px-2" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}"
                      href="#img1"><img style="width: 70px;" src="{{ asset('images/product/' . $item->name) }}" alt=""></a>
                      @endforeach
                  </div>
              </div>
          </div>
         </div>
        </div>
        <div class=" justify-content-start" style="width: 38%;">
        <div><h2>{{ $pro->name }}</h2></div>
        <div class="star_rating py-1">
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span style="color: black;">(1 customer review)</span>
        </div>
        <div class="price_product pb-4">
          <h4>
        <div class="py-3">
          <span class="price_discount">{{ $pro->price }}</span>
          <span class="price">$275.50</span>
        </div>
      </h4>
           
         
        </div>
        <div>
          <p class="fw-bold">This Bluetooth speaker delivers big sound, making it then only music system you’ll need in or out of the house. Prem materials such as anodized aluminum & durable polymers withstand the rigor of an active lifestyle.</p>
        </div>
        <div>
          <div class="buttons_added d-flex py-3">
            <input class="minus is-form" type="button" value="-">
            <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
            <input class="plus is-form" type="button" value="+">
            <div class="button_buy px-2">
              <a class="nav-link button_addtocart btn btn-primary" style="width: 60%;" href="">
                <span>
                  <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="1em"
                  height="1em"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M23.4 8.016c-0.336-0.336-0.768-0.504-1.248-0.504h-4.128l-5.304-7.104c-0.144-0.216-0.408-0.336-0.672-0.336s-0.504 0.12-0.624 0.336l-5.328 7.104h-4.248c-0.936 0-1.704 0.768-1.704 1.704v1.848c0 0.936 0.768 1.704 1.704 1.704h0.24l1.464 8.928c0.216 1.272 1.296 2.208 2.592 2.208h11.688c1.296 0 2.4-0.936 2.592-2.208l1.464-8.928h0.24c0.936 0 1.704-0.768 1.704-1.704v-1.848c0.072-0.432-0.096-0.888-0.432-1.2zM20.424 12.792l-1.464 8.64c-0.096 0.504-0.528 0.888-1.032 0.888h-11.712c-0.504 0-0.96-0.384-1.032-0.888l-1.464-8.664h16.704zM8.088 7.512l3.96-5.304 3.984 5.304h-7.944zM3.84 10.152c0 0.432 0.24 0.816 0.576 1.056h-2.568c-0.048 0-0.144-0.072-0.144-0.144v-1.848c0-0.048 0.048-0.12 0.144-0.12h2.568c-0.336 0.216-0.576 0.624-0.576 1.056zM6.336 9.816l0.552-0.744h10.32l0.552 0.744c-0.024 0.096-0.048 0.216-0.048 0.336 0 0.432 0.216 0.816 0.576 1.056h-12.48c0.336-0.24 0.576-0.624 0.576-1.056 0-0.12-0.024-0.216-0.048-0.336zM20.28 10.152c0-0.432-0.24-0.816-0.576-1.056h2.568c0.048 0 0.144 0.072 0.144 0.144v1.824c0 0.048-0.072 0.144-0.144 0.144h-2.568c0.336-0.24 0.576-0.624 0.576-1.056zM15.768 22.080c0.432 0 0.792-0.36 0.792-0.792v-7.44c0-0.432-0.36-0.792-0.792-0.792s-0.792 0.36-0.792 0.792v7.416c0 0.456 0.36 0.816 0.792 0.816zM8.376 22.080c0.432 0 0.792-0.36 0.792-0.792v-7.44c0-0.432-0.36-0.792-0.792-0.792s-0.792 0.36-0.792 0.792v7.416c0 0.456 0.36 0.816 0.792 0.816zM12.072 22.080c0.432 0 0.792-0.36 0.792-0.792v-7.44c0-0.432-0.36-0.792-0.792-0.792s-0.792 0.36-0.792 0.792v7.416c0 0.456 0.36 0.816 0.792 0.816z"
                  ></path>
                </svg> Add To Cart
                </span>
              </a>
            </div>  
          </div>
          
          <div>
            <a class="nav-link" href="">
              <i class="fa-regular fa-heart"></i>
              <span class="px-1">Add to wishlist</span>
            </a>
          </div>
          <div class="py-1">
            <span>Categories: </span>
            <a style="text-decoration: none;" href="">Computer & PC,</a>
            <a style="text-decoration: none;" href="">Wearable Items</a>
          </div>
          <div class="py-1">
            <span>Tags: </span>
            <a style="text-decoration: none;" href="">Headphone,</a>
            <a style="text-decoration: none;" href="">Speaker</a>
          </div>

        </div>
        <div></div></div>
        <div class=" justify-content-start" style="width: 24%;">
        <div class="product_categories">
          <div class="product_categories_content">
            <h4 class="product_categories_title pb-4 fw-bold">Product categories</h4>
            <ul class="product_categories_content_items" style="list-style: none;">
              @foreach ($list_cat as $cat )
              <li>
                <a href="">{{ $cat->name }}<span>({{ $productCount }})</span></a>
              </li>
              @endforeach
            
              {{-- <li>
                <a style="opacity: 1;" href="">Wearable Items<span>(9)</span></a>
              </li> --}}
            </ul>
          </div>
        </div>
        <div class="product_categories">
          <div class="product_categories_content">
            <h4 class="product_categories_title pb-4 fw-bold">Products</h4>
            <ul class="product_categories_content_items2" style="list-style: none;">
              @foreach ( $list_product as $products)
              <li class="d-flex">
                <div style="width: 30%;">
                  <a style="opacity: 1;" href="">
                    <img style="width: 100%; padding-right: 5px;" src="{{asset('images/product/' . $products->image)}}" alt="">
                  </a>
                </div>
                <div  style="width: 70%;">
                  <p class="Product_title">
                    <a class="fw-bold"href="">{{ $products->name}}</a>
                  </p>
                  <span>
                    {{ $products->price}}
                  </span>
                  <div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        </div>
     </div>
</div> 
<div class="row desription_detail">
<div class="desciption_product" style="width: 76%;">
<p>
  <a class="button_description btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Description
  </a>
</p>
<div class="collapse" id="collapseExample">
<div class="description_product_items pt-4">
<div class="detail_des row">
<div class="col-3 detail_des_title">Overview</div>
<div class="col-9">
<h3 class="fw-bold">
Featuring True360 Sound Technology
</h3>
<p>
With its compact footprint and convenient leathers carrying handles the Beolit 17 wireless Bluetooth speaker ready to accompany you on all of life’s adventures Featuring 360-degrees sound technology the Beolit 17 lets you enjoying immersive Bang & Olufsen signature sound whenever and wherever you’d like Whether you’re at home or on the road you can transform any moment with the power clarity portable.
</p>
</div>
</div>
<div class="detail_des row">
<div class="col-3 detail_des_title"></div>
<div class="col-9">
<img width="100%" src="{{ asset('images/banner/_1699955965.jpeg')}}" alt="">
</div>
</div>
<div class="detail_des row">
<div class="col-3 detail_des_title">Features</div>
<div class="col-9">
<div class="text_discrip d-flex">
<p>
Auto Schedule - </p>
<span style="opacity: 0.6;">True360 Sound Technology featuring Bang & Olufsen Signature Sound</span>
</div>
<div class="text_discrip d-flex">
<p>
Auto Away - </p>
<span style="opacity: 0.6;">Premium materials are built to last</span>
</div>
<div class="text_discrip d-flex">
<p>
Remote Control - </p>
<span style="opacity: 0.6;">Connect button activates intelligent features via Bang & Olufsen App</span>
</div>
<div class="text_discrip d-flex">
<p>
Energy Star - </p>
<span style="opacity: 0.6;">Portable Bluetooth speaker keeps going with up to 24 hours of battery life</span>
</div>
</div>
<div class="detail_des row">
<div class="col-3 detail_des_title">What’s Included</div>
<div class="col-9">
<h5>Beolit 17</h5>
<h5>Power Adapter</h5>
<h5>1.25m USB-A to USB-C cable</h5>
<h5>Quick Start Guide</h5>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="hot_product_sale" style="width: 24%;">
<div class="hot_product_sale_content">
<div class="hot_product_sale_title">
<h5>Most Powerfull</h5>
<h2 class="fw-bold">Powerbank</h2>
<div class="button_buy_hot_sale px-2">
  <a class="nav-link button_addtocart btn btn-primary" style="width: 30%;" href="">
    <span>
      Buy Now
    </span>
    </a>  </div>
</div>
<div class="hot_product_sale_img">
<img width="100%" style="transition: all 0.5s ease-in-out;" src="{{ asset('images/banner/_1699954464.webp')}}" alt="">
</div>
</div>

</div>
</div>
</div>
@endsection
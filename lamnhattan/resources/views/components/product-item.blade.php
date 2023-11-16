<div class="col">
    <div class="product_trending mx-auto">
      <div class="img_product_trending">
        <img style="height: 300px"
        src="{{ asset('images/product/' . $product->image) }}"
          alt=""
        />
      </div>
      <div class="information_product_trending">
        <div class="information_product_trending_title">
          <a class="nav-link" href="{{ route('site.slug',['slug'=>$product->slug]) }}">{{ $categoryName }}</a>
        </div>
        <h4 class="information_product_trending_title">
          <a href="{{ route('site.slug',['slug'=>$product->slug]) }}" class="nav-link"style="overflow: hidden;white-space: nowrap;max-width: 400px;text-overflow: ellipsis;"
            >{{ $product->name }}</a
          >
        </h4>
        <div class="star_rating py-1">
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>
        <div class="price_product pb-4">
          @if ($priceSale)
          <h5>
              <span class="price_discount">{{ $product->price }} VNĐ</span>
              <span class="price">{{ $priceSale }} VNĐ</span>
          </h5>
      @else
          <H5><span class="dark my-2">{{ $product->price }} VNĐ</span></H5>
           @endif
        </div>
      </div>
    </div>
  </div>
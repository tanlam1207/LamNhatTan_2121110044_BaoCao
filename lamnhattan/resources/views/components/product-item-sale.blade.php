<div class="col">
    <div class="product_trending mx-auto">
      <div class="img_product_trending">
        <img style="height: 300px"
        src="{{ asset('images/product/' . $productImage) }}"
          alt=""
        />
      </div>
      <div class="information_product_trending">
        <div class="information_product_trending_title">
          <a class="nav-link" href="{{ route('site.slug',['slug'=>$productSlug]) }}">{{ $categoryName }}</a>
        </div>
        <h4 class="information_product_trending_title">
          <a href="{{ route('site.slug',['slug'=>$productSlug]) }}" class="nav-link"style="overflow: hidden;white-space: nowrap;max-width: 400px;text-overflow: ellipsis;"
            >{{ $productName }}</a
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
          <h5>
            <span class="price_discount">{{ $productPrice }} VNĐ</span>
            <span class="price">{{ $priceSale }} VNĐ</span>
          </h5>
        </div>
      </div>
    </div>
  </div>
<a class="nav-link" href=""><h2 class="fw-bold">New Product</h2></a>
<div class="img_wrapper">
  <img
    src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Line-1.jpeg"
    alt=""
  />
</div>
<div class="shop_our  pt-4">
    <div class="row autoplay">
        @foreach ($list_product as $productitem)
        <x-product-item :productitem="$productitem"/>
        @endforeach
    </div>
  </div>
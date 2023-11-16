<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href={{ @asset('dist/css/bootstrap.min.css') }}>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
      integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href={{ @asset('dist/css/home.css') }}>
    <link rel="stylesheet" href={{ @asset('dist/css/elegant-icons.css') }}>
    <link rel="stylesheet" href={{ @asset('dist/css/magnific-popup.css')}}>
    <link rel="stylesheet" href={{ @asset('dist/css/nice-select.css')}}>
    <link rel="stylesheet" href={{ @asset('dist/css/owl.carousel.min.css')}}>
    <link rel="stylesheet" href={{ @asset('dist/css/slicknav.min.css')}}>
    <link rel="stylesheet" href={{ @asset('dist/css/style.css')}} >
</head>
    @yield('header')
  </head>

  <body>
    <div class="topmenu">
      <div class="d-flex container2 justify-content-between align-items-center">
        <div class=""><img style="height: 30px" src="https://xstore.b-cdn.net/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Logo-retina.jpeg" alt=""></div>
        <div class="">
         <x-main-menu/>
        </div>
        <div class="cart">
          <div class="d-flex justify-content-end">
            <a class="nav-link"><i class="far fa-heart"></i></a>
            <a class="nav-link font-bold mx-3" href=""
              ><i class="fas fa-user"></i> Sign in</a
            >
            <div class="mb-3">
              <button
                class="btn btn_cart btn-primary btn-sm"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample"
              >
                <div>
                  <i class="fas fa-shopping-cart"></i>
                  <strong>$0.00</strong>
                </div>
              </button>
            </div>

            <div
              class="offcanvas offcanvas-end"
              tabindex="-1"
              id="offcanvasExample"
              aria-labelledby="offcanvasExampleLabel"
            >
              <div class="offcanvas-header">
                <a class="offcanvas-title nav-link" id="offcanvasExampleLabel">
                  <span class="d-flex">
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
                      </svg>
                    </span>
                    <span class="equality_cart">0</span>
                  </span>
                </a>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close"
                ></button>
              </div>
              <div class="offcanvas-body">
                <div>
                  <strong>không có sản phẩm trong giỏ hàng</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @yield('content')
    
    <div class="footer">
        <div class="container4">
            <div class="row start_footer py-4">
                <div class="col items_start_footer d-inline-flex">
                    <div class="col-4"><img src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Icon-0-min.png" style="margin-left: 10px;" width="50" height="50" alt=""></div>
                    <div class="col-8">
                        <span class="fw-bold bigsize">Free Shipping Order $60</span>
                        <p class="fw-light">Delivery Moves So Quickly</p>
                
                    </div> 
                </div>
                <div class="col items_start_footer d-inline-flex">
                    <div class="col-4"><img src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Icon-1.png" style="margin-left: 10px;" width="50" height="50" alt=""></div>
                    <div class="col-8">
                        <span class="fw-bold bigsize">Easy & Fast Returns</span>
                        <p class="fw-light">30 Days Free Return Policy</p>
                
                    </div> 
                </div>
                <div class="col items_start_footer d-inline-flex">
                    <div class="col-4"><img src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Icon-2.png" style="margin-left: 10px;" width="50" height="50" alt=""></div>
                    <div class="col-8">
                        <span class="fw-bold bigsize">24/7 Customer Support</span>
                        <p class="fw-light">Online Help By Our Agents</p>
                
                    </div> 
                </div>
                <div class="col items_start_footer d-inline-flex">
                    <div class="col-4"><img src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Icon-3-min.png" style="margin-left: 10px;" width="50" height="50" alt=""></div>
                    <div class="col-8">
                        <span class="fw-bold bigsize">100% Secure Payments</span>
                        <p class="fw-light">PayPal / MasterCard / Visa</p>
                
                    </div> 
                </div>
            </div>
            <div class="row mid_footer py-4">
                <div class="col-7">
                    <div class="row">
                        <div class="col-4 mid_footer_items">
                            <ul id="footer_menu">
                                <li><a class="nav-link text-uppercase" href="">Company</a></li>
                                <li><a class="nav-link" href="">About Us</a></li>
                                <li><a class="nav-link" href="">Carrers</a></li>
                                <li><a class="nav-link" href="">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-4 mid_footer_items">
                            <ul id="footer_menu">
                                <li><a class="nav-link text-uppercase" href="">shop</a></li>
                                <li><a class="nav-link" href="">Appliances</a></li>
                                <li><a class="nav-link" href="">Gedgets</a></li>
                                <li><a class="nav-link" href="">Wearables</a></li>
                                <li><a class="nav-link" href="">Shop All</a></li>
                            </ul>
                        </div>
                        <div class="col-4 mid_footer_items">
                            <ul id="footer_menu">
                                <li><a class="nav-link text-uppercase" href="">support</a></li>
                                <li><a class="nav-link" href="">Contact Us</a></li>
                                <li><a class="nav-link" href="">Returns</a></li>
                                <li><a class="nav-link" href="">Frequently Asked Questions</a></li>
                                <li><a class="nav-link" href="">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="note_fotter">
                        <span class="text-uppercase py" style="font-weight: 900;color: rgb(90,126,153);">SUBSCRIBE</span>
                        <p class="py-3">Enter your email address to get <a class="discount_footer" href="">$20 off your first order</a></p>
                    </div>
                    <div class="search_footer"><p>
                        <input type="email" name="EMAIL" placeholder="Your E-mail Address" required="">
                        <input type="submit" value="Send">
                        </p></div>
                    <div class="footer_icons text-center">
                        <div class="footer_icon fb">
                            <i class="fa-brands fa-facebook"></i>
                            </div>
                            <div class="footer_icon tw ">
                            <i class="fa-brands fa-twitter"></i>  </div>
                            <div class="footer_icon yt ">
                            <i class="fa-brands fa-youtube"></i>  </div>
                    </div>
                <div>
                </div>

            </div>
            <div class="row end_footer pt-4">
                <div class="col-3">logo</div>
                <div class="col-9">
                    <div class="d-inline-flex">
                    <span class="px-1 fw-bold">Phone:</span>
                    <p style="color: grey;opacity: 0.8;">0334579994.</p>
                    <span class="px-1 fw-bold">Email:</span>
                    <p style="color: grey;opacity: 0.8;">Tanlunlk122@gmail.com.</p>
                </div>
                <div class="d-flex">
                    <span class="px-1 fw-bold">Copyright 2023:</span>
                    <p style="color: grey;opacity: 0.8;">TanVIpPro.</p></div>
                </div>
            </div>
        </div>
      </div>
         
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
      integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
      integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="{{ asset('dist/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('dist/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('dist/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dist/js/main.js') }}"></script>
    

    <script type="text/javascript">
      $(".filtering").slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
      });

      var filtered = false;

      $(".js-filter").on("click", function () {
        if (filtered === false) {
          $(".filtering").slick("slickFilter", ":even");
          $(this).text("Unfilter Slides");
          filtered = true;
        } else {
          $(".filtering").slick("slickUnfilter");
          $(this).text("Filter Slides");
          filtered = false;
        }
      });
    </script>
    <script>
      $('.autoplay').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
    </script>
   <script>
       $(document).ready(function() {
        $(document).on('click', '.shop__sidebar__categories a', function(e) {
    e.preventDefault();
   
               // Lấy id của danh mục từ href
               var categoryId = $(this).attr('href').split('/').pop();
               
               // Gửi yêu cầu Ajax
               $.ajax({
                url: '/get-products-by-category/' + categoryId,
    type: 'GET', // hoặc 'GET' tùy thuộc vào cấu hình middleware
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                   success: function(data) {
                       // Xử lý dữ liệu trả về
                       if (data.products.length > 0) {
                           // Xóa sản phẩm hiện tại
                           $('.category-product').remove();
   
                           // Hiển thị sản phẩm mới
                           $.each(data.products, function(index, product) {
                               var productHtml = '<div class="col-lg-4 col-md-6 col-sm-6 category-product">' +
                                   '<div class="product__item">' +
                                   '<div class="product__item__pic">' +
                                   '<a href="/site/slug/' + product.slug + '">' +
                                   '<img src="{{ asset('images/product/') }}/' + product.image + '">' +
                                   '</a>' +
                                   '</div>' +
                                   '<div class="product__item__text">' +
                                   '<h6 class="ps-2">' + product.name + '</h6>' +
                                   '<a href="#" class="add-cart">+ Add To Cart</a>' +
                                   '<div class="star_rating py-1">' +
                                   '<span class="fa fa-star"></span>' +
                                   '<span class="fa fa-star"></span>' +
                                   '<span class="fa fa-star"></span>' +
                                   '<span class="fa fa-star"></span>' +
                                   '<span class="fa fa-star"></span>' +
                                   '</div>' +
                                   '<div class="price_product pb-4">' +
                                   (product.productSale ?
                                       '<h5>' +
                                       '<span class="price_discount">' + product.price + ' VNĐ</span>' +
                                       '<span class="price">' + product.productSale.price_sale + ' VNĐ</span>' +
                                       '</h5>' :
                                       '<h5><span class="dark my-2">' + product.price + ' VNĐ</span></h5>'
                                   ) +
                                   '</div>' +
                                   '</div>' +
                                   '</div>' +
                                   '</div>';
   
                               $('.row .product__cate').append(productHtml);
                           });
                       } else {
                           // Hiển thị thông báo không có sản phẩm
                           alert('Không có sản phẩm thuộc danh mục này.');
                       }
                   },
                   error: function(error) {
                       console.log(error);
                       alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                   }
               });
           });
       });
   </script>
   <script>
    $(document).ready(function() {
     $(document).on('click', '.shop__sidebar__brand a', function(e) {
 e.preventDefault();

            // Lấy id của danh mục từ href
            var brandId = $(this).attr('href').split('/').pop();
            
            // Gửi yêu cầu Ajax
            $.ajax({
             url: '/get-products-by-brand/' + brandId,
 type: 'GET', // hoặc 'GET' tùy thuộc vào cấu hình middleware
 headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 },
                success: function(data) {
                    // Xử lý dữ liệu trả vềlog
               
                    if (data.products.length > 0) {
                        // Xóa sản phẩm hiện tại
                        $('.category-product').remove();

                        // Hiển thị sản phẩm mới
                        $.each(data.products, function(index, product) {
                            var productHtml = '<div class="col-lg-4 col-md-6 col-sm-6 category-product">' +
                                '<div class="product__item">' +
                                '<div class="product__item__pic">' +
                                '<a href="/site/slug/' + product.slug + '">' +
                                '<img src="{{ asset('images/product/') }}/' + product.image + '">' +
                                '</a>' +
                                '</div>' +
                                '<div class="product__item__text">' +
                                '<h6 class="ps-2">' + product.name + '</h6>' +
                                '<a href="#" class="add-cart">+ Add To Cart</a>' +
                                '<div class="star_rating py-1">' +
                                '<span class="fa fa-star"></span>' +
                                '<span class="fa fa-star"></span>' +
                                '<span class="fa fa-star"></span>' +
                                '<span class="fa fa-star"></span>' +
                                '<span class="fa fa-star"></span>' +
                                '</div>' +
                                '<div class="price_product pb-4">' +
                                (product.productSale ?
                                    '<h5>' +
                                    '<span class="price_discount">' + product.price + ' VNĐ</span>' +
                                    '<span class="price">' + product.productSale.price_sale + ' VNĐ</span>' +
                                    '</h5>' :
                                    '<h5><span class="dark my-2">' + product.price + ' VNĐ</span></h5>'
                                ) +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            $('.row .product__cate').append(productHtml);
                        });
                    } else {
                        // Hiển thị thông báo không có sản phẩm
                        alert('Không có sản phẩm thuộc thương hiệu này.');
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        });
    });
</script>
   <script>
    $(document).ready(function() {
    $('.shop__sidebar__categories ul li a').click(function() {
        // Loại bỏ lớp 'active' từ tất cả các li
        $('.shop__sidebar__categories ul li a').removeClass('active');
        
        // Thêm lớp 'active' cho li được chọn
        $(this).addClass('active');
    });
});

   </script>
      <script>
        $(document).ready(function() {
        $('.shop__sidebar__brand ul li a').click(function() {
            // Loại bỏ lớp 'active' từ tất cả các li
            $('.shop__sidebar__brand ul li a').removeClass('active');
            
            // Thêm lớp 'active' cho li được chọn
            $(this).addClass('active');
        });
    });
    
       </script>
<script>
  $(document).ready(function() {
    // Sự kiện khi người dùng thay đổi giá trị trong dropdown
    $('.shop__product__option__right select').on('change', function() {
        // Lấy giá trị của dropdown (asc hoặc desc)
        var sortOrder = $(this).val();

        // Gửi yêu cầu Ajax
        $.ajax({
            url: '/get-products-by-price',
            type: 'GET',
            data: { sort: sortOrder },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(data) {
                             console.log(data);
              if (data.productss.length > 0) {
                        // Xóa sản phẩm hiện tại
                       
                        $('.category-product').remove();

                        // Hiển thị sản phẩm mới
                        $.each(data.productss, function(index, product) {
                        var productHtml = '<div class="col-lg-4 col-md-6 col-sm-6 category-product">' +
                            '<div class="product__item">' +
                            '<div class="product__item__pic">' +
                            '<a href="/site/slug/' + product.slug + '">' +
                            '<img src="{{ asset('images/product/') }}/' + product.image + '">' +
                            '</a>' +
                            '</div>' +
                            '<div class="product__item__text">' +
                            '<h6 class="ps-2">' + product.name + '</h6>' +
                            '<a href="#" class="add-cart">+ Add To Cart</a>' +
                            '<div class="star_rating py-1">' +
                            '<span class="fa fa-star"></span>' +
                            '<span class="fa fa-star"></span>' +
                            '<span class="fa fa-star"></span>' +
                            '<span class="fa fa-star"></span>' +
                            '<span class="fa fa-star"></span>' +
                            '</div>' +
                            '<div class="price_product pb-4">' +
                            (product.productSale ?
                                '<h5>' +
                                '<span class="price_discount">' + product.price + ' VNĐ</span>' +
                                '<span class="price">' + product.productSale.price_sale + ' VNĐ</span>' +
                                '</h5>' :
                                '<h5><span class="dark my-2">' + product.price + ' VNĐ</span></h5>'
                            ) +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('.row .product__cate').append(productHtml);
                    });
                } else {
     
                    // Hiển thị thông báo không có sản phẩm
                    alert('Không có sản phẩm theo thứ tự sắp xếp này.');
                }
            },
            error: function(error) {
                console.log(error);
                alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
            }
        });
    });
});

</script>


    @yield('footer')
  </body>
</html>

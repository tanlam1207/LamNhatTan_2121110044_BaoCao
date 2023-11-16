@extends('layouts.site')
@section('title', 'Trang chủ')
@section('content')
<div class="slide container3">
    <div class="row">
      <div class="col-md-12">
        <div class="element">
          <section class="slider_bar">
            <div class="row justify-content-center align-items-center g-2">
              <div class="col-4 d-flex justify-content-center ">
                <div class="text_slider">
                  <div class="text_static"style="font-size: 15px;
                  font-weight: 200;">THE NEXT GENERATION</div>
                  <div class="fw-bold" style="font-size: 40px;
                  font-weight: 400;">Innovation That</div>
                  <div class="text_dymanic py-2" style="display: inline-flex">
                    {{-- <div class="text_static">Innovation That</div> --}}
                    <ul class="dymanic-txts">
                      <li><span>Drives Emotion</span></li>
                      <li><span>Changed The World</span></li>
                      
                    </ul>
                  </div>
                  <div class="text_static_under"style="width:500px;font-size: 18px;
                  font-weight: 200;">Get instant alerts for anyone who approaches, even if they don’t press the headphone.</div>  
                   <div class="information_blog_content py-3">
                    <a class="nav-link button_view_all btn btn-primary" href="">
                      <span>Buy Now</span>
                    </a>
                  </div>
                </div>
              
                
              </div>
              
              <div class="col-8"></div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="intro_sp">
      <div
        class="row filtering justify-content-center align-items-center g-2"
      >
        <div class="col card_category">
          <a href="">
            <div class="container_img">
              <img
                src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/1-min.jpeg"
                alt=""
              />
            </div>
          </a>
          <div class="card_category_title">
            <a class="nav-link" href="">
              <h5>Computer & PC</h5>
            </a>
            <a class="nav-link mx-4" href="">6 PRODUCT</a>
          </div>
        </div>
        <div class="col card_category">
          <a href="">
            <div class="container_img">
              <img
                src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/2-min.jpeg"
                alt=""
              />
            </div>
          </a>
          <div class="card_category_title">
            <a class="nav-link" href="">
              <h5>Smart Gadgets</h5>
            </a>
            <a class="nav-link mx-4" href="">2 PRODUCT</a>
          </div>
        </div>
        <div class="col card_category">
          <a href="">
            <div class="container_img">
              <img
                src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/4-min.jpeg"
                alt=""
              />
            </div>
          </a>
          <div class="card_category_title">
            <a class="nav-link" href="">
              <h5>TV & Monitors</h5>
            </a>
            <a class="nav-link mx-4" href="">5 PRODUCT</a>
          </div>
        </div>
        <div class="col card_category">
          <a href="">
            <div class="container_img">
              <img
                src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/3-min.jpeg"
                alt=""
              />
            </div>
          </a>
          <div class="card_category_title">
            <a class="nav-link" href="">
              <h5>Wearable Items</h5>
            </a>
            <a class="nav-link mx-4" href="">9 PRODUCT</a>
          </div>
        </div>
      </div>
    </div>
    <div class="blog pt-5">
      <div class="row">
        <div class="col">
          <img
            src="https://xstore.8theme.com/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Pin-Banner-1.jpeg"
            alt=""
          />
        </div>
        <div class="col">
          <div class="information_blog">
            <div class="information_blog_title">
              <h5>XSTORE ELEMENTOR MINIMAL ELECTRONICS DEMO</h5>
              <h2>Lookout Smart products here, there, everywhere.</h2>
              <div class="img_wrapper">
                <img
                  src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Line-1.jpeg"
                  alt=""
                />
              </div>
              <p>
                Save when you shop the Best Buy Outlet for clearance,
                open-box, refurbished and pre-owned items save more with
                coupons and 70% off. Super value deals 2022.
              </p>
            </div>
            <div class="information_blog_content">
              <a class="nav-link button_view_all btn btn-primary" href="/san-pham">
                <span>View All Products</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
      
    <div class="product_category py-5 text-center">
     
      {{-- @foreach ($list_category as $key=>$cat)
<x-product-home :cat="$cat"/>
@if ($key==0)
<x-slide-show />
@endif
@endforeach --}}
      {{-- sảm phẩm --}}
      <x-product-new />
      <x-product-sale />
         <div class="section_elementor pt-4">
      <div class="row">
        <div class="col banner">
          <div class="banner_img">
            <img
              src="https://xstore.8theme.com/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/1123.jpeg"
              alt=""
            />
          </div>
          <div class="banner_content">
            <h6 class="banner_subtitle text-start">
              <span class="fw-bold text-light text-uppercase"
                >new wearable gadget</span
              >
            </h6>
            <h2 class="banner_title py-3">
              <span class="fw-bold text-light"
                >Smart Watch-Z2 Pro with Voice Controls</span
              >
            </h2>
            <div class="banner_inner"></div>
          </div>
          <div class="button_wrap">
            <a class="nav-link button_view_all btn btn-primary" href="">
              <span>Purchase Now</span>
            </a>
          </div>
        </div>
        <div class="col banner">
          <div class="banner_img">
            <img
              src="https://xstore.8theme.com/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/234.jpeg"
              alt=""
            />
          </div>
          <div class="banner_content">
            <h6 class="banner_subtitle text-start">
              <span class="fw-bold text-light text-uppercase"
                >Free shipping available</span
              >
            </h6>
            <h2 class="banner_title py-3">
              <span class="fw-bold text-light"
                >Smart Home Gedget with 50% Discount</span
              >
            </h2>
            <div class="banner_inner"></div>
          </div>
          <div class="button_wrap">
            <a class="nav-link button_view_all btn btn-primary" href="">
              <span>Purchase Now</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    @foreach ($list_category as $key=>$cat)
    <x-product-home :cat="$cat"/>

@endforeach

   
      <div class="artical_popular py-5">
        <div class="artical_popular_title pb-4">
          <h2 class="fw-bold">Top Popular Articals</h2>
          <div class="img_wrapper">
            <img
              src="https://v9m6d2m2.rocketcdn.me/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Line-1.jpeg"
              alt=""
            />
          </div>
        </div>
        <div class="row">
          <div class="col artical_popular_items">
            <div class="artical_popular_items_img">
              <img
                src="https://xstore.8theme.com/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Image_2-366x220.jpeg"
                alt=""
              />
              <div class="etheme_post_date">
                <span class="etheme_post_mont fw-bold">Tháng 6</span>
                <span class="etheme_post_day fw-bold">12</span>
              </div>
            </div>
            <div class="artical_popular_items_subtitle">
              <div class="title_post py-3">
                <a class="nav-link" href=""
                  ><h5 class="fw-bold">
                    Voice Control – How Name Your Smart Device
                  </h5>
                </a>
              </div>
              <div class="btn_text">
                <a class="nav-link btn_hover_pr" href="">
                  <span class="text-primary">Continue Reading</span>
                  <i class="fa-solid fa-arrow-right text-primary"></i>
                </a>
              </div>
              <div
                class="description_user py-3 d-flex justify-content-between"
              >
                <div class="post_by d-flex py-1">
                  <div class="img_user">
                    <img
                      src="https://secure.gravatar.com/avatar/8cfd1ca2a3c32257956f1d7b40f82849?s=40&d=mm&r=g"
                      width="20"
                      height="20"
                      alt=""
                    />
                  </div>
                  <div class="name_user px-2">
                    <span>by</span>
                    <span>Tân Lâm</span>
                  </div>
                </div>
                <div class="data_post">
                  <div class="date_post d-inline-flex">12/06/2023</div>
                  <div class="count_comment d-inline-flex">
                    <a class="nav-link" href=""
                      ><svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em"
                        height="1em"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M21.288 0.528h-18.6c-1.44 0-2.64 1.176-2.64 2.64v12.744c0 1.44 1.176 2.64 2.64 2.64h2.52l2.256 4.56c0.096 0.216 0.336 0.384 0.6 0.384 0.24 0 0.456-0.12 0.6-0.36l2.256-4.536h10.368c1.44 0 2.64-1.176 2.64-2.64v-12.792c0-1.44-1.176-2.64-2.64-2.64zM22.632 3.168v12.744c0 0.72-0.576 1.296-1.296 1.296h-10.824c-0.264 0-0.504 0.144-0.6 0.36l-1.848 3.696-1.848-3.696c-0.096-0.216-0.336-0.384-0.6-0.384h-2.928c-0.696 0-1.272-0.576-1.272-1.272v-12.744c0-0.72 0.576-1.296 1.296-1.296h18.624c0.72 0 1.296 0.576 1.296 1.296z"
                        ></path>
                      </svg>
                      0</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col artical_popular_items">
            <div class="artical_popular_items_img">
              <img
                src="https://xstore.8theme.com/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Image_3-366x220.jpeg"
                alt=""
              />
              <div class="etheme_post_date">
                <span class="etheme_post_mont fw-bold">Tháng 6</span>
                <span class="etheme_post_day fw-bold">12</span>
              </div>
            </div>
            <div class="artical_popular_items_subtitle">
              <div class="title_post py-3">
                <a class="nav-link" href=""
                  ><h5 class="fw-bold">
                    Julie Schuster The Future Of Home Design
                  </h5>
                </a>
              </div>
              <div class="btn_text">
                <a class="nav-link btn_hover_pr" href="">
                  <span class="text-primary">Continue Reading</span>
                  <i class="fa-solid fa-arrow-right text-primary"></i>
                </a>
              </div>
              <div
                class="description_user py-3 d-flex justify-content-between"
              >
                <div class="post_by d-flex py-1">
                  <div class="img_user">
                    <img
                      src="https://secure.gravatar.com/avatar/8cfd1ca2a3c32257956f1d7b40f82849?s=40&d=mm&r=g"
                      width="20"
                      height="20"
                      alt=""
                    />
                  </div>
                  <div class="name_user px-2">
                    <span>by</span>
                    <span>Tân Lâm</span>
                  </div>
                </div>
                <div class="data_post">
                  <div class="date_post d-inline-flex">12/06/2023</div>
                  <div class="count_comment d-inline-flex">
                    <a class="nav-link" href=""
                      ><svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em"
                        height="1em"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M21.288 0.528h-18.6c-1.44 0-2.64 1.176-2.64 2.64v12.744c0 1.44 1.176 2.64 2.64 2.64h2.52l2.256 4.56c0.096 0.216 0.336 0.384 0.6 0.384 0.24 0 0.456-0.12 0.6-0.36l2.256-4.536h10.368c1.44 0 2.64-1.176 2.64-2.64v-12.792c0-1.44-1.176-2.64-2.64-2.64zM22.632 3.168v12.744c0 0.72-0.576 1.296-1.296 1.296h-10.824c-0.264 0-0.504 0.144-0.6 0.36l-1.848 3.696-1.848-3.696c-0.096-0.216-0.336-0.384-0.6-0.384h-2.928c-0.696 0-1.272-0.576-1.272-1.272v-12.744c0-0.72 0.576-1.296 1.296-1.296h18.624c0.72 0 1.296 0.576 1.296 1.296z"
                        ></path>
                      </svg>
                      0</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col artical_popular_items">
            <div class="artical_popular_items_img">
              <img
                src="https://xstore.8theme.com/elementor/demos/minimal-electronics/wp-content/uploads/sites/71/2022/02/Image_10-366x220.jpeg"
                alt=""
              />
              <div class="etheme_post_date">
                <span class="etheme_post_mont fw-bold">Tháng 6</span>
                <span class="etheme_post_day fw-bold">12</span>
              </div>
            </div>
            <div class="artical_popular_items_subtitle">
              <div class="title_post py-3">
                <a class="nav-link" href=""
                  ><h5 class="fw-bold">
                    Podcast Episode # 2 – Digital Voice Assistants
                  </h5>
                </a>
              </div>
              <div class="btn_text">
                <a class="nav-link btn_hover_pr" href="">
                  <span class="text-primary">Continue Reading</span>
                  <i class="fa-solid fa-arrow-right text-primary"></i>
                </a>
              </div>
              <div
                class="description_user py-3 d-flex justify-content-between"
              >
                <div class="post_by d-flex py-1">
                  <div class="img_user">
                    <img
                      src="https://secure.gravatar.com/avatar/8cfd1ca2a3c32257956f1d7b40f82849?s=40&d=mm&r=g"
                      width="20"
                      height="20"
                      alt=""
                    />
                  </div>
                  <div class="name_user px-2">
                    <span>by</span>
                    <span>Tân Lâm</span>
                  </div>
                </div>
                <div class="data_post">
                  <div class="date_post d-inline-flex">12/06/2023</div>
                  <div class="count_comment d-inline-flex">
                    <a class="nav-link" href=""
                      ><svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em"
                        height="1em"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M21.288 0.528h-18.6c-1.44 0-2.64 1.176-2.64 2.64v12.744c0 1.44 1.176 2.64 2.64 2.64h2.52l2.256 4.56c0.096 0.216 0.336 0.384 0.6 0.384 0.24 0 0.456-0.12 0.6-0.36l2.256-4.536h10.368c1.44 0 2.64-1.176 2.64-2.64v-12.792c0-1.44-1.176-2.64-2.64-2.64zM22.632 3.168v12.744c0 0.72-0.576 1.296-1.296 1.296h-10.824c-0.264 0-0.504 0.144-0.6 0.36l-1.848 3.696-1.848-3.696c-0.096-0.216-0.336-0.384-0.6-0.384h-2.928c-0.696 0-1.272-0.576-1.272-1.272v-12.744c0-0.72 0.576-1.296 1.296-1.296h18.624c0.72 0 1.296 0.576 1.296 1.296z"
                        ></path>
                      </svg>
                      0</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
             
              <a href=" {{ route('category.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh Mục</p>
              </a>
            </li>
            
            <li class="nav-item">
             
              <a href=" {{ route('brand.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thương Hiệu</p>
              </a>
            </li>
            <li class="nav-item">
             
              <a href=" {{ route('product.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả sản phẩm</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Giao diện
              <i class="fas fa-angle-left right"></i>
          
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('topic.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Topic</p>
              </a>
            </li>
            <li class="nav-item">
             
              <a href=" {{ route('slider.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
              </a>
            </li>
            <li class="nav-item">
              
              <a href="{{ route('post.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bài viết</p>
              </a>
            </li>
            <li class="nav-item">
              
              <a href="{{ route('banner.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Banner</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Chi tiết sản phẩm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              
              <a href="{{ route('productsale.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách giảm giá</p>
              </a>
            </li>
            <li class="nav-item">
              
              <a href="{{ route('order.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đơn hàng</p>
              </a>
            </li>
            <li class="nav-item">
              
              <a href="{{ route('orderdetail.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chi tiết đơn hàng</p>
              </a>
            </li>
            <li class="nav-item">
          
              <a href="    {{ route('contact.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Liên hệ</p>
              </a>
            </li>
            <li class="nav-item">
            
              <a href="  {{ route('customer.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Khách hàng</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-warehouse"></i>
            <p>
             Quản lý Nhập Xuát
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('import.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nhập hàng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('order.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Xuất hàng</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
             
              <a href=" {{ route('menu.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu</p>
              </a>
            </li>
          </ul>
         
        </li>
        <li class="nav-item">
          
          <a href="{{ route("admin.logout") }}"  style="color: red" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
         
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
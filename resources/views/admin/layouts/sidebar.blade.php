<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        {{-- <div class="profile-image">
          <img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"/>
          <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
        </div> --}}
        {{-- <div class="profile-name">
          <p class="name">
            Admin
          </p>
          <p class="designation">
            Super Admin
          </p>
        </div> --}}
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
        {{-- <span class="badge badge-success">New</span> --}}
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="{{ asset('metronic/assets/css/demo1/style.bundle.css') }}admin/pages/widgets.html">
        <i class="icon-shield menu-icon"></i>
        <span class="menu-title">Widgets</span>
      </a>
    </li> --}}

    <li class="nav-item {{ Request::is('admin/admin','admin/category','admin/category/add','admin/brand','admin/brand/add','admin/size','admin/size/add','admin/color','admin/color/add','admin/size-information','admin/size-information/add') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
        <i class=" icon-layers  menu-icon"></i>
        <span class="menu-title">Master</span>
        {{-- <span class="badge badge-danger">3</span> --}}
      </a>
      <div class="collapse {{ Request::is('admin/admin','admin/category','admin/category/add','admin/brand','admin/brand/add','admin/size','admin/size/add','admin/color','admin/color/add','admin/size-information','admin/size-information/add') ? 'show' : '' }}" id="master">
        <ul class="nav flex-column sub-menu">
          {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/role/add') ? 'active' : '' }}" href="{{ route('role') }}">Role</a></li> --}}
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/admin','admin/admin/add') ? 'active' : '' }}" href="{{ route('admin') }}">Admin</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/category','admin/category/add') ? 'active' : '' }}" href="{{ route('category') }}">Category</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/brand','admin/brand/add') ? 'active' : '' }}" href="{{ route('brand') }}">Brand</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/size','admin/size/add') ? 'active' : '' }}" href="{{ route('size') }}">Size</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/color','admin/color/add') ? 'active' : '' }}" href="{{ route('color') }}">Color</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/size-information','admin/size-information/add') ? 'active' : '' }}" href="{{ route('sizeinformation') }}">Size Information</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item {{ Request::is('admin/banner','admin/banner/add','admin/discount-banner') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#home-page" aria-expanded="false" aria-controls="home-page">
        <i class=" icon-home menu-icon"></i>
        <span class="menu-title">Banners</span>
        {{-- <span class="badge badge-danger">3</span> --}}
      </a>
      <div class="collapse {{ Request::is('admin/banner','admin/banner/add','admin/discount-banner') ? 'show' : '' }}" id="home-page">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/banner') ? 'active' : '' }}" href="{{ route('banner') }}">Banner</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/discount-banner') ? 'active' : '' }}" href="{{ route('edit.discountbanner') }}">Discount Banner</a></li>
          
        </ul>
      </div>
    </li>

    <li class="nav-item {{ Request::is('admin/product') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('product') }}">
        <i class="icon-list menu-icon"></i>
        <span class="menu-title">Product</span>
      </a>
    </li>

    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="master">
        <i class=" icon-layers  menu-icon"></i>
        <span class="menu-title">Order</span>
        {{-- <span class="badge badge-danger">3</span> --}}
      </a>
     <div class="collapse " id="order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/role/add') ? 'active' : '' }}" href="{{route('admin.order')}}">View orders</a></li>
         <!--  <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/role/add') ? 'active' : '' }}" href="">Cancel orders</a></li> -->
        </ul>
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#coupon" aria-expanded="false" aria-controls="master">
        <i class=" icon-layers  menu-icon"></i>
        <span class="menu-title">Coupons</span>
        {{-- <span class="badge badge-danger">3</span> --}}
      </a>
     <div class="collapse " id="coupon">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/role/add') ? 'active' : '' }}" href="{{route('coupon-lists')}}">Coupons List</a></li>
        
        </ul>
      </div>
    </li>
    <li class="nav-item {{ Request::is('admin/supplier','admin/supplier/add','admin/purchase','admin/purchase/add','admin/stock') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#stock" aria-expanded="false" aria-controls="master">
        <i class=" icon-layers  menu-icon"></i>
        <span class="menu-title">Stock Management</span>
        {{-- <span class="badge badge-danger">3</span> --}}
      </a>
     <div class="collapse {{ Request::is('admin/supplier','admin/supplier/add','admin/purchase','admin/purchase/add','admin/stock') ? 'show' : '' }}" id="stock">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/supplier','admin/supplier/add') ? 'active' : '' }}" href="{{route('supplier')}}">Supplier</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/purchase','admin/purchase/add') ? 'active' : '' }}" href="{{route('purchase')}}">Purchase</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/stock') ? 'active' : '' }}" href="{{route('stock')}}">Stock</a></li>
         <!--  <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/role/add') ? 'active' : '' }}" href="">Cancel orders</a></li> -->
        </ul>
      </div>
    </li>

    <li class="nav-item {{ Request::is('admin/customer') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('customer') }}">
        <i class="icon-people menu-icon"></i>
        <span class="menu-title">Customer</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('admin/page-lists') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('static-pages') }}">
        <i class="icon-list menu-icon"></i>
        <span class="menu-title">Pages</span>
      </a>
    </li>

    <!-- <li class="nav-item {{ Request::is('admin/blog') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.blog') }}">
        <i class="icon-envelope-letter menu-icon"></i>
        <span class="menu-title">Blog</span>
      </a>
    </li> -->
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="master">
        <i class=" icon-layers  menu-icon"></i>
        <span class="menu-title">Blog</span>
        {{-- <span class="badge badge-danger">3</span> --}}
      </a>
     <div class="collapse " id="blog">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/blog') ? 'active' : '' }}" href="{{ route('admin.blog') }}">View Blog</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','blog_category/add') ? 'active' : '' }}" href="{{ route('admin.blog_category.index') }}">View Blog Category</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item {{ Request::is('admin/testimonial') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('testimonial') }}">
        <i class="icon-envelope-letter menu-icon"></i>
        <span class="menu-title">Testimonial</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('admin/subscribers') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('subscriber') }}">
        <i class="icon-envelope-letter menu-icon"></i>
        <span class="menu-title">Subscribers</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('admin/aboutus') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('edit.aboutus') }}">
        <i class="icon-list menu-icon"></i>
        <span class="menu-title">About Us</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="master">
        <i class=" icon-layers  menu-icon"></i>
        <span class="menu-title">Contact Us</span>
        
      </a>
     <div class="collapse " id="contact">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','admin/blog') ? 'active' : '' }}" href="{{ route('admin.contact_us.index') }}">Customer Inquiry Details</a></li>
          <li class="nav-item d-none d-lg-block"> <a class="nav-link {{ Request::is('admin/role','blog_category/add') ? 'active' : '' }}" href="{{ route('admin.contact_us_detail.index') }}">Contact Us Details</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item {{ Request::is('admin/shipping') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('shipping') }}">
        <i class="icon-list menu-icon"></i>
        <span class="menu-title">Shipping</span>
      </a>
    </li>
    
    
  </ul>
  
</nav>


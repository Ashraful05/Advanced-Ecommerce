@php
    $prefix = \Illuminate\Support\Facades\Request::route()->getPrefix();
    $route = \Illuminate\Support\Facades\Route::current()->getName();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('admin.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/') }}backend/images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route=='admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-brand' ) ? 'active' : '' }}">
                        <a href="{{ route('all-brand') }}"><i class="ti-more"></i>All Brand</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix=='/category')?'active':'' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='all-category')?'active':'' }}"><a href="{{ route('all-category') }}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{ ($route=='all-subcategory')?'active':'' }}"><a href="{{ route('all-subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
                    <li class="{{ ($route=='all-subsubcategory')?'active':'' }}"><a href="{{ route('all-subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix=='/product')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='add-product')?'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add Product</a></li>
                    <li class="{{ ($route=='manage-product')?'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Product</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='/slider')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='manage-slider')?'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='/coupons')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='manage-coupon')?'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='/shipping')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='manage-division')?'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Shipping Division</a></li>
                    <li class="{{ ($route=='manage-district')?'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Shipping District</a></li>
                    <li class="{{ ($route=='manage-area')?'active':'' }}"><a href="{{ route('manage-area') }}"><i class="ti-more"></i>Shipping Area</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='/orders')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='pending-orders')?'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{ ($route=='confirmed-orders')?'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirm Orders</a></li>
                    <li class="{{ ($route=='processing-orders')?'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
                    <li class="{{ ($route=='picked-orders')?'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
                    <li class="{{ ($route=='shipped-orders')?'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                    <li class="{{ ($route=='delivered-orders')?'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                    <li class="{{ ($route=='cancel-orders')?'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='/blog')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='blog.category')?'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>
                    <li class="{{ ($route=='add.blog.post')?'active':'' }}"><a href="{{ route('add.blog.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>
                    <li class="{{ ($route=='view.blog.post')?'active':'' }}"><a href="{{ route('view.blog.post') }}"><i class="ti-more"></i>View Blog Post</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='setting')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='site.setting')?'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>
                    <li class="{{ ($route=='seo.setting')?'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='return')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Return Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='return-request')?'active':'' }}"><a href="{{ route('return-request') }}"><i class="ti-more"></i>Return Request</a></li>
                    <li class="{{ ($route=='all-request')?'active':'' }}"><a href="{{ route('all-request') }}"><i class="ti-more"></i>All Request</a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix=='review')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Product Review</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='pending.review')?'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
                    <li class="{{ ($route=='publish.review')?'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview {{ ($prefix=='/reports')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='all-reports')?'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'all-user' )}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>All Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=
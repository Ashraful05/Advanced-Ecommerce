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

            @php
                $brand = (auth()->guard('admin')->user()->brand == 1);
                $category = (auth()->guard('admin')->user()->category == 1);
                $product = (auth()->guard('admin')->user()->product == 1);
                $slider = (auth()->guard('admin')->user()->slider == 1);
                $coupons = (auth()->guard('admin')->user()->coupons == 1);
                $shipping = (auth()->guard('admin')->user()->shipping == 1);
                $blog = (auth()->guard('admin')->user()->blog == 1);
                $setting = (auth()->guard('admin')->user()->setting == 1);
                $returns = (auth()->guard('admin')->user()->returns == 1);
                $review = (auth()->guard('admin')->user()->review == 1);
                $orders = (auth()->guard('admin')->user()->orders == 1);
                $stock = (auth()->guard('admin')->user()->stock == 1);
                $reports = (auth()->guard('admin')->user()->reports == 1);
                $all_user = (auth()->guard('admin')->user()->all_user == 1);
                $admin_user_role = (auth()->guard('admin')->user()->admin_user_role == 1);
            @endphp

            @if($brand == true)
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
            @else
            @endif

            @if($category == true)
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
            @else
            @endif

            @if($product == true)
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
            @else
            @endif

            @if($slider == true)
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
            @else
            @endif

            @if($coupons == true)
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
            @else
            @endif

            @if($shipping == true)
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
            @else
            @endif

            @if($orders == true)
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
            @else
            @endif

            @if($stock == true)
            <li class="treeview {{ ($prefix=='/stock')?'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Stock</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='product-stock')?'active':'' }}"><a href="{{ route('product-stock') }}"><i class="ti-more"></i>Product Stock</a></li>
                </ul>
            </li>
            @else
            @endif

            @if($blog==true)
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
            @else
            @endif

            @if($setting == true)
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
            @else
            @endif

            @if($returns == true)
            <li class="treeview {{ ($prefix=='returns')?'active':'' }}">
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
            @else
            @endif

            @if($review == true)
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
            @else
            @endif

            <li class="header nav-small-cap">User Interface</li>

            @if($reports == true)
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
            @else
            @endif

            @if($all_user == true)
            <li class="treeview {{ ($prefix == 'all-user' )}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>All Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='all-users')?'active':'' }}">
                        <a href="{{ route('all-users') }}"><i class="ti-more"></i>Users</a>
                    </li>
                </ul>
            </li>
            @else
            @endif

            @if(($admin_user_role == true))
            <li class="treeview {{ ($prefix == 'adminuserrole' )}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Admin User Role</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='all.admin.user')?'active':'' }}">
                        <a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User</a>
                    </li>
                </ul>
            </li>
            @else
            @endif

            <li class="treeview {{ ($prefix == 'type' )}}">
                            <a href="#">
                                <i data-feather="credit-card"></i>
                                <span>All Users</span>
                                <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ ($route=='all-users')?'active':'' }}">
                                    <a href="{{ route('all-users') }}"><i class="ti-more"></i>Users</a>
                                </li>
                            </ul>
                        </li>



        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>

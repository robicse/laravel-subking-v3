   @if (Auth::check() && (Auth::user()->role_id == 1 ))
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style=" background: rgb(20,0,17);
background: linear-gradient(156deg, rgba(20,0,17,1) 0%, rgba(228,162,27,1) 37%, rgba(251,193,73,1) 100%); ">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('frontend/img/subking-logo.png')}}"  alt="SUbking" class="brand-image">
            <span class="brand-text font-weight-light">Subking</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar" >
            <!-- Sidebar Users panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{strtoupper(Auth::user()->role->name)}}</a>
                </div>
            </div>

            @if (Auth::check() )
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="{{route('admin.dashboard')}}" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/shopLocation*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="{{route('admin.shopLocation.index')}}" class="nav-link">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <p>
                                Shop Location
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/coupon*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="{{route('admin.coupon.index')}}" class="nav-link">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <p>
                                Coupon
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ Request::is('admin/category*')  || Request::is('admin/subcategory*') || Request::is('admin/sidecategory*') || Request::is('admin/ingredient*') || Request::is('admin/product*') || Request::is('admin/sidecategory*') || Request::is('admin/productsidecategoryingredient*') ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                Product Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.category.index')}}" class="nav-link {{Request::is('admin/category*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.subcategory.index')}}" class="nav-link {{Request::is('admin/subcategory*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.sidecategory.index')}}" class="nav-link {{Request::is('admin/sidecategory*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Side Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.ingredient.index')}}" class="nav-link {{Request::is('admin/ingredient*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Ingredient</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.product.index')}}" class="nav-link {{Request::is('admin/product*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.productsidecategoryingredient.index')}}" class="nav-link {{Request::is('admin/productsidecategoryingredient*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Product Side Category</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ Request::is('admin/order*') ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                Order Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.order.list')}}" class="nav-link {{Request::is('admin/order-list') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.order.transaction.list')}}" class="nav-link {{Request::is('admin/order-transaction-list') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Order Transactions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/email-club*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="{{route('admin.email.club.list')}}" class="nav-link">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <p>
                                Email Club
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/setting*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="{{route('admin.setting.index')}}" class="nav-link">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <p>
                                Setting (Logo)
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/career*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.5);">
                        <a href="{{route('admin.career.index')}}" class="nav-link">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <p>
                                Career
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
            @endif
        </div>
        <!-- /.sidebar -->
    </aside>
    @else
    <h2 class="text-danger text-center m-5">Your don't have permission to access here.</h2>
@endif


        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        The?Box DashBoard
                    </a>
                </div>
                <ul class="nav">
                    <li class="{{ Request::segment(2) == 'index' ? 'active' : null }}">
                        <a class="nav-link" href="{{Route('admin.index')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @canany(['Super', 'Read Collection', 'Add Collection', 'Delete Collection'])
                    <li class="{{ Request::segment(2) == 'collections' ? 'active' : null }}">
                        <a class="nav-link" href="{{Route('admin.collections.index')}}">
                            <i class="nc-icon nc-layers-3"></i>
                            <p>Collection</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Read Product', 'Add Product', 'Delete Product'])
                    <li class="{{ Request::segment(2) == 'product' ? 'active' : null }}">
                        <a class="nav-link" href="{{Route('admin.products.index')}}">
                            <i class="nc-icon nc-grid-45"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Edit Box', 'Add Box', 'Delete Box'])
                    <li class="{{ Request::segment(2) == 'boxes' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.boxes.index')}}">
                            <i class="nc-icon nc-app"></i>
                            <p>Boxes</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Edit Box', 'Add Box', 'Delete Box'])
                    <li class="{{ Request::segment(2) == 'mainboxes' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.mainboxes.index')}}">
                            <i class="nc-icon nc-mobile"></i>
                            <p>Main Boxes</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Category'])
                    <li class="{{ Request::segment(2) == 'category' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.category.index')}}">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Read Brand', 'Add Brand', 'Delete Brand'])
                    <li class="{{ Request::segment(2) == 'brand' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.brand.index')}}">
                            <i class="nc-icon nc-globe-2"></i>
                            <p>Brands</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super','Supply'])
                    <li class="{{ Request::segment(2) == 'suppliers' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.suppliers.index')}}">
                            <i class="nc-icon nc-bag"></i>
                            <p>Suppliers</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Read User', 'Add User', 'Delete User'])
                    <li class="{{ Request::segment(2) == 'users' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.admins.index')}}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super', 'Read Role', 'Add Role', 'Delete Role'])
                    <li class="{{ Request::segment(2) == 'roles' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.roles.index')}}">
                            <i class="nc-icon nc-key-25"></i>
                            <p>Role & Permission</p>
                        </a>
                    </li>
                    @endcan
                    @canany(['Super'])
                    <li class="{{ Request::segment(2) == 'orders' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.orders.index')}}">
                            <i class="nc-icon nc-cart-simple"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    @endcan
                    <li >
                        <a class="nav-link " href="/languages" target="_blank">
                            <i class="nc-icon nc-caps-small"></i>
                            <p>Languages</p>
                        </a>
                    </li>
                    @canany(['Super'])
                    <li class="{{ Request::segment(2) == 'settings' ? 'active' : null }}">
                        <a class="nav-link " href="{{Route('admin.settings.index')}}">
                            <i class="nc-icon nc-settings-gear-64"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>

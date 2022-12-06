<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url("javascript:void(0);") }}" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text"> {{ __('admin.Dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route("dashboard") }}">Dashboard 01</a></li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Content Management</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="{{ url("javascript:void(0);") }}" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-tag"></i><span
                                    class="right-nav-text">{{ __('admin.Categories')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.categories.index') }}">{{ __('admin.All Categories') }}</a></li>
                            <li><a href="{{ route('admin.categories.create') }}">{{ __('admin.Add New') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url("javascript:void(0);") }}" data-toggle="collapse" data-target="#products">
                            <div class="pull-left"><i class="ti-bag"></i><span
                                    class="right-nav-text"> {{ __('admin.Products') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url("") }}">{{ __('admin.All Products') }}</a></li>
                            <li><a href="{{ url("") }}">{{ __('admin.Add New') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url("javascript:void(0);") }}" data-toggle="collapse" data-target="#coupons">
                            <div class="pull-left"><i class="ti-credit-card"></i><span
                                    class="right-nav-text"> {{ __('admin.Coupons') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="coupons" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url("") }}">{{ __('admin.All Coupons') }}</a></li>
                            <li><a href="{{ url("") }}">{{ __('admin.Add New') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="ti-shopping-cart"></i>

                            {{ __('admin.Orders') }}
                            <span class="right badge badge-danger">20</span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="ti-money"></i>
                            {{ __('admin.Payments') }}

                        </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('admin.User Management') }} </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="{{ url("javascript:void(0);") }}" data-toggle="collapse" data-target="#admins">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{__('Admins')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url("") }}">index</a></li>
                            <li><a href="{{ url("") }}">Create</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <i class="ti-user"></i>

                            {{ __('admin.Customers') }}

                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

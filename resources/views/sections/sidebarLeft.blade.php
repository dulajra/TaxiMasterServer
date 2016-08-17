<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/13/16
 * Time: 12:55
 */
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->image==null? '/dist/img/avatar.png' : Auth::user()->image}}"
                     class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->firstName }}</p>
                <a>{{ Auth::user()->userLevel->name }}</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            {{--            @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 1)->get()))--}}
            @if(in_array(1, Auth::user()->getPrivileges()))
                <li class="@yield('main.navigation.dash')">
                    <a href="/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            @endif
            @if(in_array(3, Auth::user()->getPrivileges()))

                {{--@if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 3)->get()))--}}
                <li class="@yield('main.navigation.on_going_orders')">
                    <a href="/ongoing-orders">
                        <i class="fa fa-clock-o"></i> <span>Ongoing Orders</span>
                    </a>
                </li>
            @endif
            @if(in_array(4, Auth::user()->getPrivileges()))

                {{--            @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 4)->get()))--}}
                <li class="@yield('main.navigation.order_history')">
                    <a href="/finished-orders">
                        <i class="fa fa-history"></i> <span>Orders History</span>
                    </a>
                </li>
            @endif
            @if(in_array(2, Auth::user()->getPrivileges()))
                {{--            @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 2)->get()))--}}
                <li class="header">OPERATOR NAVIGATION</li>
                <li class="@yield('main.operator.new_hire')">
                    <a href="/neworder">
                        <i class="fa fa-plus"></i> <span>New Hire</span>
                    </a>
                </li>
            @endif
            <li class="header">COMMON NAVIGATION</li>
            <li class="treeview @yield('main.common.new_offer') @yield('main.common.view_offers')">
                <a>
                    <i class="fa fa-gift"></i> <span>Offers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('main.common.new_offer')">
                        <a href="/newoffer">
                            <i class="fa fa-plus"></i> <span>New Offer</span>
                        </a>
                    </li>
                    <li class="@yield('main.common.view_offers')">
                        <a href="/offerhistory">
                            <i class="fa fa-history"></i> <span>Offer History</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">ADMIN NAVIGATION</li>
            @if(in_array(5, Auth::user()->getPrivileges()))

                {{--            @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 5)->get()))--}}
                <li class="treeview @yield('main.admin.new_user') @yield('main.admin.view_accounts')">
                    <a>
                        <i class="fa fa-group"></i> <span>Accounts</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@yield('main.admin.new_user')"><a href="/accounts/new"><i class="fa fa-user"></i> New
                                Account</a></li>
                        <li class="@yield('main.admin.view_accounts')"><a href="/accounts/view"><i
                                        class="fa fa-list"></i>
                                View Accounts</a></li>
                    </ul>
                </li>
            @endif
            <li class="treeview @yield('main.admin.new_taxi') @yield('main.admin.view_taxis')">
                <a>
                    <i class="fa fa-taxi"></i> <span>Taxis</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(in_array(7, Auth::user()->getPrivileges()))
                        {{--                    @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 7)->get()))--}}
                        <li class="@yield('main.admin.new_taxi')"><a href="/taxis/new"><i class="fa fa-plus"></i> New
                                Taxi</a></li>
                    @endif
                    @if(in_array(8, Auth::user()->getPrivileges()))
                        {{--                        @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 8)->get()))--}}
                        <li class="@yield('main.admin.view_taxis')"><a href="/taxis/view"><i class="fa fa-list"></i>
                                View
                                Taxis</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

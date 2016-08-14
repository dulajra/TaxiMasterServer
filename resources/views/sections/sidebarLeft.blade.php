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
                <img src="/dist/img/avatar2.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->firstName }}</p>
                <a>{{ Auth::user()->userLevel->name }}</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('main.navigation.dash')">
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="@yield('main.navigation.on_going_orders')">
                <a href="/ongoing-orders">
                    <i class="fa fa-clock-o"></i> <span>Ongoing Orders</span>
                </a>
            </li>
            <li class="@yield('main.navigation.order_history')">
                <a href="/finished-orders">
                    <i class="fa fa-history"></i> <span>Orders History</span>
                </a>
            </li>
            <li class="header">OPERATOR NAVIGATION</li>
            <li class="@yield('main.operator.new_hire')">
                <a href="/neworder">
                    <i class="fa fa-plus"></i> <span>New Hire</span>
                </a>
            </li>
            <li class="header">ADMIN NAVIGATION</li>
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
                    <li class="@yield('main.admin.view_accounts')"><a href="/accounts/view"><i class="fa fa-list"></i>
                            View Accounts</a></li>
                </ul>
            </li>
            <li class="treeview @yield('main.admin.new_taxi') @yield('main.admin.view_taxis')">
                <a>
                    <i class="fa fa-taxi"></i> <span>Taxis</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('main.admin.new_taxi')"><a href="/taxis/new"><i class="fa fa-plus"></i> New
                            Taxi</a></li>
                    <li class="@yield('main.admin.view_taxis')"><a href="/taxis/view"><i class="fa fa-list"></i> View
                            Taxis</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

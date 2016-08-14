<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/13/16
 * Time: 12:43
 */
?>

        <!DOCTYPE html>
<html>
@include('sections.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>T</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>TAXI</b>Master</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ Auth::user()->image==null? '/dist/img/avatar.png' : Auth::user()->image}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->firstName . ' ' . Auth::user() ->lastName}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ Auth::user()->image==null? '/dist/img/avatar.png' : Auth::user()->image}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->firstName . ' ' . Auth::user() ->lastName}}
                                    <small>{{\Illuminate\Support\Facades\Auth::user()->userLevel->name}}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/accounts/view/{{ \Illuminate\Support\Facades\Auth::user()->id }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
@include('sections.sidebarLeft')
    <div class="content-wrapper">
    @section('content_header')
    @show

    @section('body_content')
    @show
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0 Beta
        </div>
        <strong>Copyright &copy; 2016 <a href="">TAXI MASTER</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

@include('sections.bottomHead')
</body>
</html>

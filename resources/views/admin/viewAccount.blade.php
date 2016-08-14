<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/14/16
 * Time: 09:32
 */
?>
@extends('layouts.commonLayout')
@section('main.admin.view_accounts','active')
@section('content_header')
    <section class="content-header">
        <h1>
            View Account
            <small>Details of the user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Accounts</li>
            <li class="active">View Accounts</li>
            <li class="active">{{$user->username}}</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <style>

        html, body {
            min-height: 100%;
        }

        #page-wrapper {
            min-height: 100%;
        }

    </style>
    <section class="content">
        <div class="box box-primary" style="width: 70%; left: 15%;">
            <div class="box-header with-border">
                <h3 class="box-title">Account Details</h3>
            </div>
            <form>
                <fieldset>

                    <!-- Text input-->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input id="username" name="username" type="text" placeholder="Username"
                                   class="form-control input-md" disabled value="{{$user->username}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="firstname">First name</label>
                            <input id="firstname" name="firstname" type="text" placeholder="First name"
                                   class="form-control input-md" disabled value="{{$user->firstName}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="lastname">Last name</label>
                            <input id="lastname" name="lastname" type="text" placeholder="Last name"
                                   class="form-control input-md" disabled value="{{$user->lastName}}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="phone">Mobile phone</label>
                            <input id="phone" name="phone" type="text" placeholder="Enter a mobile phone number"
                                   class="form-control input-md" disabled value="{{$user->phone}}">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="phone">Image</label>
                            <img class="img-responsive" style="display: block;margin: auto;" src="{{ $user->image or '/dist/img/avatar.png' }}" alt="">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="control-label" for="button1id"></label>
                            <a href="/accounts/edit/{{$user->id}}" class="btn btn-info" role="button">Edit</a>
                        </div>
                    </div>


                </fieldset>
            </form>
        </div>

    </section>
@endsection

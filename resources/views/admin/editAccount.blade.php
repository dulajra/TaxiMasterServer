<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/14/16
 * Time: 12:38
 */
?>
@extends('layouts.commonLayout')
@section('main.admin.view_accounts','active')
@section('content_header')
    <section class="content-header">
        <h1>
            Edit Account
            <small>Edit account</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Accounts</li>
            <li class="active">View Account</li>
            <li class="active">Edit Account</li>
            <li class="active">{{$user->username}}</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js   "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

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
            <form id="edit_account_form" action="/accounts/update/{{$user->username}}" method="POST">
                <fieldset>
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input id="username" name="username" type="text" placeholder="Username"
                                   class="form-control input-md" readonly='true' value="{{$user->username}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="firstname">First name</label>
                            <input id="firstname" name="firstName" type="text" placeholder="First name"
                                   class="form-control input-md" value="{{$user->firstName}}" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="lastname">Last name</label>
                            <input id="lastname" name="lastName" type="text" placeholder="Last name"
                                   class="form-control input-md" value="{{$user->lastName}}" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="phone">Mobile phone</label>
                            <input id="phone" name="phone" type="text" placeholder="Enter a mobile phone number"
                                   class="form-control input-md" value="{{$user->phone}}" required>
                        </div>
                    </div>
                    <!-- Text input-->


                    <!-- Button (Double) -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="control-label" for="button1id"></label>
                            <button id="button1id" name="button1id" class="btn btn-default" onclick="back()">Cancel
                            </button>
                            <button id="" class="btn btn-info" type="submit">Save</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>

        <script>

            $('#edit_account_form').validate();

            back = function () {
                parent.history.back();
                return false;
            }

        </script>
    </section>
@endsection

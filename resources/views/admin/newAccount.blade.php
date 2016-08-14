<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/13/16
 * Time: 22:50
 */
?>
@extends('layouts.commonLayout')
@section('main.admin.new_user','active')
@section('content_header')
    <section class="content-header">
        <h1>
            New Account
            <small>Add a new administrator, driver or an operator</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Accounts</li>
            <li class="active">New Account</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <section class="content">
        <div class="box box-primary" style="width: 70%; left: 15%;">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Details</h3>
            </div>
            <form role="form" id="new_account_form" action="/accounts/new" method="POST">
                <fieldset>
                    <div class="box-body">
                    {{csrf_field()}}

                    <!-- Select Basic -->
                        <div class="form-group">
                            <label class="control-label" for="userType">User type</label>
                            <select id="userType" name="userType" class="form-control" required>
                                <option value="">-- Select one --</option>
                                <option value="1" @if (old("userType") == "1") selected="selected" @endif>Admin</option>
                                <option value="2" @if (old("userType") == "2") selected="selected" @endif>Taxi Driver
                                </option>
                                <option value="3" @if (old("userType") == "3") selected="selected" @endif>Taxi
                                    Operator
                                </option>
                            </select>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input id="username" name="username" type="text" placeholder="Username"
                                   class="form-control input-md" required value="{{old('username')}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="firstname">First name</label>
                            <input id="firstname" name="firstName" type="text" placeholder="First name"
                                   class="form-control input-md" required value="{{old('firstName')}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="lastname">Last name</label>
                            <input id="lastname" name="lastName" type="text" placeholder="Last name"
                                   class="form-control input-md" required value="{{old('lastName')}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="phone">Mobile phone</label>
                            <input id="phone" name="phone" type="tel" placeholder="Enter a mobile phone number"
                                   class="form-control input-md" required value="{{old('phone')}}">
                        </div>

                        <!-- Text input-->
                        <div id="licenceNoDiv" class="form-group" style="display: none;">
                            <label class="control-label" for="licenceNo">Licence Number</label>
                            <input id="licenceNo" name="licenceNo" type="text"
                                   placeholder="Enter licence number of new driver"
                                   class="form-control input-md" required value="{{old('licenceNo')}}">
                        </div>

                        <!-- Select Basic -->
                        <div id="taxiIdDiv" class="form-group" style="display: none;">
                            <label class="control-label" for="taxiId">Taxi</label>
                            <select id="taxiId" name="taxiId" class="form-control">
                                <option value="">-- Select one --</option>
                                @foreach($taxis as $taxi)
                                    <option value={{$taxi->id}}>{{$taxi->registeredNo . ' - ' . $taxi->model}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input id="password" name="password" type="password"
                                   placeholder="Password should be 6 to 15 characters long"
                                   class="form-control input-md" minlength="6" maxlength="15" type="text">
                        </div>

                        <!-- Re password input-->
                        <div class="form-group">
                            <label class="control-label" for="repassword">Confirm Password</label>
                            <input id="rePassword" name="rePassword" type="password" placeholder="Confirm password"
                                   class="form-control input-md">
                        </div>

                        <div id="password_error" class="form-group" style="display: none;">
                            <label class="control-label" for=""></label>
                            <div id="password_error">
                                <p class="text-danger">Password mismatch.</p>
                            </div>
                        </div>


                        <!-- Error -->
                        <div class="form-group">
                            @if(count($errors))
                                <label class="control-label" for=""></label>
                                <div class="alert alert-danger alert-dismissable">
                                    <p>{{$errors->first()}}</p>
                                </div>
                            @endif
                        </div>

                        <!-- /.box-body -->

                    </div>
                    <div class="box-footer">
                        <button id="submit" name="" class="btn btn-primary">Register</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>



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

    <script>

        function validatePassword() {
            password = $('#password').val();
            rePassword = $('#rePassword').val();

            if (password == rePassword) {
                return true;
            }
            else {
                return false;
            }
        }

        $('#submit').on('click', function (e) {
            if (!validatePassword()) {
                $('#password_error').show();
                e.preventDefault();
            }
        });

        $('#new_account_form').validate({
            rules: {
                firstName: {lettersonly: true},
                lastName: {lettersonly: true},
                phone: {numbersonly: true}
            }
        })
        ;

        $('#userType').on('change', function () {
            userType = $('#userType').val();

            if (userType == 1) {
                $('#licenceNoDiv').hide();
                $('#taxiIdDiv').hide();
            }
            else if (userType == 2) {
                $('#licenceNoDiv').show();
                $('#taxiIdDiv').show();
            }
            else if (userType == 3) {
                $('#licenceNoDiv').hide();
                $('#taxiIdDiv').hide();
            }
        });

    </script>
@endsection

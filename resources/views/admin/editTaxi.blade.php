<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/14/16
 * Time: 17:32
 */
?>
@extends('layouts.commonLayout')
@section('main.admin.view_taxis','active')
@section('content_header')
    <section class="content-header">
        <h1>
            Edit Taxis
            <small>Edit taxi details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Taxis</li>
            <li class="active">View Taxis</li>
            <li class="active">Edit Taxi</li>
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
                <h3 class="box-title">Update Details</h3>
            </div>
            <form action="/taxis/update/{{$data['taxi']->id}}" method="POST">
                <fieldset>
                {{csrf_field()}}

                <!-- Text input-->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="taxiId">Registered Number</label>
                            <input id="taxiId" name="taxiId" type="text"
                                   class="form-control input-md" readonly='true' value="{{$data['taxi']->id}}">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="model">Model</label>
                            <input id="model" name="model" type="text" placeholder="Model"
                                   class="form-control input-md" value="{{$data['taxi']->model}}" required
                                   readonly='true'>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="noOfSetas">Number Of Seats</label>
                            <input id="noOfSetas" name="noOfSetas" type="text" placeholder="Number Of Seats"
                                   class="form-control input-md" value="{{$data['taxi']['noOfSeats']}}" required
                                   readonly='true'>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="control-label" for="driverName">Taxi Driver</label>
                            <select id="driverId" name="driverId" class="form-control" required>
                                <option value="0">-- Not Assigned --</option>
                                @foreach($data['driverList'] as $driver)
                                    <option value="{{$driver['driverId']}}">{{$driver['driverName']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="box-footer">
                        <!-- Button -->
                        <div class="form-group">
                            <label class="control-label" for=""></label>
                            <button id="submit" name="" class="btn btn-primary">Save</button>
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

                </fieldset>
            </form>
        </div>
    </section>

    <script>

        back = function () {
            parent.history.back();
            return false;
        }

    </script>
@endsection

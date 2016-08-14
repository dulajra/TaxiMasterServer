<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/14/16
 * Time: 15:57
 */
?>
@extends('layouts.commonLayout')
@section('main.admin.new_taxi','active')
@section('content_header')
    <section class="content-header">
        <h1>
            New Taxi
            <small>Add a new taxi to the system</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Taxis</li>
            <li class="active">New Taxi</li>
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
                <h3 class="box-title">Enter Details</h3>
            </div>
            <form id="new_taxi_form" action="/taxis/new" method="post">
                <fieldset>
                {{csrf_field()}}
                <!-- Select Basic -->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="taxitype">Taxi type</label>
                            <select id="taxiType" name="taxiType" class="form-control" required>
                                <option value="">-- Select one --</option>
                                @foreach($taxiTypes as $taxiType)
                                    <option value={{$taxiType->id}}>{{$taxiType->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="registeredNo">Registered Number</label>
                            <input id="registeredNo" name="registeredNo" type="text" placeholder="Registered Number"
                                   class="form-control input-md" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="model">Model</label>
                            <input id="model" name="model" type="text" placeholder="Vehicle model"
                                   class="form-control input-md" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="noOfSeats"> Number of seats</label>
                            <input id="noOfSeats" name="noOfSeats" type="number" placeholder=""
                                   class="form-control input-md" required min="1">
                        </div>
                    </div>


                    <!-- Button -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="control-label" for=""></label>
                            <button id="" name="" class="btn btn-primary">Add Taxi</button>
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

        $('#new_taxi_form').validate();

    </script>
@endsection


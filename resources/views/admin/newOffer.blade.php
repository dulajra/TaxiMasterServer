<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/17/16
 * Time: 05:25
 */
?>
@extends('layouts.commonLayout')
@section('main.common.new_offer','active')
@section('content_header')
    <section class="content-header">
        <h1>
            New Offer
            <small>Add a new offer</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Offers</li>
            <li class="active">New Offer</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <section class="content">
        <div class="box box-primary" style="width: 70%; left: 15%;">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Details</h3>
            </div>
            <form action="/newoffer" method="post">
                <fieldset>
                {{csrf_field()}}
                <!-- Select Basic -->
                    <div class="box-body">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="registeredNo">Offer Title</label>
                            <input id="title" name="title" type="text" placeholder="Offer Title"
                                   class="form-control input-md" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="model">Description</label>
                            <input id="description" name="description" type="text" placeholder="Offer description"
                                   class="form-control input-md" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="noOfSeats"> Offer Url</label>
                            <input id="url" name="url" type="text" placeholder="Url for an image (optional)"
                                   class="form-control input-md">
                        </div>
                    </div>


                    <!-- Button -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="control-label" for=""></label>
                            <button id="" name="" class="btn btn-primary">Add Offer</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </section>
@endsection

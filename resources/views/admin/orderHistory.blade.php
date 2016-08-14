<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/13/16
 * Time: 22:09
 */
?>
@extends('layouts.commonLayout')
@section('main.navigation.order_history','active')
@section('content_header')
    <section class="content-header">
        <h1>
            Order History
            <small>Finished orders and details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order History</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <link href="/css/jquery.datetimepicker.css" rel="stylesheet">
    <script src="/js/jquery.datetimepicker.full.min.js"></script>

    <style>

        html, body {
            min-height: 100%;
        }

        #page-wrapper {
            min-height: 100%;
        }

    </style>

    <section class="content">
        <div class="box">
            <div class="box-header">

                <div class="col-xs-4">
                    <div class="btn-group">
                        <button name="nano" id="nano" value="1" type="button"
                                class="btn btn-warning filter-orders-btn">Nano
                        </button>
                        <button name="car" id="car" value="1" type="button"
                                class="btn btn-success filter-orders-btn">Car
                        </button>
                        <button name="van" id="van" value="1" type="button"
                                class="btn btn-primary filter-orders-btn">Van
                        </button>
                    </div>
                </div>
                <div class="col-xs-8">
                    <form class="form-inline filter" role="form"
                          style="margin-left: 35px;  margin-bottom: 20px;">
                        <div class="form-group col-xs-4" style="margin-right: 75px;">
                            <label for="from">From: </label>
                            <input id="datetimepickerFrom" type="text" class="form-control" name="from">
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="to">To: </label>
                            <input id="datetimepickerTo" type="text" class="form-control" name="to">
                        </div>
                    </form>
                    <script>
                        jQuery('#datetimepickerFrom').datetimepicker({
                            todayButton: true,
                            defaultDate: new Date(),
                            onClose: function () {
                                filterData();
                            }
                        });
                        jQuery('#datetimepickerTo').datetimepicker({
                            todayButton: true,
                            defaultDate: new Date(),
                            onClose: function () {
                                filterData();
                            }
                        });
                    </script>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>At</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Taxi Driver</th>
                        <th>Taxi Model</th>
                        <th>Hire Fare</th>
                    </tr>
                    @foreach($orderList as $order)
                        <tr>
                            <td>{{$order->startTime}}</td>
                            <td>{{$order->origin}}</td>
                            <td>{{$order->destination}}</td>
                            <td>{{$order->driverName}}</td>
                            @if($order->taxiType==='nano')
                                <td><span class="label label-warning">Nano</span></td>
                            @elseif($order->taxiType==='car')
                                <td><span class="label label-success">Car</span></td>
                            @elseif($order->taxiType==='van')
                                <td><span class="label label-primary">Van</span></td>
                            @endif
                            <td>{{$order->fare}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

        <!-- Filter panel button clicks -->
        <!-- Driver state filter panel button clicks -->
        <script>
            $('.filter-orders-btn').click(function () {
                if (this.id === 'nano') {
                    $('#nano').toggleClass('btn-warning');
                }
                else if (this.id === 'car') {
                    $('#car').toggleClass('btn-success');
                }
                else if (this.id === 'van') {
                    $('#van').toggleClass('btn-primary');
                }

                if (this.value == 0) {
                    this.value = 1;
                }
                else {
                    this.value = 0;
                }

                filterData();

            });

        </script>

        <script>

            function filterData() {
                var nano = $("[name='nano']").val();
                var car = $("[name='car']").val();
                var van = $("[name='van']").val();
                var from = $("[name='from']").val();
                var to = $("[name='to']").val();

                var url = "/finished-orders";

                if (from.length == 0 && to.length == 0) {
                    window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van;
                }
                else if (to.length == 0) {
                    window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van + "&from=" + from;
                }
                else if (from.length == 0) {
                    window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van + "&to=" + to;
                }
                else {
                    window.location.href = url + "?nano=" + nano + "&car=" + car + "&van=" + van + "&from=" + from + "&to=" + to;
                }

            }

            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                        results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            $(document).ready(function () {
                var nano = getParameterByName('nano');
                var car = getParameterByName('car');
                var van = getParameterByName('van');
                var from = getParameterByName('from');
                var to = getParameterByName('to');

                $('#datetimepickerFrom').val(from);
                $('#datetimepickerTo').val(to);

                if (from == null) {
                    $('#datetimepickerFrom').val('1 Week before');
                }
                else {
                    $('#datetimepickerFrom').val(from);
                }

                if (to == null) {
                    $('#datetimepickerTo').val('Today');
                }
                else {
                    $('#datetimepickerTo').val(to);
                }

                if (nano == 0) {
                    $('#nano').toggleClass('btn-warning');
                    $('#nano').val(nano);
                }
                if (car == 0) {
                    $('#car').toggleClass('btn-success');
                    $('#car').val(car);
                }
                if (van == 0) {
                    $('#van').toggleClass('btn-primary');
                    $('#van').val(van);
                }

            });

        </script>
    </section>
@endsection

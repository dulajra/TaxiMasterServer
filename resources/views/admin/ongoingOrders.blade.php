<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/13/16
 * Time: 21:18
 */
?>
@extends('layouts.commonLayout')
@section('main.navigation.on_going_orders','active')
@section('content_header')
    <section class="content-header">
        <h1>
            Ongoing Orders
            <small>Orders and statuses</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ongoing Orders</li>
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
                        <button name="now" id="now" value="1" type="button"
                                class="btn btn-success filter-orders-btn">Now
                        </button>
                        <button name="pending" id="pending" value="1" type="button"
                                class="btn btn-primary filter-orders-btn">Pending
                        </button>
                        <button name="accepted" id="accepted" value="1" type="button"
                                class="btn btn-warning filter-orders-btn">Accepted
                        </button>
                        <button name="rejected" id="rejected" value="1" type="button"
                                class="btn btn-danger filter-orders-btn">rejected
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
                        <th>Contact</th>
                        <th>Taxi Driver</th>
                        <th>Status</th>
                    </tr>
                    @foreach($orderList as $order)
                        <tr>
                            <td>{{$order->time}}</td>
                            <td>{{$order->origin}}</td>
                            <td>{{$order->destination}}</td>
                            <td>{{$order->contact}}</td>
                            <td>{{$order->driverName}}</td>
                            @if($order->state==='NOW')
                                <td>
                                    <span class="label label-success">Now</span>
                                </td>
                            @elseif($order->state==='PENDING')
                                <td>
                                    <span class="label label-primary">Pending</span>
                                </td>
                            @elseif($order->state==='ACCEPTED')
                                <td>
                                    <span class="label label-warning">Accepted</span>
                                </td>
                            @elseif($order->state==='REJECTED')
                                <td>
                                    <span class="label label-danger">Rejected</span>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
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
    </section>


    <!-- Filter panel button clicks -->
    <!-- Driver state filter panel button clicks -->
    <script>
        $('.filter-orders-btn').click(function () {
            if (this.id === 'now') {
                $('#now').toggleClass('btn-success');
            }
            else if (this.id === 'pending') {
                $('#pending').toggleClass('btn-primary');
            }
            else if (this.id === 'accepted') {
                $('#accepted').toggleClass('btn-warning');
            }
            else if (this.id === 'rejected') {
                $('#rejected').toggleClass('btn-danger');
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

        $('td').click(function () {
            var row = $(this).parent().parent().children().index($(this).parent());

        });

    </script>

    <script>

        function filterData() {
            var now = $("[name='now']").val();
            var pending = $("[name='pending']").val();
            var accepted = $("[name='accepted']").val();
            var rejected = $("[name='rejected']").val();
            var from = $("[name='from']").val();
            var to = $("[name='to']").val();

            var url = "/ongoing-orders";

            if (from.length == 0 && to.length == 0) {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected;
            }
            else if (to.length == 0) {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected + "&from=" + from;
            }
            else if (from.length == 0) {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected + "&to=" + to;
            }
            else {
                window.location.href = url + "?now=" + now + "&pending=" + pending + "&accepted=" + accepted + "&rejected=" + rejected + "&from=" + from + "&to=" + to;
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
            var now = getParameterByName('now');
            var pending = getParameterByName('pending');
            var accepted = getParameterByName('accepted');
            var rejected = getParameterByName('rejected');
            var from = getParameterByName('from');
            var to = getParameterByName('to');

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

            if (now == 0) {
                $('#now').toggleClass('btn-success');
                $('#now').val(now);
            }
            if (pending == 0) {
                $('#pending').toggleClass('btn-primary');
                $('#pending').val(pending);
            }
            if (accepted == 0) {
                $('#accepted').toggleClass('btn-warning');
                $('#accepted').val(accepted);
            }
            if (rejected == 0) {
                $('#rejected').toggleClass('btn-danger');
                $('#rejected').val(rejected);
            }

        });

    </script>
@endsection
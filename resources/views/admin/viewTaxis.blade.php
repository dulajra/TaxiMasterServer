<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/14/16
 * Time: 16:13
 */
?>
@extends('layouts.commonLayout')
@section('main.admin.view_taxis','active')
@section('content_header')
    <section class="content-header">
        <h1>
            View Taxis
            <small>View registered taxis of the system</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Taxis</li>
            <li class="active">View Taxis</li>
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
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Registered Number</th>
                        <th>Model</th>
                        <th>Number Of Seats</th>
                        <th>TaxiDriver</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    @foreach($taxiList as $taxi)
                        <tr>
                            <td>{{$taxi->registeredNo}}</td>
                            <td>{{$taxi->model}}</td>
                            <td>{{$taxi->noOfSeats}}</td>
                            <td>{{$taxi->driverName}} <a href="/taxis/edit/{{$taxi->id}}"
                                                         class="btn btn-primary pull-right btn-sm">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
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
                $('#van').toggleClass('btn-info');
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
                $('#van').toggleClass('btn-info');
                $('#van').val(van);
            }

        });

    </script>
@endsection

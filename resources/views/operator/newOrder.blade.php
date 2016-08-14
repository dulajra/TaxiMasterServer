<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/14/16
 * Time: 18:02
 */
?>
@extends('layouts.commonLayout')
@section('main.operator.new_hire','active')
@section('content_header')
    <section class="content-header">
        <h1>
            New Hire
            <small>Place a new hire order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">New Hire</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js   "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

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
        <div class="box box-primary" style="width: 70%; left: 15%;">
            <div class="box-header with-border">
                <h3 class="box-title">Hire Details</h3>
            </div>
            <form id="new_order_form" method="get">
                <fieldset>
                    {{csrf_field()}}
                    <div class="box-body">
                        <input style="display: none;" name="originLatitude" id="fromLat">
                        <input style="display: none;" name="originLongitude" id="fromLng">
                        <input style="display: none;" name="destinationLatitude" id="toLat">
                        <input style="display: none;" name="destinationLongitude" id="toLng">

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="control-label" for="taxiDriver">Taxi Driver</label>
                            <select id="taxiDriver" name="driverId" class="form-control" required>
                                <option value="">-- Select one --</option>
                                @foreach($data['idNameList'] as $driver)
                                    <option label="nano" value="{{$driver['id']}}">{{$driver['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="from">From</label>
                            <input id="from" name="origin" type="text" placeholder="Starting location"
                                   class="form-control input-md controls" required>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="to">To</label>
                            <input id="to" name="destination" type="text" placeholder="End location"
                                   class="form-control input-md controls" required>
                        </div>

                        <!-- Time picker-->
                        <div class="form-group">
                            <label class="control-label" for="time">Pick up time</label>
                            <input id="datetimepicker" type="text" class="form-control" name="time" required
                                   placeholder="Time to pick up">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="phone">Contact</label>
                            <input id="phone" name="contact" type="text" placeholder="Mobile phone number"
                                   class="form-control input-md" required>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="control-label" for="note">Note</label>
                            <textarea id="note" name="note" type="text" placeholder="Enter a note here (optional)"
                                      class="form-control input-md" type="text"></textarea>
                        </div>
                    </div>


                    <div class="box-footer">
                        <!-- Button -->
                        <div class="form-group">
                            <label class="control-label" for=""></label>
                            <button id="submit" type="button" name="" class="btn btn-primary">Place Order
                            </button>
                            <img id="stateImage" src="/img/loading.gif" height="35" width="35"
                                 style="margin-left: 25px; display: none;"/>
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

            <script>
                jQuery('#datetimepicker').datetimepicker({
                    todayButton: true,
                    defaultDate: new Date(),
                    format: 'Y-m-d H:i',
                    minDate: 0,
                    minTime: 0,
                });

            </script>

        </div>
        </div>

        </div>
    </section>

    <!-- On submit handler -->
    <script>
        $('#new_order_form').validate();

        $('#submit').click(function () {
            if ($('#new_order_form').valid()) {
                var origin = $("[name='origin']").val();
                var destination = $("[name='destination']").val();
                var originLatitude = $("[name='originLatitude']").val();
                var originLongitude = $("[name='originLongitude']").val();
                var destinationLatitude = $("[name='destinationLatitude']").val();
                var destinationLongitude = $("[name='destinationLongitude']").val();
                var time = $("[name='time']").val();
                var note = $("[name='note']").val();
                var contact = $("[name='contact']").val();
                var driverId = $("[name='driverId']").val();

                var url = "/taxioperator/order/new?&originLatitude=" + originLatitude + "&originLongitude=" + originLongitude + "&destinationLatitude=" + destinationLatitude + "&destinationLongitude=" + destinationLongitude + "&driverId=" + driverId + "&origin=" + origin + "&destination=" + destination + "&time=" + time + "&contact=" + contact + "&note=" + note;

                $.get(url, function (data) {
                    $('#stateImage').show();
                    var refreshUrl = "http://taximaster.herokuapp.com/taxioperator/order/state?id=" + data['id'];

                    var interval = setInterval(function () {
                        $.get(refreshUrl, function (data) {
                            if (data['state'] == "ACCEPTED") {
                                $('#stateImage').attr("src", "/img/right.png");
                                setTimeout(function () {
                                    window.location.href = "/ongoing-orders";
                                }, 1000);
                                clearInterval(interval);
                            }
                            else if (data['state'] == "REJECTED") {
                                $('#stateImage').attr("src", "/img/false.png");
                                clearInterval(interval);
                            }
                        })
                    }, 1000);
                });
            }
        });


    </script>


    <!-- Functions related to google auto complete location -->
    <script>

        function initMap() {
            var inputFrom = /** @type {!HTMLInputElement} */(
                    document.getElementById('from'));
            var inputTo = /** @type {!HTMLInputElement} */(
                    document.getElementById('to'));

            var autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
            var autocompleteTo = new google.maps.places.Autocomplete(inputTo);

            autocompleteFrom.addListener('place_changed', function () {
                var place = autocompleteFrom.getPlace();
                if (!place.geometry) {
                    alert("Location details are not available");
                    inputFrom.value = "";
                    return;
                }

                $('#fromLat').val(place.geometry.location.lat());
                $('#fromLng').val(place.geometry.location.lng());

            });

            autocompleteTo.addListener('place_changed', function () {
                var place = autocompleteTo.getPlace();
                if (!place.geometry) {
                    alert("Location details are not available");
                    inputTo.value = "";
                    return;
                }

                $('#toLat').val(place.geometry.location.lat());
                $('#toLng').val(place.geometry.location.lng());

            });

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ6jBZMZJLShZ4mA_wFvG2Lnl4dvKKfk8&libraries=places&callback=initMap"
            async defer></script>
@endsection

<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 9/3/16
 * Time: 00:31
 */
?>
@extends('layouts.commonLayout')
@section('main.navigation.reviews','active')
@section('content_header')
    <section class="content-header">
        <h1>
            Reviews
            <small>Overall reviews</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reviews</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Stars</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    @foreach($reviews as $review)
                        <tr>
                            <td><img src="{{ $review->image or '' }}" alt="" height="64px" width="64px"></td>
                            <td style="vertical-align: middle;">{{ $review->username }}</td>
                            <td style="vertical-align: middle;">{{ $review->firstName }} {{ $review->lastName }}</td>
                            <td style="vertical-align: middle;">{{ $review->rating }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection


<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 8/17/16
 * Time: 05:43
 */
?>
@extends('layouts.commonLayout')
@section('main.common.view_offers','active')
@section('content_header')
    <section class="content-header">
        <h1>
            View Offers
            <small>View offers</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Offers</li>
            <li class="active">View Offers</li>
        </ol>
    </section>
@endsection
@section('body_content')
    <section class="content">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Url (Optional)</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    @foreach($offers as $offer)
                        <tr>
                            <td>{{$offer->title}}</td>
                            <td>{{$offer->description}}</td>
                            @if(!empty($offer->url))
                                <td><a href="{{$offer->url or ''}}">click to view</a></td>
                            @else
                                <td><a href="javascript:void(0)">No url</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection
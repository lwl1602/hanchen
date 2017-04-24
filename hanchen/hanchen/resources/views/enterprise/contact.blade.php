@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
@stop

@section('content')
<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/about_01.jpg') }}"></p>
    <ul class="ul_border">
        <li><a href="{{ url('enterprise/company') }}">公司简介</a></li>
        <li><a href="{{ url('enterprise/about') }}">团队简介</a></li>
        <li><a href="{{ url('enterprise/contact') }}" class="section">联系我们</a></li>
   </ul>
   <div class="cont">
        <div class="con_left">
            <ul>
               <li><span class="sp_1">联系我们</span><span class="sp_2">Contact us</span></li>
               <li>公司名称：{{ $contact->contact_name }}</li>
               <li>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：{{ $contact->contact_site }}</li>
               <li>邮政编码：{{ $contact->contact_postcode }}</li>
               <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：{{ $contact->contact_phone }}</li>
               <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真：{{ $contact->contact_faxes }}</li>
               <li>电子信箱：{{ $contact->contact_email }}</li>
               <li>网&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：{{ $contact->contact_url }}</li>
            </ul>
        </div>
        <div class="con_right"><img src="{{ asset($contact->contact_imgurl) }}"></div>
   </div>
</div>

@include('layouts.link')
@stop
@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
@stop

@section('content')
<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/about_01.jpg') }}"></p>
   <ul class="ul_border">
        <li><a href="{{ url('enterprise/company') }}">公司简介</a></li>
        <li><a href="{{ url('enterprise/about') }}" class="section">团队简介</a></li>
        <li><a href="{{ url('enterprise/contact') }}">联系我们</a></li>
   </ul>
   <ul class="ul_img">
       @foreach($teams as $tp)
       <li><a href="{{ url('enterprise/about/'.$tp->tp_id) }}"><img src="{{ asset($tp->tp_url) }}"> <span>{{ $tp->tp_name }}</span></a></li>
       @endforeach
   </ul>
</div>
@include('layouts.link')
@stop
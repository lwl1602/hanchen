@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
@stop

@section('content')
<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/about_01.jpg') }}"></p>
     <ul class="ul_border">
         <li><a href="{{ url('enterprise/company') }}" class="section">公司简介</a></li>
         <li><a href="{{ url('enterprise/about') }}" >团队简介</a></li>
         <li><a href="{{ url('enterprise/contact') }}" >联系我们</a></li>
   </ul>
   </p>
   <p class="pp_img"><img src="{{ asset($company->cp_url) }}"></p>
   <p class="go_img"> 公司简介:</p>
       {!! $company->cp_html !!}
</div>
@include('layouts.link')
@stop
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
   <div class="about">
        <div class="ab_left">
            <dl>
                <dt><img src="{{ asset($tp->tp_url) }}"></dt>
                <dd> 
                   <p class="liu">{{ $tp->tp_name }}</p>
                   <p class="hr-line"></p>
                   <p class="bu">{{ $tp->tp_profession }}</p>
                </dd>
            </dl>
        </div>
        <div class="ab_right">
            <p><span class="sp_1">教育背景：</span><span>{{ $tp->tp_education }} </span></p>
            <p><span class="sp_1">工作经历：</span><span>{{ $tp->tp_workexperience }}</span></p>
            <p><span class="sp_1">业务范围：</span><span>{{ $tp->tp_scope }}</span></p>
            <p><span class="sp_1">执业范围：</span><span>{{ $tp->tp_jobs }}</span></p>
            <p><span class="sp_1">行业兼职：</span><span>{{ $tp->tp_parttime }}</span></p>
            <p><span class="sp_1">联系方式：</span></p>
           <ul class="ab_1">
               <li>{{ $tp->tp_site }}</li>
               <li>邮编:{{ $tp->tp_postcode }}</li>
          </ul>
          <ul class="ab_2">
               <li>电话:{{ $tp->tp_phone }}</li>
               <li>传真:{{ $tp->tp_faxes }}</li>
           </ul>
        </div>
   </div>
</div>
@include('layouts.link')
@stop
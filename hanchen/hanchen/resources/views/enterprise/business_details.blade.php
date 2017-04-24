@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
@stop
@section('content')
<div class="center">
    <p class="gu_img"><img src="{{ asset('style/enterprise/images/busin_01.jpg') }}"></p>
   <p class="wang">{{ $bus->bus_title }}</p>
   <p class="ne_p">
       {!! $bus->bus_html !!}
   </p>
</div>
@include('layouts.link')
@stop
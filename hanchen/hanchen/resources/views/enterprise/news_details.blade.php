@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
@stop

@section('content')
<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/news_01.jpg') }}"></p>
   <p class="new_shang">{{ $news->news_title }}</p>
   <div class="re_box">
      @if($num <10)
         @if($i < 10)
            <div class="date-num">0{{ $i }}0{{ $num }}</div>
            @else
            <div class="date-num">{{ $i }}0{{ $num }}</div>
            @endif
      @else
         @if($i < 10)
            <div class="date-num">0{{ $i }}{{ $num }}</div>
         @else
            <div class="date-num">{{ $i }}{{ $num }}</div>
         @endif
         @endif
      <div class="date-li"></div>
   </div>
   <div class="ne_p">
      {!! $news->news_content !!}
   </div>
   </div>
    @include('layouts.link')
@stop
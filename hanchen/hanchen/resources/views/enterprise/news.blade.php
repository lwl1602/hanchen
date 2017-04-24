@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
    @stop

@section('content')

<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/news_01.jpg') }}"></p>
    <ul class="ul_news">
        @for($i = 0;$i < count($newses);$i++)
        <li>
            <a href="{{ url('enterprise/news/'.$newses[$i]->news_id.'/count/'.($i+1)) }}">
               <div class="ne_top">
                    <div class="ne_left">
                        @if($num <10)
                            @if($i < 10)
                                <div class="date-num">0{{ $i+1 }}0{{ $num }}</div>
                            @else
                                <div class="date-num">{{ $i+1 }}0{{ $num }}</div>
                            @endif
                        @else
                            @if($i < 10)
                                <div class="date-num">0{{ $i+1 }}{{ $num }}</div>
                            @else
                                <div class="date-num">{{ $i+1 }}{{ $num }}</div>
                            @endif
                        @endif
                        <div class="date-lind"></div>
                    </div>
                    <div class="ne_right">{{ $newses[$i]->news_title }}</div>
               </div>
               <div class="p_to le">
                   {!! mb_substr($newses[$i]->news_text,0,150,'utf-8') !!}...
               </div>
            </a>
        </li>
        @endfor
   </ul>
    <div class="ul_render">
    {!! $newses->render(new \App\Http\Controllers\Common\IndexPresenter($newses)) !!}
    </div>
</div>

    @include('layouts.link')
@stop
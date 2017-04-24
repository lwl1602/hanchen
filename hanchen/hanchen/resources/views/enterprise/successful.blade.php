@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
    @stop

@section('content')
<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/succ_01.jpg') }}"></p>
    <div class="succ_dl">
        @foreach($scs as $sc)
        <dl>
            <dt><a href="{{ url('enterprise/successful/'.$sc->sc_id) }}"><img src="{{ asset($sc->sc_url) }}"></a></dt>
            <dd class="dd_1">{{ $sc->sc_title }}</dd>
            <dd class="dd_2">{{ $sc['BusinessCategory']->bc_name }}</dd>
            <dd class="dd_3">
                {!! mb_substr($sc->sc_text,0,100,'utf-8') !!}...
            </dd>
        </dl>
        @endforeach
    </div>
    {!! $scs->render(new \App\Http\Controllers\Common\IndexPresenter($scs)) !!}
</div>
    @include('layouts.link')
@stop
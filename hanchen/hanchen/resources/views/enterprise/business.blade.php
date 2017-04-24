@extends('layouts.index')

@section('banner')
    <div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
@stop

@section('content')
<div class="center">
   <p class="gu_img"><img src="{{ asset('style/enterprise/images/busin_01.jpg') }}"></p>
   <ul class="busin_top" id="ul">
       @foreach($bcs as $k=>$bc)
           @if($k == 0)
               <li onclick="change(this);"><a href="javascript:void(0);" class="section">{{ $bc->bc_name }}</a></li>
           @else
               <li onclick="change(this);"><a href="javascript:void(0);">{{ $bc->bc_name }}</a></li>
           @endif
       @endforeach
   </ul>
    <div class="div_ul">
        @foreach($bcs as $k=>$bc)
            @if($k == 0)
                <ul class="busin_bot">
            @else
                <ul class="busin_hide">
            @endif
            @foreach($buses as $bus)
                    @if($bc->bc_id == $bus->bc_id)
                        <li><a href="{{ url('enterprise/business/'.$bus->bus_id) }}"><img src="{{ asset($bus->bus_url) }}"></a></li>
                    @endif
            @endforeach
            </ul>
        @endforeach
    </div>
</div>
<script type="text/javascript" src="{{ url('style/enterprise/js/jquery-2.1.1.min.js') }}"></script>
<script type="text/javascript">
   // tab标签选项卡切换j
 $(function(){
        $(".busin_top li").click(function(){
            $(this).addClass("section").siblings().removeClass("section");
            $(".div_ul ul").eq($(".busin_top li").index(this)).show().siblings().hide();
        });        
    });
function change(obj){
var arr = document.getElementById("ul").getElementsByTagName("li");
for (var i = 0; i < arr.length; i++) {
var a = arr[i];
a.style.background = "url({{ url('style/enterprise/images/border_01.jpg') }})";
};
obj.style.background = "url({{ url('style/enterprise/images/border_02.jpg') }})";
}
</script>
@include('layouts.link')
@stop
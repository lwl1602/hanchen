@extends('layouts.index')


@section('banner')
	<div class="ban"><img src="{{ asset($picture->img_path) }}"></div>
	@stop

@section('content')
<div class="contact">
    <div class="ye_tu"><img src="{{ asset('style/enterprise/images/index_03.jpg') }}"></div>
    <div class="ul_1">
		@for($i = 0;$i < 3;$i++)
	    <dl>
	       <dt>
           	<img src="{{ asset($bcs[$i]->bc_unclick) }}" class="default">
            <img src="{{ asset($bcs[$i]->bc_click) }}" class="hover">
           </dt>
	       <dd class="section">{{ $bcs[$i]->bc_name }}</dd>
	       <dd class="section">{{ $bcs[$i]->bc_enname }}</dd>
	    </dl>
		@endfor
    </div>
     <div class="ul_2">
		 @for(;$i < 7;$i++)
			 <dl>
				 <dt>
					 <img src="{{ asset($bcs[$i]->bc_unclick) }}" class="default">
					 <img src="{{ asset($bcs[$i]->bc_click) }}" class="hover">
				 </dt>
				 <dd class="section">{{ $bcs[$i]->bc_name }}</dd>
				 <dd class="section">{{ $bcs[$i]->bc_enname }}</dd>
			 </dl>
		 @endfor
    </div>
</div>
<div class="company">
    <div class="com">
	   <div class="com_left">
	      <h3>公司简介<span class="h3_sp">COMPANY PROFILE</span></h3>
	      <dl>
	          <dt><img src="{{ asset('upload/47633index_02.jpg') }}"></dt>
	          <dd class="dl_1">
				  {{mb_substr( $cp->cp_text, 0, 200, 'utf-8' )}}
			  </dd>
	          <dd class="dl_2"><a href="{{ url('enterprise/company') }}">MORE+</a></dd>
	      </dl>
	   </div>
	   <div class="com_right">
	       <h3>新闻中心<span class="h3_sp">NEWS CENTER</span><a href="{{ url('enterprise/news') }}"><span class="h3_sp1">MORE<img src="{{ asset('style/enterprise/images/dayu.jpg') }}"></span></a></h3>
	       <ul class="co_ul">
			   @foreach($newses as $k=>$new)
                <li>
                   <a href="{{ url('enterprise/news/'.$new->news_id.'/count/'.($k+1)) }}">
                      <p>TIME：{{ $new->news_time }}</p>
                      <p><img src="{{ asset('style/enterprise/images/jiantou.jpg') }}">{{ $new->news_title }}</p>
				   </a>
                </li>
			   @endforeach
	       </ul>
	   </div>
    </div>
</div>
@include('layouts.link')
<script type="text/javascript" src="{{ asset('style/enterprise/js/jquery-2.1.1.min.js') }}"></script>
<script type="text/javascript">
$(function(){
	$(".contact dl").mouseover(function(){
		$(this).find(".default").hide();
		$(this).find(".hover").show();
		$(this).css("color","#004389");
		}).mouseout(function(){
			$(this).find(".hover").hide();
			$(this).find(".default").show();
			$(this).css("color","#333");
			})
})
</script>
@stop

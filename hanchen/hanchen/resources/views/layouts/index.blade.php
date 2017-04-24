<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta http-equiv="Page-Enter" content="revealTrans(Duration=0.5,Transition=4)">
    <meta http-equiv="Page-Exit" content="revealTrans(Duration=5,Transition=9)">
    <link rel="stylesheet" href="{{ asset('style/enterprise/css/style.css') }}" type="text/css">
</head>
<body>
<div class="banner">
    @yield('banner')
    <div class="b_box">
        <ul class="b_ul">
            <li><a href="{{ url('enterprise/index') }}"><span class="s_left sp_a">首页</span><span class="sp_left">|</span></a></li>
            <li><a href="{{ url('enterprise/about') }}"><span class="sp_2">关于我们</span><span class="sp_1">|</span></a></li>
            <li><a href="{{ url('enterprise/news') }}"><span class="sp_2">新闻中心</span><span class="sp_1">|</span></a></li>
            <li><a href="{{ url('enterprise/business') }}"><span class="sp_2">业务领域</span><span class="sp_1">|</span></a></li>
            <li><a href="{{ url('enterprise/laws') }}"><span class="sp_2">相关法规</span><span class="sp_1">|</span></a></li>
            <li><a href="{{ url('enterprise/successful') }}"><span class="sp_2">成功案例</span><span class="sp_1">|</span></a></li>
        </ul>
    </div>
</div><!-- banner -->
@yield('content')
<script type="text/javascript" src="{{ asset('style/enterprise/js/jquery-2.1.1.min.js') }}"></script>
</body>
</html>
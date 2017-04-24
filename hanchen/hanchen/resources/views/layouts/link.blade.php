<div class="footer">
    <p class="foot_p">
        <span class="sp_1">友情链接:</span>
        @foreach($links as $link)
            <span class="sp_1"><a href="http://{{$link->link_url}}">{{ $link->link_name }}</a></span>
        @endforeach
    </p>
    <dl>
        <dt><img src="{{ asset('style/enterprise/images/index_04.jpg') }}"></dt>
        <dd class="dd_1">上海普盛律师事务所 邓白氏注册©电子档案</dd>
        <dd class="dd_2">网站建设：网熙信息<span>©2009-2011 上海普盛律师事务所版权所有</span> </dd>
    </dl>
</div>
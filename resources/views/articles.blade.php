@include("meta")

<body class="output fluid zh cn win reader-day-mode reader-font2" data-js-module="recommendation" data-locale="zh-CN">
    @include("navbar")

    <div class="row-fluid">

        <div class="recommended">

            <div class="span12">
                @include("topbar")
                <div id="list-container">

                    <!-- <ul class="unstyled clearfix sort-nav" id="collection-categories-nav" data-js-module="collection-category" data-fetch-url="/recommendations/notes">
                        <li class="active">
                            <a class="category" data-dimension="now" href="javascript:void(null);">热门</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="56" href="javascript:void(null);">新上榜</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="60" href="javascript:void(null);">日报</a>
                        </li>
                        <li>
                            <a class="category" data-dimension="weekly" href="javascript:void(null);">七日热门</a>
                        </li>
                        <li>
                            <a class="category" data-dimension="monthly" href="javascript:void(null);">三十日热门</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="61" href="javascript:void(null);">有奖活动</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="62" href="javascript:void(null);">简书出版</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="63" href="javascript:void(null);">简书播客</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="64" href="javascript:void(null);">时事热闻</a>
                        </li>
                        <li>
                            <a class="category" data-category-id="65" href="javascript:void(null);">专题精选</a>
                        </li>
                        <li>
                            <img class="hide loader-tiny" src="/res/tiny.gif" alt="Tiny"></li>
                    </ul> -->

                    <ul class="article-list thumbnails">
                        
                        @foreach ($articles as $article)
                            <li class="have-img">
                                <a class="wrap-img" href="/article/{{ $article->id }}">
                                    <img src="/res/default.png" alt="{{ $article->id }}"></a>
                                <div>
                                    <p class="list-top">
                                        <a class="author-name blue-link" target="_blank" href="javascript:void(0)">
                                            @if ($article->column == 'drops')
                                                管理员
                                            @else
                                                {{ $article->author }}
                                            @endif
                                        </a> <em>·</em>
                                        <span class="time" data-shared-at="{{ $article->created_at }}">{{ $article->created_at }}</span>
                                    </p>
                                    <h4 class="title">
                                        <a target="_blank" href="/article/{{ $article->id }}">{{ $article->title }}</a>
                                    </h4>
                                    <div class="list-footer">
                                        <a target="_blank" href="/article/{{ $article->id }}">阅读 {{ $article->view }}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                    <!-- div class="load-more">
                        <button class="ladda-button " data-style="slide-left" data-type="script" data-remote="" data-size="medium" data-url="/top/daily?note_ids%5B%5D=5529382&amp;note_ids%5B%5D=5439417&amp;note_ids%5B%5D=5520646&amp;note_ids%5B%5D=5517872&amp;note_ids%5B%5D=5526423&amp;note_ids%5B%5D=5527566&amp;note_ids%5B%5D=5497143&amp;note_ids%5B%5D=5529213&amp;note_ids%5B%5D=5481659&amp;note_ids%5B%5D=5529144&amp;note_ids%5B%5D=5476405&amp;note_ids%5B%5D=5522785&amp;note_ids%5B%5D=5510914&amp;note_ids%5B%5D=5526745&amp;note_ids%5B%5D=5517989&amp;note_ids%5B%5D=5526649&amp;note_ids%5B%5D=5529400&amp;note_ids%5B%5D=5524109&amp;note_ids%5B%5D=5513248&amp;note_ids%5B%5D=5514524&amp;page=2" data-color="maleskine" data-method="get">
                            <span class="ladda-label">点击查看更多</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div> -->

                </div>
            </div>
        </div>

        <div id="time-machine-modal" class="modal hide fade share-weixin-modal time-machine-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-stats2015-url="http://www.jianshu.com/stats2015">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
        </div>

    </div>
    @include('footer')

    <!-- Javascripts
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/res/base.js"></script>
    <script src="/res/reading-base.js"></script>
    <script src="/res/home.js"></script>

    <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35169517-1']);
  _gaq.push(['_setCustomVar', 2, 'User Type', 'Visitor', 1 ]);
  _gaq.push(['_trackPageview']);

  

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

    <div style="display:none">
        <a href="https://s11.cnzz.com/z_stat.php?id=1260252451&web_id=1260252451" target="_blank" title="站长统计">站长统计</a>
    </div>

</body>
</html>
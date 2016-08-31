@include("meta")

<body class="output fluid zh cn win reader-day-mode reader-font2" data-js-module="recommendation" data-locale="zh-CN">
    @include("navbar")

    <div class="row-fluid">

        <div class="recommended">

            <div class="span12">
                @include("topbar")
                <div id="list-container">
                    <ul class="article-list thumbnails">
                        <div style="text-align: center;margin: 25px 0;">
                            <h1>{{ $article->title }}</h1>
                        </div>
                        {!! $article->content !!}
                    </ul>

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
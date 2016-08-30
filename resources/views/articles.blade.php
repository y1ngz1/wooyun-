<!DOCTYPE html>
<!-- saved from url=(0023)http://www.jianshu.com/ -->
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
    <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <script type="text/javascript" src="/res/1255494d3a"></script>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta property="wb:webmaster" content="294ec9de89e7fadb">
    <meta property="qc:admins" content="104102651453316562112116375">
    <meta property="qc:admins" content="11635613706305617">
    <meta property="qc:admins" content="1163561616621163056375">
    <meta name="google-site-verification" content="cV4-qkUJZR6gmFeajx_UyPe47GW9vY6cnCrYtCHYNh4">
    <meta name="google-site-verification" content="HF7lfF8YEGs1qtCE-kPml8Z469e2RHhGajy6JPVy5XI">

    <title>乌云文章整理</title>
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" media="all" href="/res/base.css">
    <link rel="stylesheet" media="all" href="/res/reading.css">
    <link rel="stylesheet" media="all" href="/res/base-read-mode.css">
    <script src="/res/modernizr.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if IE 8]>
    <link rel="stylesheet" media="all" href="http://cdn-qn0.jianshu.io/assets/scaffolding/for_ie-7f1c477ffedc13c11315103e8787dc6c.css" />
    <![endif]-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" media="all" href="http://cdn-qn0.jianshu.io/assets/scaffolding/for_ie-7f1c477ffedc13c11315103e8787dc6c.css" />
    <![endif]-->
    <link href="http://baijii-common.b0.upaiyun.com/icons/favicon.ico" rel="icon">
    <link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/57-b426758a1fcfb30486f20fd073c3b8ec.png" sizes="57x57">
    <link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/72-feca4b183b9d29fd188665785dc7a7f1.png" sizes="72x72">
    <link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/76-ba757f1ad3421192ce7192170393d2b0.png" sizes="76x76">
    <link rel="apple-touch-icon-precomposed" href="/res/114-8dae53b3bcea3f06bb139e329d1edab3.png" sizes="114x114">
    <link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/120-fa315ee0177dba4c55d4f66d4129b47f.png" sizes="120x120">
    <link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/152-052f5799bec8fb3aa624bdc72ef5bd1d.png" sizes="152x152">

    <style type="text/css"></style>
</head>

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
                                        <a class="author-name blue-link" target="_blank" href="javascript:void(0)">管理员</a> <em>·</em>
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
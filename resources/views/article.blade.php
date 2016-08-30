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

                    <ul class="article-list thumbnails">
                        {!! $article->content !!}
                        <!-- <iframe src="{{ $article->path }}" frameborder="no" width="100%" height="100%"></iframe> -->
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
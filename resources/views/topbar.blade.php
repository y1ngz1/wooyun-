<div class="page-title" style="width: 957px;">
    <ul class="recommened-nav navigation clearfix" data-container="#list-container" data-loader=".loader-tiny" data-user-slug="">
        <!-- 未登录状态 -->
        <!-- Active: recommended notes list -->
        @if ($column == 'bugs')
            <li class="active">
        @else
            <li>
        @endif
            <a data-pjax="true" href="/">八阿哥</a>
        </li>
        @if ($column == 'drops')
            <li class="active">
        @else
            <li>
        @endif
            <a data-pjax="true" href="/drops">知识库</a>
        </li>
        <img class="hide loader-tiny" src="/res/tiny.gif" alt="Tiny">
        <li class="search">
            <form class="search-form" target="_blank" action="/search" accept-charset="UTF-8" method="get">
                <input name="utf8" type="hidden" value="✓">
                <input name="column" type="hidden" value="{{ $column }}">
                <input type="search" name="q" id="q" placeholder="搜索" class="input-xlarge search-query" value="{{ $keyword }}">
                <span class="search_trigger" onclick="$(&#39;form.search-form&#39;).submit();">
                    <i class="fa fa-search"></i>
                </span>
            </form>
        </li>
    </ul>
</div>
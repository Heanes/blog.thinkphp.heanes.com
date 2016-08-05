<?php
/**
 * @doc 首页模版
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 11:59:55 周二
 */
defined('inHeanes') or die('Access denied!');
?>
<!-- 主体内容 -->
<div class="main-content main-wrap clearfix">
    <!-- 左侧区域 -->
    <div class="left-block left-wrap float-block"></div>
    <!-- 中心区域 -->
    <div class="center-block center-wrap float-block">
        <!-- 首页文章列表模块 -->
        <div class="index-article-list-block">
            <div class="article-list-block" id="indexArticleList">
                <?php foreach ($output['data']['article']['rows'] as $key => $article)?>
                <div class="article-list-row">
                    <div class="article-title">
                        <h1 class="title"><a href="/article/{$article.id}.html">{$article.title}</a></h1>
                    </div>
                    <div class="article-info">
                        <dl>
                            <dt>作者:</dt>
                            <dd>{$article.author}</dd>
                        </dl>
                        <dl>
                            <dt>日期:</dt>
                            <dd>{$article.publishTimeFormative}</dd>
                        </dl>
                        <dl>
                            <dt>人气:</dt>
                            <dd>{$article.clickCount}</dd>
                        </dl>
                        <dl>
                            <dt>评论:</dt>
                            <dd>{$article.commentCount}</dd>
                        </dl>
                        <dl class="article-tags">
                            <dt><i class="fa fa-tags" aria-hidden="true"></i><span class="tags">标签:</span></dt>
                            <dd><a href="javascript:">前端</a></dd>
                            <dd><a href="javascript:">CSS</a></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 右侧区域 -->
    <div class="right-block right-wrap float-block"></div>
</div>
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript" src="/public/static/libs/js/vue/1.0.20/vue.js"></script>
    <script type="text/javascript" src="<?php echo TPL;?>/js/mvvm/vue/js.js"></script>
    <script type="text/javascript">
        $(function () {
            var API = {
                'articleList':'/api/article/list'
            };

        });
    </script>
    <!-- E js E -->
</cite>

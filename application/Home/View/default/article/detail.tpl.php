<?php
/**
 * @doc 文章详情
 * @author Heanes fang <heanes@163.com>
 * @time 2016-06-21 19:09:49 周二
 */
defined('inHeanes') or die('Access denied!');
?>

<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <!-- responsive -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
    <meta name="renderer" content="webkit"/><!-- 让360等多核模式浏览器默认用极速模式打开 -->
    <meta name="author" content="Heanes heanes.com email(heanes@163.com)"/>
    <meta name="keywords" content="软件,商务,HTML,tutorials,source codes"/>
    <meta name="description" content="描述，不超过150个字符"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
    <!-- style -->
    <include file="layout/commonCss"/>
    <title>{{article.title}} - 文章详情</title>
</head>
<body>
<div class="center wrap">
    <!-- S 头部 S -->
    <include file="layout/header"/>
    <!-- E 头部 E-->
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            <!-- 左侧区域 -->
            <div class="left-block left-wrap float-block"></div>
            <!-- 中心区域 -->
            <div class="center-block center-wrap float-block">
            </div>
            <!-- 右侧区域 -->
            <div class="right-block right-wrap float-block"></div>
        </div>
    </div>
    <!-- E 主要内容 E -->
    <!-- S 脚部 S -->
    <include file="layout/footer"/>
    <!-- E 脚部 E -->
</div>
<cite>
    <!-- S js S -->
    <include file="layout/commonJs"/>
    <script type="text/javascript" src="/public/static/libs/js/vue/1.0.20/vue.js"></script>
    <script type="text/javascript">
        $(function () {
            var API = {
                'articleList':'/api/article/list',
                'articleDetail':'/api/article/detail'
            };

            var articleDetail = new Vue({
                el: '#indexArticleList',
                data: {
                    article: {}
                }
            });

            $.ajax({
                url:API.articleDetail,
                method:'POST',
                data: {'id': <?php echo $bData['id'];?>},
                dataType: "json",
                success: function (result) {
                    articleDetail.article = result.body;
                },
                fail: function (result) {
                }
            });

        });
    </script>
    <!-- E js E -->
</cite>
</body>
</html>

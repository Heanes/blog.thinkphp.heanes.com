<?php
/**
 * @doc 公用布局文件
 * @author Heanes
 * @time 2017-09-29 16:40:52 周五
 */
defined('InHeanes') or die('Access denied!');
?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <!-- meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <!-- responsive -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- 让IE8在新模式下渲染（禁止兼容模式） -->
    <meta name="renderer" content="webkit"/><!-- 让360等多核模式浏览器默认用极速模式打开 -->
    <meta name="author" content="Heanes heanes.com email(heanes@163.com)"/>
    <meta name="keywords" content="软件,商务,HTML,tutorials,source codes"/>
    <meta name="description" content="描述，不超过150个字符"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="/public/static/image/favicon/favicon.ico"/>
    <link rel="bookmark" href="/public/static/image/favicon/favicon.ico"/>
    <!-- css -->
    <include file="layout/css.inset"/>
    <include file="layout/js.inset"/>
    <title><?php echo $output['title'].$output['common']['titleCommonSuffix'];?></title>
</head>
<body>
<div class="center wrap clearfix">
    <!-- S 头部 S -->
    <include file="layout/header"/>
    <!-- E 头部 E-->
    <!-- S 主要内容 S -->
    <div class="main">
        <!-- 主体内容 -->
        <div class="main-content main-wrap clearfix">
            {__CONTENT__}
        </div>
    </div>
    <!-- E 主要内容 E -->
    <!-- S 脚部 S -->
    <include file="layout/footer"/>
    <!-- E 脚部 E -->
</div>
</body>
</html>

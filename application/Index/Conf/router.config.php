<?php
/**
 * @doc 路由配置
 * @author Heanes
 * @time 2016-09-05 16:03:07
 */
return array(
    // 路由相关
    'url_route_rules' => array(
        // 文章路由
        'article/page/:page\d$'          => 'index/article/index',
        'article/:id\d$'                 => 'index/article/detail',
        'article/:articleCategory/list$' => 'index/article/list',
        // 文章API路由
        'api/article/:id\d$'             => 'api/article/detail',
        // 文章分类路由
        'articleCategory/:code$'         => 'index/articleCategory/list',
        'articleCategory/:id\d$'         => 'index/articleCategory/list',

    ),

    'url_router_on'        => true,        // 开启路由
    'url_model'            => 2,           // URL模式
    'url_html_suffix'      => 'html',      // 默认后缀
    'url_case_insensitive' => true,        // URL区分大小写
);
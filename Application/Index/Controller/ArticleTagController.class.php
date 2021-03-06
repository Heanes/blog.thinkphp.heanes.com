<?php
/**
 * @doc 文章标签控制器
 * @author Heanes
 * @time 2016-08-06 21:53:04
 */
namespace Index\Controller;

use Common\Service\ArticleTagLibService;
use Common\Service\ArticleTagService;
use Index\Controller\Article\ArticleWebService;
use Think\Exception;

require_once(APP_PATH.'Common/utils/func/utils.php');
class ArticleTagController extends BaseIndexController{
    use ArticleWebService;

    /**
     * @var ArticleTagLibService 文章标签模型
     */
    private $articleTagLibService;

    function __construct() {
        parent::__construct();
        $this->articleTagLibService = new ArticleTagLibService();
    }
    
    public function indexOp() {
        $this->listOp();
    }
    
    /**
     * @doc 文章标签库列表页面
     * @author Heanes
     * @time 2016-08-07 11:09:41
     */
    public function listOp() {
        ;
    }

    /**
     * @doc 标签详情，显示具有该标签的所有文章
     * @return $this
     * @author Heanes
     * @time 2017-09-19 09:54:48 周二
     */
    public function articleListOp() {
        // 0. 获取查询参数，id或者name
        $requestId = I('request.id', null, 'int');
        $requestName = I('request.name', null, 'string');
        if(!isset($requestId) && !isset($requestName)){
            $this->error('参数不对');
        }
        $output = $this->commonOutput;

        // 0.1 先查询标签自身信息
        $articleTagLibParam = $this->getCommonShowDataSelectParam();
        if(isset($requestId)){
            $articleTagLibParam['where']['id'] = $requestId;
        }
        if(isset($requestId)){
            $articleTagLibParam['where']['name'] = $requestName;
        }
        $articleTagLibSR = $this->articleTagLibService->getOne($articleTagLibParam);
        if(!$articleTagLibSR){
            throw new Exception('标签不存在！');
        }
        // 0.2. 文章分页参数
        $articleTagParam['page'] = $this->getPageParamArray();
        $articleTagParam['where']['tag_id'] = $articleTagLibSR['id'];
        // 1. 查询文章列表，按发布时间降序
        $articleTagParam['order'] = ['publish_time desc'];
        $articleTagService = new ArticleTagService();
        $articlePageList = $articleTagService->getArticleList($articleTagParam);
        // 2. 处理文章其他数据
        if ($articlePageList['items']) {
            $articleIdList = array_column($articlePageList['items'], 'id');
            $articleCatIdList = array_unique(array_column($articlePageList['items'], 'categoryId'));

            // 2.1. 获取文章标签数据
            $articleTagGBArticleId = $this->getArticleTagMapListByArticleIdList($articleIdList);
            // 2.2. 获取文章分类数据
            $articleCategoryGBArticleId = $this->getArticleCategoryMapListByArticleCategoryIdList($articleCatIdList);

            // 2. 获取文章作者信息
            $articleAuthorList = [];
            $articleAuthor = [
                'id' => 1,
                'name' => 'Heanes',
                'url' => U('articleAuthor/' . 1),
            ];
            // 3. 装入其他数据
            foreach ($articlePageList['items'] as $index => &$item) {
                $item['articleTagList'] = $articleTagGBArticleId[$item['id']];
                $item['articleCategory'] = $articleCategoryGBArticleId[$item['categoryId']];
                $item['author'] = $articleAuthor;
            }
        }

        $output['data']['article'] = $articlePageList;

        $output['common']['title'] .= $articleTagLibSR['name'] . ' - 标签';
        $this->assign('output', $output);
        $this->display('articleList');
        return $this;
    }
}
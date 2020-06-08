<?php

namespace app\index\controller;

use think\Request;
use app\index\service\ArticleService;
use app\index\service\CategoryService;
use app\index\service\CompanyService;
use app\index\service\TagService;

class IndexController extends Controller
{
    /**
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function _initialize()
    {
        $this->assign('company', CompanyService::getSingletonInstance()->info());
        $this->assign('category', CategoryService::getSingletonInstance()->show());
        $this->assign('tag_article', TagService::getSingletonInstance()->tagOfArticle());
    }

    //vue编译后的页面的入口
    public function index()
    {
        return $this->fetch();
    }

    /**
     * @param $id
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function article($id)
    {
        $article = ArticleService::getSingletonInstance()->read($id);
        $this->assign('article', $article);
        return $this->fetch('article/article');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function home(Request $request)
    {

        $limit = $request->param('limit', 5);
        $current = $request->param('page', 1);
        $articles = ArticleService::getSingletonInstance()->show([], $limit);
        $page = (new Bootstrap($articles['data'], $limit, $current, $articles['total']))->render();
        $this->assign('page', $page);
        $this->assign('articles', $articles);
        return $this->fetch();
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function categoryArticle(Request $request, $id)
    {
        $limit = $request->param('limit', 10);
        $current = $request->param('page', 1);
        $articles = ArticleService::getSingletonInstance()->show(['category_id' => $id], $limit);
        $page = (new Bootstrap($articles['data'], $limit, $current, $articles['total']))->render();
        $this->assign('page', $page);
        $this->assign('articles', $articles);
        $this->assign('category_id', $id);
        return $this->fetch('home');
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function tagArticle(Request $request, $id)
    {

        $limit = $request->param('limit', 10);
        $current = $request->param('page', 1);
        $articles = ArticleService::getSingletonInstance()->show(['tag' => $id], $limit);
        $page = (new Bootstrap($articles['data'], $limit, $current, $articles['total']))->render();
        $this->assign('page', $page);
        $this->assign('articles', $articles);
        return $this->fetch('home');
    }
}

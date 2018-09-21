<?php
namespace app\index\controller;

use think\Request;
use app\index\service\ArticleService;
use app\index\service\CategoryService;
use app\index\service\CompanyService;
use app\index\service\TagService;

class IndexController extends Controller
{
    public function _initialize()
    {
        $this->articleService  = new ArticleService();
        $this->categoryService = new CategoryService();
        $this->companyService  = new CompanyService();
        $this->tagService      = new TagService();
        $this->company     = $this->companyService->info();
        $this->category    = $this->categoryService->show();
        $this->tag_article = $this->tagService->tagOfArticle();
        $this->assign('company', $this->company);
        $this->assign('category', $this->category);
        $this->assign('tag_article', $this->tag_article);
    }

	//vue编译后的页面的入口
    public function index()
    {
        return $this->fetch();
    }

    public function article($id)
    {
        $article  = $this->articleService->read($id);
        $this->assign('article', $article);
        return $this->fetch('article/article');
    }

    public function home(Request $request)
    {

        $limit    = $request->param('limit',5);
        $current  = $request->param('page', 1);
        $articles = $this->articleService->show([], $limit);
        $page     = (new Bootstrap($articles['data'], $limit, $current, $articles['total']))->render();
        $this->assign('page', $page);
        $this->assign('articles', $articles);
        return $this->fetch();
    }

    public function categoryArticle(Request $request, $id)
    {
        $limit    = $request->param('limit',10);
        $current  = $request->param('page', 1);
        $articles = $this->articleService->show(['category_id'=>$id], $limit);
        $page     = (new Bootstrap($articles['data'], $limit, $current, $articles['total']))->render();
        $this->assign('page', $page);
        $this->assign('articles', $articles);
        $this->assign('category_id', $id);
        return $this->fetch('home');
    }

    public function tagArticle(Request $request, $id)
    {

        $limit    = $request->param('limit',10);
        $current  = $request->param('page', 1);
        $articles = $this->articleService->show(['tag'=>$id], $limit);
        $page     = (new Bootstrap($articles['data'], $limit, $current, $articles['total']))->render();
        $this->assign('page', $page);
        $this->assign('articles', $articles);
        return $this->fetch('home');
    }
}

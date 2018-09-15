<?php
namespace app\index\controller;

use app\index\service\ArticleService;
use app\index\service\CategoryService;

class IndexController extends Controller
{
    public function _initialize()
    {
        $this->articleService = new ArticleService();
        $this->categoryService = new CategoryService();
    }

	//vue编译后的页面的入口
    public function index()
    {
        return $this->fetch();
    }

    public function home()
    {
        $category = $this->categoryService->show();
        $article  = $this->articleService->read(8);
        $this->assign('article', $article);
        $this->assign('category', $category);
        return $this->fetch();
    }
}

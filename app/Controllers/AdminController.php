<?php
namespace App\Controllers;

use App\Models\ArticleModel;

class AdminController extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $article = $model->findAll();
        return view('admin/index', ['article' => $article]);
    }
}

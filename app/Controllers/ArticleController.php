<?php
namespace App\Controllers;

use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function indexDesc()
    {
        $model = new ArticleModel();
        $article = $model->where('published', 1)
            ->orderBy('top', 'DESC')
            ->orderBy('date', 'DESC')
            ->findAll();
        return view('article/index_desc', ['article' => $article]);
    }

    public function indexAsc()
    {
        $model = new ArticleModel();
        $article = $model->where('published', 1)
            ->orderBy('date', 'ASC')
            ->findAll();
        return view('article/index_asc', ['article' => $article]);
    }

    public function show($id)
    {
        $model = new ArticleModel();
        $article = $model->find($id);
        if (!$article || !$article->published) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('article/show', ['article' => $article]);
    }
}

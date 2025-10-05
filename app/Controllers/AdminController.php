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

    public function create()
    {
        return view('admin/create');
    }

    public function store()
    {
        $model = new ArticleModel();
        $data = [
            'title'     => $this->request->getPost('title'),
            'link'      => $this->request->getPost('link'),
            'photo'     => $this->request->getPost('photo'),
            'date'      => strtotime($this->request->getPost('date')),
            'text'      => $this->request->getPost('text'),
            'published' => $this->request->getPost('published') ? 1 : 0,
            'top'       => $this->request->getPost('top') ? 1 : 0,
        ];
        $model->insert($data);
        return redirect()->to(site_url('admin'));
    }

    public function edit($id)
    {
        $model = new ArticleModel();
        $article = $model->find($id);
        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/edit', ['article' => $article]);
    }

    public function update($id)
    {
        $model = new ArticleModel();
        $data = [
            'title'     => $this->request->getPost('title'),
            'link'      => $this->request->getPost('link'),
            'photo'     => $this->request->getPost('photo'),
            'date'      => strtotime($this->request->getPost('date')),
            'text'      => $this->request->getPost('text'),
            'published' => $this->request->getPost('published') ? 1 : 0,
            'top'       => $this->request->getPost('top') ? 1 : 0,
        ];
        $model->update($id, $data);
        return redirect()->to(site_url('admin'));
    }
}

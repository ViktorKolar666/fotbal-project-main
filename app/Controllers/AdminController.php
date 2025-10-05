<?php
namespace App\Controllers;

use App\Models\ArticleModel;

class AdminController extends BaseController
{
    public function index()
    {
        $this->checkLogin();
        $model = new ArticleModel();
        $article = $model->findAll();
        return view('admin/index', ['article' => $article]);
    }

    public function create()
    {
        $this->checkLogin();
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
        $this->checkLogin();
        $model = new ArticleModel();
        $article = $model->find($id);
        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/edit', ['article' => $article]);
    }

    public function update($id)
    {
        $this->checkLogin();
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

    public function login()
    {
        return view('admin/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'root' && $password === '1234') {
            session()->set('isAdmin', true);
            return redirect()->to(site_url('admin'));
        } else {
            return view('admin/login', ['error' => 'Špatné přihlašovací údaje.']);
        }
    }

    public function logout()
    {
        session()->remove('isAdmin');
        return redirect()->to(site_url('admin/login'));
    }

    // Ověření přihlášení pro všechny administrativní akce
    private function checkLogin()
    {
        if (!session()->get('isAdmin')) {
            // Pokud není přihlášen, přesměruj na login a ukonči běh
            header('Location: ' . site_url('admin/login'));
            exit;
        }
    }
}

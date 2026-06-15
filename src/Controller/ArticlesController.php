<?php

declare(strict_types=1);

namespace App\Controller;

class ArticlesController extends AppController
{
    public function index()
    {
        $query = $this->Articles->find()
            ->contain(['Users']);

        $articles = $this->paginate($query);

        $this->set(compact('articles'));
    }

    public function view($slug = null)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain(['Users'])
            ->firstOrFail();

        $this->set(compact('article'));
    }

    public function add()
{
    $article = $this->Articles->newEmptyEntity();

    if ($this->request->is('post')) {
        $article = $this->Articles->patchEntity(
            $article,
            $this->request->getData()
        );

        $userId = $this->request->getSession()->read('UserAuth.id');

        if (!$userId) {
            $identity = $this->Authentication->getIdentity();

            if ($identity) {
                $userId = $identity->getIdentifier();
            }
        }

        $article->user_id = $userId;

        if ($this->Articles->save($article)) {
            $this->Flash->success(__('El artículo ha sido guardado.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('No se pudo guardar el artículo.'));
    }

    $this->set(compact('article'));
}

    public function edit($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->firstOrFail();

        if ($this->request->is(['post', 'put', 'patch'])) {

            $this->Articles->patchEntity(
                $article,
                $this->request->getData()
            );

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('El artículo ha sido actualizado.'));

                return $this->redirect([
                    'action' => 'view',
                    $article->slug
                ]);
            }

            $this->Flash->error(__('No se pudo actualizar el artículo.'));
        }

        $this->set(compact('article'));
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles
            ->findBySlug($slug)
            ->firstOrFail();

        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('El artículo ha sido eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
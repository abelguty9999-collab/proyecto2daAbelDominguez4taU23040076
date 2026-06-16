<?php
declare(strict_types=1);

namespace App\Controller;

class ArticlesTagsController extends AppController
{
    public function index()
    {
        $connection = \Cake\Datasource\ConnectionManager::get('default');

        $articlesTags = $connection
            ->execute('SELECT article_id, tag_id FROM articles_tags')
            ->fetchAll('assoc');

        $this->set(compact('articlesTags'));
    }
}
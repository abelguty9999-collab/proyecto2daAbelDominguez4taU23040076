<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');


        $this->belongsTo('Users', [
    'foreignKey' => 'user_id',
    'joinType' => 'LEFT',
]);

        $this->belongsToMany('Tags', [
    'foreignKey' => 'article_id',
    'targetForeignKey' => 'tag_id',
    'joinTable' => 'articles_tags',
]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmptyString('body');

        return $validator;
    }

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = strtolower(substr($sluggedTitle, 0, 191));
        }
    }
}
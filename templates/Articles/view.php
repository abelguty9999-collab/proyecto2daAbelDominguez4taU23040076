<h1><?= h($article->title) ?></h1>

<p>
    <?= $this->Html->link(
        'Edit',
        ['action' => 'edit', $article->slug]
    ) ?>
</p>
<p>
    <strong>Etiquetas:</strong>
    <?php foreach ($article->tags as $tag): ?>
        <?= h($tag->title) ?>
    <?php endforeach; ?>
</p>

<p>
    <?= $this->Form->postLink(
        'Delete',
        ['action' => 'delete', $article->slug],
        ['confirm' => '¿Está seguro de eliminar este artículo?']
    ) ?>
</p>

<p><?= h($article->body) ?></p>

<p>
    <small>
        Creado:
        <?= $article->created ? $article->created->format(DATE_RFC850) : 'Sin fecha' ?>
    </small>
</p>
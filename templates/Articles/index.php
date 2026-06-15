<div class="articles index content">
    <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <h3><?= __('Articles') ?></h3>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Published</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= $this->Number->format($article->id) ?></td>

                    <td>
                        <?= isset($article->user) ? h($article->user->email) : 'Sin usuario' ?>
                    </td>

                    <td><?= h($article->title) ?></td>

                    <td><?= h($article->slug) ?></td>

                    <td>
                        <?= isset($article->published) ? h($article->published) : '1' ?>
                    </td>

                    <td>
                        <?= $article->created ? h($article->created->format('n/j/y, g:i A')) : 'Sin fecha' ?>
                    </td>

                    <td>
                        <?= $article->modified ? h($article->modified->format('n/j/y, g:i A')) : 'Sin fecha' ?>
                    </td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $article->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->slug]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $article->slug],
                            ['confirm' => __('¿Seguro que deseas eliminar el artículo "{0}"?', $article->title)]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>

        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
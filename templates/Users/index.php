<div class="users index content">
    <h3>Usuarios</h3>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Correo electrónico</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->id) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $user->id],
                        ['confirm' => '¿Seguro que deseas eliminar este usuario?']
                    ) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
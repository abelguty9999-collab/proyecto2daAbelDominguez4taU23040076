<div class="users view content">
    <h3>Usuario</h3>

    <table>
        <tr>
            <th>Id</th>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <th>Correo electrónico</th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th>Creado</th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th>Modificado</th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>

    <p>
        <?= $this->Html->link('Editar', ['action' => 'edit', $user->id]) ?>
        |
        <?= $this->Html->link('Regresar', ['action' => 'index']) ?>
    </p>
</div>
<div class="users form content">
    <h3>Editar Usuario</h3>

    <?= $this->Form->create($user) ?>

    <fieldset>
        <legend>Editar Usuario</legend>

        <?=
        $this->Form->control('email');

        echo $this->Form->control('password', [
            'required' => false,
            'value' => ''
        ]);
        ?>
    </fieldset>

    <?= $this->Form->button('Guardar') ?>
    <?= $this->Form->end() ?>

    <br>

    <?= $this->Html->link('Volver', ['action' => 'index']) ?>
</div>
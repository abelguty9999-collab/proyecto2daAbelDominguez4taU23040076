<div class="users form content">
    <h3>Acceso</h3>

    <?= $this->Form->create() ?>

    <fieldset>
        <legend>Por favor, introduzca su correo electrónico y contraseña.</legend>

        <?= $this->Form->control('email', [
            'label' => 'Correo electrónico'
        ]) ?>

        <?= $this->Form->control('password', [
            'label' => 'Contraseña'
        ]) ?>
    </fieldset>

    <?= $this->Form->button('Acceso') ?>

    <?= $this->Form->end() ?>

    <p>
        <?= $this->Html->link(
            'Agregar usuario',
            ['controller' => 'Users', 'action' => 'add']
        ) ?>
    </p>
</div>
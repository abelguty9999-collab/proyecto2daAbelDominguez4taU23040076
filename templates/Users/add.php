<div class="users form content">
    <h3>Crear usuario</h3>

    <?= $this->Form->create($user) ?>

    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>

    <?= $this->Form->button(__('Guardar usuario')) ?>

    <?= $this->Form->end() ?>
</div>
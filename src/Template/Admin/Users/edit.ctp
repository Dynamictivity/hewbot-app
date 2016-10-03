<?= $this->Form->create($user, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Edit User') ?></legend>
    <?php
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('email');
    echo $this->Form->input('token');
    echo $this->Form->input('is_admin');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

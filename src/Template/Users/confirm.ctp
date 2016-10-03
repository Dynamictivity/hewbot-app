<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Set Password') ?></legend>
    <?php
    echo $this->Form->input('new_password', ['type' => 'password']);
    echo $this->Form->input('confirm_password', ['type' => 'password']);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

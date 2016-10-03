<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Register Account') ?></legend>
    <?php
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('email');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Reset Account') ?></legend>
    <?php
    echo $this->Form->input('email');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

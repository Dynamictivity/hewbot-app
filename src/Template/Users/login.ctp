<?php
use Cake\Core\Configure;
?>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= Configure::read('dyn.site.name') ?> <?= __('Login') ?></legend>
    <?php
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

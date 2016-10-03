<?= $this->Form->create($botAdapter) ?>
<fieldset>
    <legend><?= __('Edit Bot Adapter') ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('description');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

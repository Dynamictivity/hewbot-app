<?= $this->Form->create($externalScript) ?>
<fieldset>
    <legend><?= __('Add External Script') ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('description');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

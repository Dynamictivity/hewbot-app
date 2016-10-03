<?= $this->Form->create($botExternalScript) ?>
<fieldset>
    <legend><?= __('Add Bot External Script') ?></legend>
    <?php
        echo $this->Form->input('bot_id', ['options' => $bots]);
        echo $this->Form->input('external_script_id', ['options' => $externalScripts]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

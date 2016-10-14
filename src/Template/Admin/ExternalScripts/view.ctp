<h3><?= h($externalScript->name) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($externalScript->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($externalScript->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('is_public') ?></th>
        <td><?= yn($externalScript->is_public) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Created') ?></th>
        <td><?= h($externalScript->created) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Modified') ?></th>
        <td><?= h($externalScript->modified) ?></td>
    </tr>
</table>
<div class="row">
    <h4><?= __('Description') ?></h4>
    <?= $this->Text->autoParagraph(h($externalScript->description)); ?>
</div>
<div class="related">
    <h4><?= __('Related Bot External Scripts') ?></h4>
    <?php if (!empty($externalScript->bot_external_scripts)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Bot Id') ?></th>
            <th scope="col"><?= __('External Script Id') ?></th>
            <th scope="col"><?= __('Created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($externalScript->bot_external_scripts as $botExternalScripts): ?>
        <tr>
            <td><?= h($botExternalScripts->id) ?></td>
            <td><?= h($botExternalScripts->bot_id) ?></td>
            <td><?= h($botExternalScripts->external_script_id) ?></td>
            <td><?= h($botExternalScripts->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'BotExternalScripts', 'action' => 'view', $botExternalScripts->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'BotExternalScripts', 'action' => 'edit', $botExternalScripts->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BotExternalScripts', 'action' => 'delete', $botExternalScripts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $botExternalScripts->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>

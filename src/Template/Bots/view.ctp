<h3><?= h($bot->name) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($bot->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Bot Adapter') ?></th>
        <td><?= $bot->has('bot_adapter') ? $this->Html->link($bot->bot_adapter->name, ['controller' => 'BotAdapters', 'action' => 'view', $bot->bot_adapter->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($bot->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Created') ?></th>
        <td><?= h($bot->created) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Modified') ?></th>
        <td><?= h($bot->modified) ?></td>
    </tr>
</table>
<div class="related">
    <h4><?= __('Related Bot External Scripts') ?></h4>
    <?php if (!empty($bot->bot_external_scripts)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Bot Id') ?></th>
            <th scope="col"><?= __('External Script Id') ?></th>
            <th scope="col"><?= __('Created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($bot->bot_external_scripts as $botExternalScripts): ?>
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

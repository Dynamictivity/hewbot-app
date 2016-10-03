<h3><?= h($bot->name) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($bot->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Bot Adapter') ?></th>
        <td><?= $bot->has('bot_adapter') ? h($bot->bot_adapter->name) : '' ?></td>
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
    <h4><?= __('Bot External Scripts') ?></h4>
    <?php if (!empty($bot->bot_external_scripts)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('External Script Id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($bot->bot_external_scripts as $botExternalScripts): ?>
        <tr>
            <td><?= h($botExternalScripts->external_script->name) ?></td>
            <td class="actions">
                <?= $this->Form->postLink(__('Remove'), ['controller' => 'BotExternalScripts', 'action' => 'delete', $botExternalScripts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $botExternalScripts->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?= $this->Html->link(__('Add Script'), ['controller' => 'External Scripts', 'action' => 'index']) ?>
    <?php endif; ?>
</div>

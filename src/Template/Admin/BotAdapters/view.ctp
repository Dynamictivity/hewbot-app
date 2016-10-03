<h3><?= h($botAdapter->name) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($botAdapter->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($botAdapter->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Created') ?></th>
        <td><?= h($botAdapter->created) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Modified') ?></th>
        <td><?= h($botAdapter->modified) ?></td>
    </tr>
</table>
<div class="row">
    <h4><?= __('Description') ?></h4>
    <?= $this->Text->autoParagraph(h($botAdapter->description)); ?>
</div>
<div class="related">
    <h4><?= __('Related Bots') ?></h4>
    <?php if (!empty($botAdapter->bots)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Name') ?></th>
            <th scope="col"><?= __('User Id') ?></th>
            <th scope="col"><?= __('Bot Adapter Id') ?></th>
            <th scope="col"><?= __('Hubot Slack Token') ?></th>
            <th scope="col"><?= __('Created') ?></th>
            <th scope="col"><?= __('Modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($botAdapter->bots as $bots): ?>
        <tr>
            <td><?= h($bots->id) ?></td>
            <td><?= h($bots->name) ?></td>
            <td><?= h($bots->user_id) ?></td>
            <td><?= h($bots->bot_adapter_id) ?></td>
            <td><?= h($bots->hubot_slack_token) ?></td>
            <td><?= h($bots->created) ?></td>
            <td><?= h($bots->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Bots', 'action' => 'view', $bots->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Bots', 'action' => 'edit', $bots->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bots', 'action' => 'delete', $bots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bots->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>

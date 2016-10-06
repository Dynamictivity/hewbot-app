<h3><?= __('Bots') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('bot_adapter_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('hubot_slack_token') ?></th>
            <th scope="col"><?= $this->Paginator->sort('containerid') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bots as $bot): ?>
        <tr>
            <td><?= $this->Number->format($bot->id) ?></td>
            <td><?= h($bot->name) ?></td>
            <td><?= $bot->has('user') ? $this->Html->link($bot->user->first_name, ['controller' => 'Users', 'action' => 'view', $bot->user->id]) : '' ?></td>
            <td><?= $bot->has('bot_adapter') ? $this->Html->link($bot->bot_adapter->name, ['controller' => 'BotAdapters', 'action' => 'view', $bot->bot_adapter->id]) : '' ?></td>
            <td><?= h($bot->hubot_slack_token) ?></td>
            <td><?= h($bot->containerid) ?></td>
            <td><?= h($bot->created) ?></td>
            <td><?= h($bot->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $bot->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bot->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bot->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('pagination_admin'); ?>

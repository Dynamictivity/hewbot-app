<h3><?= __('Bots') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('bot_adapter_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('hubot_slack_token') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bots as $bot): ?>
        <tr>
            <td><?= h($bot->name) ?></td>
            <td><?= $bot->has('bot_adapter') ? h($bot->bot_adapter->name) : '' ?></td>
            <td><?= h($bot->hubot_slack_token) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Re-deploy'), ['action' => 'deploy', $bot->id]) ?>
                <?= $this->Html->link(__('View'), ['action' => 'view', $bot->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bot->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bot->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('pagination_admin'); ?>

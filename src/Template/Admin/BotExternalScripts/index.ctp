<h3><?= __('Bot External Scripts') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('bot_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('external_script_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($botExternalScripts as $botExternalScript): ?>
        <tr>
            <td><?= $this->Number->format($botExternalScript->id) ?></td>
            <td><?= $botExternalScript->has('bot') ? $this->Html->link($botExternalScript->bot->name, ['controller' => 'Bots', 'action' => 'view', $botExternalScript->bot->id]) : '' ?></td>
            <td><?= $botExternalScript->has('external_script') ? $this->Html->link($botExternalScript->external_script->name, ['controller' => 'ExternalScripts', 'action' => 'view', $botExternalScript->external_script->id]) : '' ?></td>
            <td><?= h($botExternalScript->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $botExternalScript->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $botExternalScript->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $botExternalScript->id], ['confirm' => __('Are you sure you want to delete # {0}?', $botExternalScript->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('pagination_admin'); ?>

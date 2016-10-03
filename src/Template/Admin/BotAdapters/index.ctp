<h3><?= __('Bot Adapters') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($botAdapters as $botAdapter): ?>
        <tr>
            <td><?= $this->Number->format($botAdapter->id) ?></td>
            <td><?= h($botAdapter->name) ?></td>
            <td><?= h($botAdapter->created) ?></td>
            <td><?= h($botAdapter->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $botAdapter->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $botAdapter->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $botAdapter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $botAdapter->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('pagination_admin'); ?>

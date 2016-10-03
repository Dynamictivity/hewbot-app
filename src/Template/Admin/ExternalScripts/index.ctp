<h3><?= __('External Scripts') ?></h3>
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
        <?php foreach ($externalScripts as $externalScript): ?>
        <tr>
            <td><?= $this->Number->format($externalScript->id) ?></td>
            <td><?= h($externalScript->name) ?></td>
            <td><?= h($externalScript->created) ?></td>
            <td><?= h($externalScript->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $externalScript->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $externalScript->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $externalScript->id], ['confirm' => __('Are you sure you want to delete # {0}?', $externalScript->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('pagination_admin'); ?>

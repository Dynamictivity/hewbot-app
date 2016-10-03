<h3><?= __('External Scripts') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= __('Desctiption') ?>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($externalScripts as $externalScript): ?>
        <tr>
            <td><?= h($externalScript->name) ?></td>
            <td><?= h($externalScript->description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Add'), ['controller' => 'BotExternalScripts', 'action' => 'add', $externalScript->id]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->element('pagination'); ?>

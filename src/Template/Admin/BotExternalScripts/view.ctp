<h3><?= h($botExternalScript->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Bot') ?></th>
        <td><?= $botExternalScript->has('bot') ? $this->Html->link($botExternalScript->bot->name, ['controller' => 'Bots', 'action' => 'view', $botExternalScript->bot->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('External Script') ?></th>
        <td><?= $botExternalScript->has('external_script') ? $this->Html->link($botExternalScript->external_script->name, ['controller' => 'ExternalScripts', 'action' => 'view', $botExternalScript->external_script->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($botExternalScript->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Created') ?></th>
        <td><?= $this->Number->format($botExternalScript->created) ?></td>
    </tr>
</table>

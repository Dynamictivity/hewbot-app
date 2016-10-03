<h3><?= h($user->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th><?= __('First Name') ?></th>
        <td><?= h($user->first_name) ?></td>
    </tr>
    <tr>
        <th><?= __('Last Name') ?></th>
        <td><?= h($user->last_name) ?></td>
    </tr>
    <tr>
        <th><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th><?= __('Password') ?></th>
        <td><?= h($user->password) ?></td>
    </tr>
    <tr>
        <th><?= __('Token') ?></th>
        <td><?= h($user->token) ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td><?= $this->Number->format($user->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td><?= h($user->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td><?= h($user->modified) ?></td>
    </tr>
</table>

<?php
use Cake\Core\Configure;
?>
<?php if ($this->request->session()->read('Auth.User.id')): ?>
    <li class="heading"><?= __('System Admin') ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Bots'), ['controller' => 'Bots', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Bot External Scripts'), ['controller' => 'BotExternalScripts', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Adapters'), ['controller' => 'BotAdapters', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List External Scripts'), ['controller' => 'External Scripts', 'action' => 'index']) ?></li>

    <li class="heading"><?= __('Account') ?></li>
    <li><?= $this->Html->link(__('My Account'), ['controller' => 'Users', 'action' => 'account']) ?></li>
    <li><?= $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>
    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>

    <li class="heading"><?= __('User') ?></li>
    <li><?= $this->Html->link(__('Public Frontend'), ['controller' => 'Users', 'action' => 'profile', 'prefix' => false]) ?></li>
<?php else: ?>
    <li class="heading"><?= Configure::read('dyn.site.name') ?></li>
    <li><?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'register']) ?></li>
    <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
    <li><?= $this->Html->link(__('Forgot Password'), ['controller' => 'Users', 'action' => 'reset']) ?></li>
<?php endif; ?>

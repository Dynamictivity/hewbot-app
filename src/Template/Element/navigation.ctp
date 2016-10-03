<?php
use Cake\Core\Configure;
?>
<?php if ($this->request->session()->read('Auth.User.id')): ?>
    <li class="heading"><?= __('Hewbots') ?></li>
    <li><?= $this->Html->link(__('List Bots'), ['controller' => 'Bots', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List External Scripts'), ['controller' => 'External Scripts', 'action' => 'index']) ?></li>

    <li class="heading"><?= __('Account') ?></li>
    <li><?= $this->Html->link(__('My Account'), ['controller' => 'Users', 'action' => 'account']) ?></li>
    <li><?= $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>
    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    <?php if ($this->request->session()->read('Auth.User.is_admin')): ?>
        <li class="heading"><?= __('Admin') ?></li>
        <li><?= $this->Html->link(__('Admin Interface'), ['controller' => 'Users', 'action' => 'index', 'prefix' => 'admin']) ?></li>
    <?php endif; ?>
<?php else: ?>
    <li class="heading"><?= Configure::read('dyn.site.name') ?></li>
    <li><?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'register']) ?></li>
    <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
    <li><?= $this->Html->link(__('Forgot Password'), ['controller' => 'Users', 'action' => 'reset']) ?></li>
<?php endif; ?>

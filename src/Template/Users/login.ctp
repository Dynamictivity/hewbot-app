<?php
use Cake\Core\Configure;
?>
<p>
    Sign up to get your very own hand-crafted hosted hubot. If you don't know what hubot is, check out <a href="https://hubot.github.com/" target="_blank">https://hubot.github.com/</a>.
    <br /><br />
    Right now this product is in an alpha state, however during this time we are offering 1 free hosted hubot to anyone who signs up. Please keep in mind that your bot may be wiped out at any time due to issues we experience during the development of this product. Rest assured, we will give you advance notice if we ever decide to discontinue the free service.
    <br /><br />
    If you have questions, suggestions, feedback or need support, please contact us at <a href="mailto:support@dynamictivity.com">support@dynamictivity.com</a>.
</p>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= Configure::read('dyn.site.name') ?> <?= __('Login') ?></legend>
    <?php
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

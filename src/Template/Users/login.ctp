<?php
use Cake\Core\Configure;
?>
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
<br />
<p>
    <h4>Welcome to hewbot.com!</h4>
    <center>
        <strong><em>Watch this video to learn how Hewbot works</em></strong><br />
        <iframe width="560" height="315" src="https://www.youtube.com/embed/eWrJnMtHo9w" frameborder="0" allowfullscreen></iframe>
    </center>
</p>
<p>
  Sign up to get your very own hand-crafted hosted hubot. If you don't know what hubot is, check out <a href="https://hubot.github.com/" target="_blank">https://hubot.github.com/</a>.
</p>
<p>
    <h5><u>We are free and in alpha</u></h5>
    Right now this product is in an alpha state, however during this time we are offering 1 free hosted hubot to anyone who signs up. Please keep in mind that your bot may be wiped out at any time due to issues we experience during the development of this product. Rest assured, we will give you advance notice if we ever decide to discontinue the free service.
</p>
<p>
    <h5><u>We are offering support and requesting your feedback</u></h5>
    If you have questions, suggestions, feedback or need support, please contact us at <a href="mailto:support@dynamictivity.com">support@dynamictivity.com</a>.
</p>
<p>
    <h5><u>We are open source</u></h5>
    This platform is open-source, you can check out the 2 components of it at <a href="https://github.com/Dynamictivity/hewbot-app" target="_blank">https://github.com/Dynamictivity/hewbot-app</a> and <a href="https://github.com/Dynamictivity/hewbot-docker">https://github.com/Dynamictivity/hewbot-docker</a>.
</p>

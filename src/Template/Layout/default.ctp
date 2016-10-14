<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Configure;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= Configure::read('dyn.site.name') ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('app.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= Configure::read('dyn.site.name') ?></a></h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="right">
            <li><a href="">Your very own hand-crafted hosted hubot</a></li>
        </ul>
    </div>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <?= $this->element('navigation' . (isset($this->request->params['prefix']) ? '_' . $this->request->params['prefix'] : null)); ?>
        </ul>
    </nav>
    <div class="users index large-9 medium-8 columns content">
        <?= $this->fetch('content') ?>
    </div>
</div>
<footer>
</footer>
<script id='pp-cfp' data-env='beta' data-token='01e8a14275fc64b4cb780266cc05e33a9a8b9496e9e94079ad5d8710b4896504'>(function(d){var s=d.createElement('script'),c=d.createElement('link');s.src='https://beta.prodpad.com/static/js/prodpad-cfp.js';s.async=1;c.href='https://beta.prodpad.com/static/css/prodpad-cfp.css';c.rel='stylesheet';document.head.appendChild(c);document.head.appendChild(s);})(document);</script>
<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'); ?>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', <?= Configure::read('dyn.google.analytics'); ?>, 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>

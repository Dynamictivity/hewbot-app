<?php use Cake\Core\Configure; ?>
You, or someone else, requested to reset your account password. Please click the following link to reset your account:
<?php echo Configure::read('dyn.site.url'); ?>/users/confirm/<?php echo $user['token']; ?> If you did not request this,
simply ignore this e-mail and your account will not be changed.

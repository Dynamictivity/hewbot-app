<?php use Cake\Core\Configure; ?>
You, or someone else, registered an account. Please click the following link to set your password:
<?php echo Configure::read('dyn.site.url'); ?>/users/confirm/<?php echo $user['token']; ?>

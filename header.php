<!-- /* spell *wp_header* and press enter */ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.ico">
  <link rel="apple-touch-icon-precomposed" href="/favicon-152.png">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style@media.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
  <?php
   wp_enqueue_script('jquery');
   wp_head();
   ?>
</head>
<body <?php body_class(); ?>>
  <section class="gnav">
    <div class="container">
      <div class="gnav-wrapper">
        <div class="usergnav">
          <?php if(is_user_logged_in()): ?>
            <?php $args = array(
              'menu' => 'mockpad-global-navigation_user',
              'menu_class' => 'global-navigation_user',
              'container' => false,
            );
            wp_nav_menu($args);
            ?>
          <?php endif; ?>
        </div><!--  .usergnav -->
        <div class="login">
          <?php if(is_user_logged_in()): ?>
            <?php $args = array(
              'menu' => 'mockpad-global-navigation_logout',
              'menu_class' => 'global-navigation_user',
              'container' => false,
            );
            wp_nav_menu($args);
            ?>
          <?php else: ?>
            <?php $args = array(
              'menu' => 'mockpad-global-navigation_no_login',
              'menu_class' => 'global-navigation_user',
              'container' => false,
            );
            wp_nav_menu($args);
            ?>
          <?php endif; ?>
        </div><!--  .login -->
      </div><!--  .gnav-wrapper -->
    </div><!--  .container -->
  </section><!--  .gnav -->

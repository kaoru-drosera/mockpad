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

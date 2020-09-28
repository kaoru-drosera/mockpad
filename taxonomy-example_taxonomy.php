<!-- /* spell *wp_loop+* and press enter */ -->
<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post();?>
    <?php get_template_part('template-parts/loop','article2') ?>
  <?php endwhile; ?>
<?php endif; ?>

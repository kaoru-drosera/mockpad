<!-- /* spell *wp_loop+* and press enter */ -->
<?php echo get_header(); ?>

<?php
  $args_ct = array(
  'post_type' => 'article2',
  'post_status' => 'publish',
  'posts_per_page' => 6
  );
  $the_query_ct = new WP_Query($args_ct);
 ?>
<?php if($the_query_ct->have_posts()): ?>
  <?php while($the_query_ct->have_posts()): $the_query_ct->the_post();?>
    <?php get_template_part('template-parts/loop','article2') ?>
  <?php endwhile; ?>
<?php endif; ?>

<p>サルバリシオン</p>

<?php echo get_footer(); ?>

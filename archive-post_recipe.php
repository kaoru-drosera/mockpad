<?php
  $args_ct = array(
  'post_type' => 'post_recipe',
  'post_status' => 'publish',
  'posts_per_page' => 6
  );
  $the_query_ct = new WP_Query($args_ct);
 ?>
<?php if($the_query_ct->have_posts()): ?>
  <?php while($the_query_ct->have_posts()): $the_query_ct->the_post();?>
    <?php get_template_part('template-parts/loop','post_recipe') ?>
  <?php endwhile; ?>
<?php endif; ?>

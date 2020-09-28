<?php
  $args_ct3 = array(
  'post_type' => 'article2',
  'post_status' => 'publish',
  'posts_per_page' => 6
  );
  $the_query_ct3 = new WP_Query($args_ct3);
 ?>
<?php if($the_query_ct3->have_posts()): ?>
  <?php while($the_query_ct3->have_posts()): $the_query_ct3->the_post();?>
    <?php get_template_part('template-parts/loop','article2') ?>
  <?php endwhile; ?>
<?php endif; ?>

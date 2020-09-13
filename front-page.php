<!-- /* spell *get_header* and press enter */ -->
<?php echo get_header(); ?>
<?php
  $cat = get_the_category();

  $catid = $cat[0]->cat_ID;
  $cat_name = $cat[0]->cat_name;
  $cat_slug = $cat[0]->category_nicename;
  $cat_link = get_category_link($catid);
 ?>

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

<p><?php echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></p>
<div class="div"></div><!--  .div -->

<?php echo get_footer(); ?>

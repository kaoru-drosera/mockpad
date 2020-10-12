<!-- /* spell *get_header* and press enter */ -->
<?php echo get_header(); ?>
<?php
  $args_ct = array(
  'post_type' => 'article',
  'post_status' => 'publish',
  'posts_per_page' => 6
  );
  $the_query_ct = new WP_Query($args_ct);
 ?>
 <div class="main-column">
   <div class="container">
     <ul class="recipe_list">
     <?php if($the_query_ct->have_posts()): ?>
       <?php while($the_query_ct->have_posts()): $the_query_ct->the_post();?>
           <?php get_template_part('template-parts/loop','article') ?>
           <!-- <p><?php // echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></p>
           <p><?php // echo do_shortcode('[wpuf-meta name="material"]'); ?></p>
           <p><?php // echo do_shortcode('[wpuf-meta name="how_to_make"]'); ?></p>
           <p><?php // echo do_shortcode('[wpuf-meta name="notice_and_teck"]'); ?></p>
           <p><?php // echo do_shortcode('[wpuf-meta name="trigger"]'); ?></p>
           <p></p> -->
       <?php endwhile; ?>
     <?php endif; ?>
   </ul>
   </div><!--  .container -->
 </div><!--  .main-column -->

<?php if(is_user_logged_in()): ?>
ログイン中
<?php endif; ?>

<div class="div"></div><!--  .div -->

<?php echo get_footer(); ?>

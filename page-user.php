<?php echo get_header(); ?>

<?php the_content(); ?>

<?php
 $currentid = get_current_user_id();
 // echo $currentid;
 get_user_favorite_post_ids($user_ID);
 ?>

<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post();?>
    <?php if(function_exists('the_ratings')){the_ratings();} ?>
  <?php endwhile; ?>
<?php endif; ?>

 <?php if(function_exists('get_highest_rated')): ?>

   <ul>
    <?php get_highest_rated(); ?>
   </ul>

 <?php endif; ?>

  <p>サンダーブレード</p>

  <?php get_sidebar('ulikebar'); ?>

<?php get_user_favorite_post_ids($user_ID); ?>


<?php echo get_footer(); ?>

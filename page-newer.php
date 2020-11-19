<!-- /* spell *get_header* and press enter */ -->
<?php echo get_header(); ?>
<?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $args_ct = array(
  'post_type' => 'article',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'paged' => $paged
  );
  $the_query_ct_newer = new WP_Query($args_ct);
 ?>
 <div class="main-column">
   <div class="container">
     <div class="flexer">
      <div class="recipe_list_wrapper">
        <div class="panel recipe_list">
          <ul class="">
            <?php if($the_query_ct_newer->have_posts()): ?>
              <?php while($the_query_ct_newer->have_posts()): $the_query_ct_newer->the_post();?>
                <?php get_template_part('template-parts/loop','article') ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
          <?php
          if ( function_exists( 'pagination' ) ) :
              pagination( $the_query_ct_newer->max_num_pages, get_query_var( 'paged' ) );
          endif;
          ?>

        </div>
      </div><!--  .recipe_list_wrapper -->


       <?php if(is_user_logged_in()): ?>
         <div class="side-column">
           <h4 class="">お気に入りした投稿</h4>
           <?php get_sidebar('favorite'); ?>
           <h4 class="">いいね！した投稿</h4>
           <?php get_sidebar('ulike'); ?>
         </div><!--  .side-column -->
       <?php endif; ?>
     </div><!--  .contents -->
   </div><!--  .container -->
 </div><!--  .main-column -->

<?php if(is_user_logged_in()): ?>
ログイン中
<?php endif; ?>


<div class="div"></div><!--  .div -->

<?php echo get_footer(); ?>

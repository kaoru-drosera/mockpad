<!-- /* spell *get_header* and press enter */ -->
<?php echo get_header(); ?>
<?php
  $paged    = get_query_var( 'paged',1 );
  $args_ct = array(
  'post_type' => 'article',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'page' => $paged
  );
  $the_query_ct = new WP_Query($args_ct);
  // var_dump(get_query_var( 'paged' ));
  // var_dump($the_query_ct);
 ?>
 <div class="main-column">
   <div class="container">
     <div class="changer">
       <p class="changer-tab tolist">新着順</p><!--  .tolist -->
       <p class="changer-tab torank">いいね！された順</p><!--  .torank -->
     </div><!--  .changer -->
     <div class="flexer">
      <div class="recipe_list_wrapper">
        <div class="panel recipe_list">
          <ul class="">
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
          <div class="readmore_wrap">
            <a href="<?php echo home_url('/newer/'); ?>" class="">もっと見る</a>
          </div><!--  .readmore_wrap -->
        </div>
        <div class="panel recipe_ranking">
          <ul class="">
            <?php
            $ulikes2 = my_top_rank_liked($user_ID);
            if ($ulikes2) :
              $paged2 = (get_query_var('paged')) ? get_query_var('paged') : 1; // If you want to include pagination
              $ulikes2_query = new WP_Query(array(
                'post_type' => 'article', // If you have multiple post types, pass an array
                'posts_per_page' => -1,
                'ignore_sticky_posts' => true,
                'post__in' => $ulikes2,
                'orderby' => 'post__in'
              ));
              ?>
              <?php if ($ulikes2_query->have_posts()): ?>
                <?php while ($ulikes2_query->have_posts()): $ulikes2_query->the_post(); ?>
                  <?php
                  $article_titles2 = get_post_meta($post->ID, 'recipe_name', false);
                  foreach($article_titles2 as $article_title2): ?>
                  <?php get_template_part('template-parts/loop','mustulike') ?>
                <?php endforeach; ?>
              <?php endwhile; ?>
            <?php else: ?>
              <?php echo 'お気に入りはありません'; ?>
            <?php endif; ?>
          <?php endif; ?>
          </ul><!--  .recipe_list -->
          <div class="readmore_wrap">
            <a href="<?php echo home_url('/moreliked/'); ?>" class="">もっと見る</a>
          </div><!--  .readmore_wrap -->
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

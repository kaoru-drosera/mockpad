<?php echo get_header(); ?>

<div class="container">
  <div class="favorite">
    <div class="flexer">
      <ul class="panel panel-on recipe_list">
        <?php // ---open here--- echo do_shortcode('[user_favorites include_thumbnails ="true" include_buttons ="true" include_excerpts ="true"]'); ?>
        <?php
         ?>
         <?php // echo do_shortcode('[user_favorites user_id="" include_links="true" site_id="" include_buttons="true" post_types="article" include_thumbnails="true" thumbnail_size="thumbnail" include_excerpt="false"]'); ?>

        <?php // echo get_user_favorites_list($user_id, $site_id, $include_links, $filters, $include_button, $include_thumbnails = false, $thumbnail_size = 'thumbnail', $include_excerpt = false); ?>
        <?php
        $favorites = get_user_favorites();
        krsort($favorites);
        if ($favorites) :
        $paged    = get_query_var( 'page',1 );
        $favorites_query = new WP_Query(array(
          'post_type' => 'article', // If you have multiple post types, pass an array
          'posts_per_page' => -1,
          'ignore_sticky_posts' => true,
          'post__in' => $favorites,
          'orderby' => 'post__in',

          'paged' => $paged

        ));
        ?>
          <?php if ($favorites_query->have_posts()): ?>
            <?php while ($favorites_query->have_posts()): $favorites_query->the_post(); ?>
              <?php
               $article_titles = get_post_meta($post->ID, 'recipe_name', false);
               foreach($article_titles as $article_title): ?>
                 <?php get_template_part('template-parts/loop','favorite') ?>
              <?php endforeach; ?>
            <?php endwhile; ?>
          <?php else: ?>
            <?php echo 'お気に入りはありません'; ?>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
      <?php
      $GLOBALS['wp_query']->max_num_pages = $favorites_query->max_num_pages;
      the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_next' => true,
        'format'             => '?page=%#%',
        'current' => $paged,
        'prev_text' => __( '←前へ', 'textdomain' ),
        'next_text' => __( '次へ→', 'textdomain' )
      ));
      wp_reset_postdata();
      ?>


      <?php if(is_user_logged_in()): ?>
        <div class="side-column">
          <h4 class="">お気に入りした投稿</h4>
          <?php get_sidebar('favorite'); ?>
          <h4 class="">いいね！した投稿</h4>
          <?php get_sidebar('ulike'); ?>
        </div><!--  .side-column -->
      <?php endif; ?>
    </div><!--  .contents -->

  </div><!--  .favorite -->
</div><!--  .container -->


<p>you too slow</p>

<?php echo get_footer(); ?>

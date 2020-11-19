<?php echo get_header(); ?>

<div class="container">
  <div class="favorite">
    <div class="changer">
      <p class="changer-tab tolist">新着順</p><!--  .tolist -->
      <p class="changer-tab torank">いいね！された順</p><!--  .torank -->
    </div><!--  .changer -->
    <div class="flexer">
      <ul class="panel panel-on recipe_list">
        <?php // ---open here--- echo do_shortcode('[user_favorites include_thumbnails ="true" include_buttons ="true" include_excerpts ="true"]'); ?>
        <?php
        ?>
        <?php // echo do_shortcode('[user_favorites user_id="" include_links="true" site_id="" include_buttons="true" post_types="article" include_thumbnails="true" thumbnail_size="thumbnail" include_excerpt="false"]'); ?>

        <?php // echo get_user_favorites_list($user_id, $site_id, $include_links, $filters, $include_button, $include_thumbnails = false, $thumbnail_size = 'thumbnail', $include_excerpt = false); ?>
        <?php
        $ulikes = get_user_favorite_post_ids($user_ID);
        krsort($ulikes);
        if ($ulikes) :
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // If you want to include pagination
          $ulikes_query = new WP_Query(array(
            'post_type' => 'article', // If you have multiple post types, pass an array
            'posts_per_page' => -1,
            'ignore_sticky_posts' => true,
            'post__in' => $ulikes,
            'orderby' => 'post__in',
            'paged' => $paged
          ));
          ?>
          <?php if ($ulikes_query->have_posts()): ?>
            <?php while ($ulikes_query->have_posts()): $ulikes_query->the_post(); ?>
              <?php
              $article_titles = get_post_meta($post->ID, 'recipe_name', false);
              foreach($article_titles as $article_title): ?>
              <?php get_template_part('template-parts/loop','ulike') ?>
            <?php endforeach; ?>
          <?php endwhile; ?>
        <?php else: ?>
          <?php echo 'お気に入りはありません'; ?>
        <?php endif; ?>
      <?php endif; ?>
      <?php
      $GLOBALS['wp_query']->max_num_pages = $ulikes_query->max_num_pages;
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
      </ul><!--  .recipe_list -->
      <ul class="panel recipe_ranking">
        <?php
        $ulikes2 = get_user_favorite_post_ids($user_ID);
        if ($ulikes2) :
          $paged2 = (get_query_var('paged')) ? get_query_var('paged') : 1; // If you want to include pagination
          $ulikes2_query = new WP_Query(array(
            'post_type' => 'article', // If you have multiple post types, pass an array
            'posts_per_page' => -1,
            'ignore_sticky_posts' => true,
            'post__in' => $ulikes2,
            'orderby' => 'post__in',
            'paged' => $paged2
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
      <?php
      $GLOBALS['wp_query']->max_num_pages = $ulikes2_query->max_num_pages;
      the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_next' => true,
        'format'             => '?page=%#%',
        'current' => $paged2,
        'prev_text' => __( '←前へ', 'textdomain' ),
        'next_text' => __( '次へ→', 'textdomain' )
      ));
      wp_reset_postdata();
      ?>
      </ul><!--  .recipe_list -->


      <?php if(is_user_logged_in()): ?>
        <div class="side-column">
          <h4 class="">お気に入りした投稿</h4>
          <?php get_sidebar('favorite'); ?>
          <h4 class="">いいね！した投稿</h4>
          <?php get_sidebar('ulike'); ?>
        </div><!--  .side-column -->
      <?php endif; ?>

    </div><!--  .flexer -->
  </div><!--  .favorite -->
</div><!--  .container -->


<p>you too slow</p>

<?php echo get_footer(); ?>

<?php echo get_header(); ?>

<div class="container">
  <div class="favorite">
    <div class="flexer">
      <ul class="recipe_list">
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
            'orderby' => 'post__in'
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
      </ul><!--  .recipe_list -->

      <?php $count = wp_ulike_get_post_likes($post->ID);
      echo $count; ?>

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

<?php
$favorites = get_user_favorites();
krsort($favorites);
if ($favorites) :
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // If you want to include pagination
$favorites_query = new WP_Query(array(
  'post_type' => 'article', // If you have multiple post types, pass an array
  'posts_per_page' => -1,
  'ignore_sticky_posts' => true,
  'post__in' => $favorites,
  'orderby' => 'post__in'
));
?>
  <?php if ($favorites_query->have_posts()): ?>
    <?php while ($favorites_query->have_posts()): $favorites_query->the_post(); ?>
      <?php
       $article_titles = get_post_meta($post->ID, 'recipe_name', false);
       foreach($article_titles as $article_title): ?>
         <?php get_template_part('template-parts/loop','sidebar_favorite') ?>
      <?php endforeach; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <?php echo 'お気に入りはありません'; ?>
  <?php endif; ?>
<?php endif; ?>

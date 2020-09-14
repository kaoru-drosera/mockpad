<!-- /* spell *wp_category* and press enter */ -->
<?php
  // $cat = get_the_category();
  //
  // $catid = $cat[0]->cat_ID; // ID
  // $cat_name = $cat[0]->cat_name; // カテゴリ名
  // $cat_slug = $cat[0]->category_nicename; // カテゴリスラッグ
  // $cat_link = get_category_link($catid); // カテゴリスラッグからリンク取得

  $args_ct = array(
  'post_type' => 'article',
  'post_status' => 'publish',
  'posts_per_page' => 6
  );
  $the_query_ct = new WP_Query($args_ct);

 ?>
 <li id="post-<?php the_ID(); ?>" <?php post_class('portfolio-card'); ?> >
   <a href="<?php the_permalink(); ?>">
    <p><?php echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></p>
    <p><?php echo do_shortcode('[wpuf-meta name="material"]'); ?></p>
    <p><?php echo do_shortcode('[wpuf-meta name="how_to_make"]'); ?></p>
    <p><?php echo do_shortcode('[wpuf-meta name="notice_and_teck"]'); ?></p>
    <p><?php echo do_shortcode('[wpuf-meta name="trigger"]'); ?></p>
  </a>

</li><!--  .portfolio-card -->

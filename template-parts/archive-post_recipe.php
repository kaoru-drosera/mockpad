<!-- /* spell *wp_category* and press enter */ -->
<?php
  $cat = get_the_category();

  $catid = $cat[0]->cat_ID; // ID
  $cat_name = $cat[0]->cat_name; // カテゴリ名
  $cat_slug = $cat[0]->category_nicename; // カテゴリスラッグ
  $cat_link = get_category_link($catid); // カテゴリスラッグからリンク取得
 ?>
 <li id="post-<?php the_ID(); ?>" <?php post_class('portfolio-card'); ?> >
   <a href="<?php the_permalink(); ?>">
    <p><?php echo post_custom("recipe_name"); ?></p>
    <p><?php echo post_custom("material"); ?></p>
    <p><?php echo post_custom("how_to_make"); ?></p>
    <p><?php echo post_custom("notice_and_teck"); ?></p>
    <p><?php echo post_custom("trigger"); ?></p>

  </a>

</li><!--  .portfolio-card -->

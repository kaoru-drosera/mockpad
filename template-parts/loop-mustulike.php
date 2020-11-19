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
   <li id="post-<?php the_ID(); ?>" <?php post_class('recipe-card'); ?> >
     <a class="recipe-card-link" href="<?php the_permalink(); ?>">
       <span class="recipe_ttl">
         <h3 class="recipe_name"><?php echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></h3><!--  .recipe_name -->
       </span>
       <span class="material_wrap">
         <p class="front-material">
           <?php
           $material_param = do_shortcode('[wpuf-meta name="material"]');
           if(mb_strlen($material_param, 'UTF-8')>40){
            	$content= mb_substr(strip_tags($material_param), 0, 40, 'UTF-8');
            	echo $content.'…';
            }else{
            	echo $material_param;
            };
            // 字数制限
            // https://www.m-hand.co.jp/program/5130/
            ?>
         </p>
         <p class="front-howtomake">
           <?php // echo do_shortcode('[wpuf-meta name="how_to_make"]'); ?>
           <?php
           $how_to_make_param = do_shortcode('[wpuf-meta name="how_to_make"]');
           if(mb_strlen($how_to_make_param, 'UTF-8')>40){
            	$content= mb_substr(strip_tags($how_to_make_param), 0, 40, 'UTF-8');
            	echo $content.'…';
            }else{
            	echo $how_to_make_param;
            };
            // 字数制限
            // https://www.m-hand.co.jp/program/5130/
            ?>
         </p>
       </span>
     </a>
       <!-- <p><?php // echo do_shortcode('[wpuf-meta name="notice_and_teck"]'); ?></p>
       <p><?php // echo do_shortcode('[wpuf-meta name="trigger"]'); ?></p> -->
       <p><?php echo do_shortcode("[wp_ulike]"); ?><?php // if(function_exists('the_ratings')) { the_ratings(); } ?></p>

   </li><!--  .portfolio-card -->

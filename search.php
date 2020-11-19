<?php echo get_header(); ?>

<section class="main-column">
  <div class="container">
    <p>「<?php the_search_query(); ?>」の検索結果</p>
    <div class="flexer">
      <div class="recipe_list_wrapper">
        <div class="panel recipe_list">
          <ul class="">
            <?php
            // $cat = get_the_category();
            //
            // $catid = $cat[0]->cat_ID; // ID
            // $cat_name = $cat[0]->cat_name; // カテゴリ名
            // $cat_slug = $cat[0]->category_nicename; // カテゴリスラッグ
            // $cat_link = get_category_link($catid); // カテゴリスラッグからリンク取得

            $paged    = get_query_var( 'page',1 );
            $args_ct = array(
              'post_type' => 'article',
              'post_status' => 'publish',
              'posts_per_page' => 6,
              's' => $_GET['s'],
              'paged' => $paged

            );

            $the_query_ct = new WP_Query($args_ct);
            // var_dump(get_query_var( 'paged' ));
            // var_dump($the_query_ct);

            ?>
            <?php if($the_query_ct->have_posts()): ?>
              <?php
              if (isset($_GET['s']) && empty($_GET['s'])) {
                echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
              } else {
                echo '“'.$_GET['s'] .'”の検索結果：'.$wp_query->found_posts .'件'; // 検索キーワードと該当件数を表示
              }
              ?>
              <!-- /* spell *wp_category* and press enter */ -->
              <?php while($the_query_ct->have_posts()): $the_query_ct->the_post();?>
                <?php get_template_part('template-parts/loop','article') ?>
              <?php endwhile; ?>
            <?php else: ?>
              <p>検索結果がありません</p>
            <?php endif; ?>
          </ul>
          <?php
          $GLOBALS['wp_query']->max_num_pages = $the_query_ct->max_num_pages;
          the_posts_pagination(array(
            'screen_reader_text' => ' ',
            'prev_next' => true,
            // 'format'             => '?page=%#%',
            'current' => $paged,
            'prev_text' => __( '←前へ', 'textdomain' ),
            'next_text' => __( '次へ→', 'textdomain' )
            ));
            wp_reset_postdata();
            ?>
          </div>
      </div><!--  .recipe_list_wrapper -->

    </div><!--  .flexer -->
  </div><!--  .container -->
</section><!--  .main-column -->

<?php echo get_footer(); ?>

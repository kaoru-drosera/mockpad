<!-- /* spell *wp_loop+* and press enter */ -->
<?php echo get_header(); ?>

<style>
th
{
  text-align: left;
}
</style>
<?php
  $args_ct = array(
  'post_type' => 'article',
  'post_status' => 'publish',
  'posts_per_page' => 6
  );
  $the_query_ct = new WP_Query($args_ct);
 ?>

    <section class="main-contents">
      <div class="container">
        <div class="single main-column">
          <div class="recipe-ttl-wrap">
            <h3 class="single recipe_ttl"><?php echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></h3><!--  .recipe-ttl -->
          </div><!--  .recipe-ttl-wrap -->
          <div class="material-wrap">
            <div class="tbn-imgwrap">
              <?php if(has_post_thumbnail()): ?>
                <?php echo do_shortcode('[wpuf-meta name="how_to_make" type="image"]');; ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pnenoimgs015.gif" alt="noimg">
              <?php endif; ?>
            </div><!--  .tbn-imgwrap -->
            <div class="material">
              <h4 class="material_h4">材料</h4><!--  .material_h4 -->
              <div class="material_content">
                <p>
                <?php
                   $material_params = explode("\n",do_shortcode('[wpuf-meta name="material"]'));
                   foreach($material_params as $material_param){
                      echo '<p>'. $material_param ."</p>\n";
                   }
                 ?>
                </p>
              </div><!--  .material_content -->
            </div><!--  .material -->
          </div><!--  .material-wrap -->
          <div class="htm-wrap">
            <div class="howtomake">
              <h4 class="htm_h4">作り方</h4><!--  .htm_ttl -->
              <div class="htm-contents">
                <p>
                  <?php
                     $how_to_make_params = explode("\n",do_shortcode('[wpuf-meta name="how_to_make"]'));
                     foreach($how_to_make_params as $how_to_make_param){
                        echo '<p>'. $how_to_make_param ."</p>\n";
                     }
                   ?>
                </p>
              </div><!--  .htm-contents -->
            </div><!--  .howtomake -->
          </div><!--  .htm-wrap -->
          <div class="notice-wrap">
            <div class="notice_and_teck">
              <h4 class="nat_h4">注意点・コツ</h4><!--  ._h4 -->
              <div class="nat_content">
                <p>
                  <?php
                     $notice_and_teck_params = explode("\n",do_shortcode('[wpuf-meta name="notice_and_teck"]'));
                     foreach($notice_and_teck_params as $notice_and_teck_param){
                        echo '<p>'. $notice_and_teck_param ."</p>\n";
                     }
                   ?>

                </p>
              </div><!--  .nat_content -->
            </div><!--  .notice_and_teck -->
            <div class="trigger">
              <h4 class="trigger_h4">作ろうと思ったきっかけ</h4><!--  ._h4 -->
              <div class="trigger_content">
                <p>
                  <?php
                     $trigger_params = explode("\n",do_shortcode('[wpuf-meta name="trigger"]'));
                     foreach($trigger_params as $trigger_param){
                        echo '<p>'. $trigger_param ."</p>\n";
                     }
                   ?>

                </p>
              </div><!--  .trigger_content -->
            </div><!--  .trigger -->
          </div><!--  .notice-wrap -->
          <div class="fav_and_good">
            <div class="fav-wrapper">
              <?php echo get_favorites_button(get_the_ID()); ?>
            </div><!--  .fav-wrapper -->
            <div class="good-wrapper">
              <?php echo do_shortcode("[wp_ulike]"); ?>
            </div><!--  .good-wrapper -->
          </div><!--  .fav_and_good -->
        </div><!--  .main-column -->
      </div><!--  .container -->
    </section><!--  .main-contents -->


    <!-- <table>
      <thead>
        <tr>
          <th>レシピ名:</th>
          <td><?php // echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>材料:</th>
          <td><?php // echo do_shortcode('[wpuf-meta name="material"]'); ?></td>
        </tr>
        <tr>
          <th>作り方:</th>
          <td><?php // echo do_shortcode('[wpuf-meta name="how_to_make"]'); ?></td>
        </tr>
        <tr>
          <th>注意・コツ:</th>
          <td><?php // echo do_shortcode('[wpuf-meta name="notice_and_teck"]'); ?></td>
        </tr>
        <tr>
          <th>作ろうと思ったきっかけ:</th>
          <td><?php // echo do_shortcode('[wpuf-meta name="trigger"]'); ?></td>
        </tr>
        <tr>
          <th>お気に入りに登録する:</th>
          <td><?php echo get_favorites_button(get_the_ID()); ?></td>
        </tr>
        <tr>
          <th>イイね！ボタン:</th>
          <td><?php echo do_shortcode("[wp_ulike]"); ?><?php  // if(function_exists('the_ratings')) { the_ratings(); } ?></td>
        </tr>
      </tbody>
    </table> -->





<?php echo get_footer(); ?>

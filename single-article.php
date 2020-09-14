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

<?php if($the_query_ct->have_posts()): ?>
  <?php while($the_query_ct->have_posts()): $the_query_ct->the_post();?>

    <table>
      <thead>
        <tr>
          <th>レシピ名:</th>
          <td><?php echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>材料:</th>
          <td><?php echo do_shortcode('[wpuf-meta name="material"]'); ?></td>
        </tr>
        <tr>
          <th>作り方:</th>
          <td><?php echo do_shortcode('[wpuf-meta name="how_to_make"]'); ?></td>
        </tr>
        <tr>
          <th>注意・コツ:</th>
          <td><?php echo do_shortcode('[wpuf-meta name="notice_and_teck"]'); ?></td>
        </tr>
        <tr>
          <th>作ろうと思ったきっかけ:</th>
          <td><?php echo do_shortcode('[wpuf-meta name="trigger"]'); ?></td>
        </tr>
      </tbody>
    </table>

  <?php endwhile; ?>
<?php endif; ?>




<?php echo get_footer(); ?>

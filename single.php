<!-- /* spell *wp_loop+* and press enter */ -->
<?php echo get_header(); ?>

<style>
  th
  {
    text-align: left;
  }
</style>
<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post();?>
    <table>
      <thead>
        <tr>
          <th>レシピ名:</th>
          <td><?php echo post_custom("recipe_name"); ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>材料:</th>
          <td><?php echo post_custom("material"); ?></td>
        </tr>
        <tr>
          <th>作り方:</th>
          <td><?php echo post_custom("how_to_make"); ?></td>
        </tr>
        <tr>
          <th>注意・コツ:</th>
          <td><?php echo post_custom("notice_and_teck"); ?></td>
        </tr>
        <tr>
          <th>作ろうと思ったきっかけ:</th>
          <td><?php echo post_custom("trigger"); ?></td>
        </tr>
      </tbody>
    </table>

    <p><?php echo do_shortcode('[wpuf-meta name="recipe_name"]'); ?></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
  <?php endwhile; ?>
<?php endif; ?>


<?php echo get_footer(); ?>

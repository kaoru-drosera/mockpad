<!-- /* spell *wp_loop+* and press enter */ -->
<?php echo get_header(); ?>

<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post();?>
    <?php get_template_part('template-parts/loop','post_recipe') ?>
  <?php endwhile; ?>
<?php endif; ?>

<style>
  th
  {
    text-align: left;
  }
</style>

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
<p><?php echo do_shortcode('[wpuf-meta name="material"]'); ?></p>
<p><?php echo do_shortcode('[wpuf-meta name="how_to_make"]'); ?></p>
<p><?php echo do_shortcode('[wpuf-meta name="notice_and_teck"]'); ?></p>
<p><?php echo do_shortcode('[wpuf-meta name="trigger"]'); ?></p>



<?php echo get_footer(); ?>

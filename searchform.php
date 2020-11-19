<form action="<?php echo home_url('/'); ?>" class="header_search" method="get">
  <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="レシピを検索">
  <input type="submit" value="検索">
  <i class="fas fa-search"></i>
</form><!--  .header_search -->

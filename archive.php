<?php
get_header();
?>
<section class="post-list">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="post-item cf">
    <h2 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <span class="item-meta">Category: <?php the_category(', ')?> &bull; Posted: <?php the_date(); ?></span>
    <?php the_excerpt(); ?>
  </div>
  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
  <?php get_template_part('pagination'); ?>
</section>
<?php
get_footer();
?>

<?php
get_header();
?>
<section class="home-bio cf h-card">
  <h1><img class="avatar u-photo" alt="DJ Madeira" src="<?php echo get_template_directory_uri() . "/img/avatar.jpg"; ?>">I'm <span class="p-name">DJ Madeira</span>. I love making stuff.</h1>
  <a class="mf-hide u-url" href="//djmadeira.com">Home Page</a>
  <p>I love to solve problems. I love to tell stories. This is my blog. <a href="<?php echo get_site_url() . "/about/"; ?>">More about me.</a></p>
</section>
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

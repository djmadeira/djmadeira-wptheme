<?php
get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="entry cf">
  <?php the_post_thumbnail('single', array('class' => 'single-featured-image')) ?>
  <h1><?php the_title(); ?></h1>
  <aside class="post-meta">
    <span class="post-published">Published: <?php the_date(); ?></span>
    <span class="post-modified">Last updated: <?php the_modified_date(); ?>.</span>
    <span class="post-category">Category: <?php the_category(', '); ?>.</span>
    <span class="post-comments-link"><a href="#comments"><?php comments_number(); ?></a></span>
  </aside>
  <?php the_content(); ?>
  <div class="author-about">
    <h2>Written by DJ Madeira</h2>
    <p>I'm a programmer and geek culture enthusiast. I love to make things that make people happier, smarter and better. Mostly though, I just love making things. <a href="<?php echo get_site_url() . "/about/"; ?>">More about me.</a></p>
    <div class="author-links"><a href="https://twitter.com/dj_madeira">Twitter</a> &bull; <a href="<?php echo get_feed_link(); ?>">RSS</a></div>
  </div>
</article>
<?php comments_template(); ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php
get_footer();
?>

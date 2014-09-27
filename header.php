<!doctype html>
<html>
<head>
  <title><?php wp_title( '-', true, 'right' ); ?><?php bloginfo('name') ?> - <?php bloginfo('description') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (is_page() || is_single() ) { ?>
  <meta property="twitter:card" content="summary" />
  <meta property="twitter:site" content="@dj_madeira" />
  <meta property="twitter:creator" content="@dj_madeira" />
  <meta property="twitter:title" content="<?php the_title() ?>" />
  <meta property="twitter:description" content="<?php
    $e = get_the_excerpt();
    if ($e != '') {
      echo $e;
    } else {
      $cats = get_the_category();
      $output = 'Posted in ';
      $i=0;
      foreach ($cats as $cat) {
        $i++;
        $output .= $cat->name . ($i === count($cats) ? ' ' : ', ');
      }
      $output .= 'on ' . get_the_date() . '.';
      echo $output;
    } ?>" />
  <meta property="twitter:image" content="<?php $t = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); echo $t[0]; ?>"
   />
  <meta property="twitter:url" content="<?php the_permalink(); ?>" />
  <?php } // End if page ?>
  <?php
  wp_head();
  ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
<header class="main-header cf">
  <h1 class="site-title"><a href="<?php echo bloginfo('url'); ?>"><?php bloginfo('name') ?></a></h1>
  <a rel="navigation" class="nav-link" href="#nav">Go to navigation</a>
  <div class="search-form">
    <form role="search" method="get" action="<?php echo home_url('/') ?>">
      <input name="s" id="s" type="search" value="<?php the_search_query(); ?>">
      <input type="submit" value="Search">
    </form>
  </div>
</header>
<main>

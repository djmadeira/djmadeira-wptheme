<?php
get_header();

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['home'] = array(
  'profile_img' => get_template_directory_uri() . '/img/avatar.jpg'
);
$templates = array('index.twig');

Timber::render($templates, $context);

get_footer();
?>

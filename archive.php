<?php
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['page'] = array(
  'title' => get_the_archive_title()
);
$context['pagination'] = Timber::get_pagination();
Timber::render('archive.twig', $context);

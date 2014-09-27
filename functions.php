<?php
function dj_init_stuff () {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'html5' );
  add_image_size('single', 920, 400, true);
  register_nav_menu( 'Footer - Pages', 'For pages. Goes in the footer.' );
  register_nav_menu( 'Footer - Categories', 'For categories. Goes in the footer.' );
  register_nav_menu( 'Footer - Links', 'For social media and all that rot. You know the drill.' );

}
add_action('init', 'dj_init_stuff');

function dj_load_styles () {
  //wp_enqueue_style('fonts', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', false, filemtime(get_stylesheet_directory() . '/css/main.css'));
  if (WP_DEBUG === true) {
    wp_enqueue_script('livereload', 'http://localhost:35729/livereload.js');
  }
}
add_action('wp_enqueue_scripts', 'dj_load_styles' );

function dj_write_header() {
  ?>
  <style>
  <?php include(get_template_directory() . '/css/crit.css'); ?>
  </style>
  <?php if ( !current_user_can('edit_posts') ) { ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52762193-1', 'auto');
  ga('send', 'pageview');

  </script>
  <?php } ?>
  <script>
  function loadCSS(e,t,n){"use strict";var i=window.document.createElement("link");var o=t||window.document.getElementsByTagName("script")[0];i.rel="stylesheet";i.href=e;i.media="only x";o.parentNode.insertBefore(i,o);setTimeout(function(){i.media=n||"all"})}
  loadCSS('http://fonts.googleapis.com/css?family=Oswald:400,300');
  </script>
  <script async src=<?php echo get_template_directory_uri() . '/js/site.js?' . filemtime(get_stylesheet_directory() . '/js/site.js'); ?>></script>
  <?php
}
add_action('wp_head', 'dj_write_header');

function dj_add_comment_captcha( $fields ) {
  $operation = rand(1,3);
  $num_one = rand(1, 5);
  $num_two = rand(1, 5);
  switch ($operation) {
    case 1:
      $op_text = 'Multiply';
      $preposition = 'by';
      $answer = $num_one * $num_two;
      break;
    case 2:
      $num_one = rand(1, $num_two);
      $op_text = 'Take';
      $preposition = 'away from';
      $answer = $num_two - $num_one;
      break;
    default:
      $op_text = 'Add';
      $preposition = 'and';
      $answer = $num_one + $num_two;
  }

  $output = '<p class="comment-form-captcha"><label for="captcha">' . $op_text . ' ' . $num_one . ' ' . $preposition . ' ' . $num_two . ' (to prove you\'re not a spam robot).<span class="required">*</span></label>' . '<input id="captcha" name="captcha" type="text" size="2" aria-required="true"></p><input name="captcha-answer" type="hidden" value="' . $answer . '">';

  $fields['captcha'] = $output;
  return $fields;
}
add_filter( 'comment_form_default_fields', 'dj_add_comment_captcha' );

function dj_validate_comment_captcha ($ID) {
  $answer = $_POST['captcha-answer'];
  $user_answer = $_POST['captcha'];
  if ($answer != $user_answer) {
    wp_die('Captcha answer was incorrect');
  }
}
add_action( 'pre_comment_on_post', 'dj_validate_comment_captcha' );

?>

<?php if (have_comments() && comments_open()) { ?>
<article id="comments" class="comments">
  <header>
    <h1>Comments</h1>
    <?php if ( comments_open() ) { ?><a href="#respond">Leave a comment?</a><?php } ?>
  </header>
  <ul class="comments-list cf">
    <?php
    wp_list_comments(array(
      'per_page' => '30',
      'reverse_top_level' => true,
      'type' => 'comment',
      'avatar_size' => 50
    ));
    ?>
  </ul>

  <?php
    comment_form();
  ?>
</article>
<?php } ?>

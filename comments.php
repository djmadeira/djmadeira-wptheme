<?php if (comments_open()) { ?>
<article id="comments" class="comments">
  <header>
    <h1>Comments</h1>
    <?php if ( comments_open() ) { ?><?php if ( have_comments() ) { ?><a href="#respond">Leave a comment?</a><?php } ?><?php } ?>
  </header>
  <?php if (have_comments()) { ?>
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
  <?php } else { ?>
    <p>No comments yet. Maybe you'll be the first?</p>
  <?php } ?>
  <?php
    comment_form();
  ?>
</article>
<?php } ?>

</main>
<footer class="site-footer">
  <nav id="nav" class="main-nav cf">
    <?php wp_nav_menu(array('theme_location'  => 'Footer - Pages', 'container_class' => 'menu-pages-wrapper menu-wrapper', 'items_wrap' => '<h3>Pages</h3><ul class="nav %2$s">%3$s</ul>')); ?>
    <?php wp_nav_menu(array('theme_location'  => 'Footer - Categories', 'container_class' => 'menu-categories-wrapper menu-wrapper', 'items_wrap' => '<h3>Categories</h3><ul class="nav %2$s">%3$s</ul>')); ?>
    <?php wp_nav_menu(array('theme_location'  => 'Footer - Links', 'container_class' => 'menu-links-wrapper menu-wrapper', 'items_wrap' => '<h3>Me Other Places</h3><ul class="nav %2$s">%3$s</ul>')); ?>
  </nav>
  <div class="copyright">
    <p>&copy; <?php echo date('Y'); ?> DJ Madeira. Site desiged &amp; coded by me.</p>
  </div>
</footer>
</div>
<?php wp_footer() ?>
</body>
</html>

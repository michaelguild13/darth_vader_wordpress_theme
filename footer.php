  <section class="row section">
    <div class="col-sm-8 col-sm-offset-2 text-center">
      <?php if (get_theme_mod('darth_social_facebook')) :?>
        <a href="<?php echo get_theme_mod('darth_social_facebook')?>" class="socialico h1">F</a>
      <?php endif; ?>
      <?php if (get_theme_mod('darth_social_twitter')) :?>
        <a href="<?php echo get_theme_mod('darth_social_twitter')?>" class="socialico h1">L</a>
      <?php endif; ?>
      <?php if (get_theme_mod('darth_copyright')) :?>
        <p><span class="sr-only">Join the dark side, we have cookies</span></p>
        <p><span class="text-box"><?php echo get_theme_mod('darth_copyright')?></span><p>
      <?php endif; ?>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <?php wp_footer(); ?>
</body>
</html>

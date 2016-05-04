<?php get_header(); ?>
<section class="row section" style="background-image:url(<?php header_image()?>); padding: 190px 0;">
  <div class="col-sm-3 col-sm-offset-2">

    <?php if ( get_theme_mod('darth_logo') ) : ?>
      <img class="center-block img-responsive img-invert" src="<?php echo esc_url( get_theme_mod( 'darth_logo' ) ); ?>" alt="<?php get_bloginfo( 'name' ); ?>" />
    <?php endif; ?>

    <?php if (get_theme_mod('darth_form_action')) :?>
      <form class="panel-body" action="<?php echo get_theme_mod('darth_form_action')?>" method="POST">
        <div class="form-group">
          <label for="email" class="sr-only">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" oninvalid="this.setCustomValidity(this.willValidate?'':'Please enter a valid email address')" required />
        </div>
        <div class="form-group">
          <label for="zipCode" class="sr-only">Email address</label>
          <input type="text" name="zip" class="form-control" id="zipCode" placeholder="Zip Code"  pattern="[0-9]{5}" oninvalid="this.setCustomValidity(this.willValidate?'':'Please enter valid zip')"  required />
        </div>
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign Up" />
      </form>
    <?php endif; ?>

  </div>
</section>

<?php
  if ( have_posts() && is_sticky() ) :
    while ( have_posts() ) : the_post();
      get_template_part( 'front-page-section', get_post_format() );
    endwhile;
  endif;
?>
<?php
  if (get_theme_mod('darth_instagram_connect')) {
    get_template_part( 'page-section-instagram' );
  } else {
    set_theme_mod('darth_instagram', '');
  };
?>

<?php get_footer(); ?>

<?php get_header(); ?>

<?php
  $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
  if ( $feat_image ) {
    $style = "background-image:url($feat_image); background-size:cover;";
  } else {
    $style = "background-color: #19191c";
  };
?>

<section class="section" style="<?php echo $style ?>">
  <h2><?php the_title(); ?></h2>
  <?php edit_post_link(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <?php the_content(); ?>
  <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>

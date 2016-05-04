<?php
  $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
  if ( $feat_image ) {
    $style = "background-image:url($feat_image); background-size:cover";
  } else {
    $style = "background-color: #19191c";
  };
?>

<section class="row section" style="<?php echo $style ?>">
  <div class="col-sm-8 col-sm-offset-2 text-center">
    <h2><?php the_title(); ?></h2>
    <?php edit_post_link(sprintf( __( '<p>Edit</p>'))); ?>
  	<?php
  		the_content();
  		wp_link_pages();
  	?>
  </div>
</section>

<?php

  // Instagram Plugin
  require 'libs/Instagram.php';
  use MetzWeb\Instagram\Instagram;
  $redirectUrl = 'http://vader3.wideeyeclient.com/';
  // initialize class
  $instagram = new Instagram(array(
      'apiKey' => '706e32499de24d5197ead2676da57559',
      'apiSecret' => 'babe8ff18485455caf52a1ab82707924',
      'apiCallback' => $redirectUrl
  ));
  // get token url
  $loginUrl = $instagram->getLoginUrl();
  $code = $_GET["code"];
  // check whether the user has granted access
  if (isset($code)) {
    // receive OAuth token object
    $data = $instagram->getOAuthToken($code);
    $username = $data->user->username;
    // store user access token
    $instagram->setAccessToken($data);
    set_theme_mod('darth_instagram', $instagram);

    // Strip the Url Param
    echo "<script>window.location.replace('$redirectUrl')</script>";
  } else {
    // check whether an error occurred
    if (isset($_GET['error'])) {
        echo 'An error occurred: ' . $_GET['error_description'];
    }
  }

  if (get_theme_mod('darth_instagram')) {
    $darth_instagram = get_theme_mod('darth_instagram');
    $result = $darth_instagram->getUserMedia();
  };
?>

<?php
  $feat_image = get_theme_mod('darth_instagram_bg');
  if ( $feat_image ) {
    $style = "background-image:url($feat_image); background-size: cover;";
  } else {
    $style = "background-color: #19191c";
  };
?>
  <section class="row section" style="<?php echo $style ?>">
    <div class="col-sm-8 col-sm-offset-2 text-center">
      <h2><?php echo get_theme_mod('darth_instagram_title'); ?></h2>
      <p><?php echo get_theme_mod('darth_instagram_description'); ?></p>
      <div class="row instagram-gallery">

        <?php
          if ($result) {
            // display all user likes
            foreach ($result->data as $media) {
              $content = '<div class="col-sm-3">';
              // output media
              if ( $media->type === 'video') {
                // do nothing... :)
              } else {
                // image
                $image = $media->images->standard_resolution->url;
                $imagelink = $media->link;
                $content .= "<a href=\"{$imagelink}\" target=\"_blank\" ><img class=\"img-responsive\" src=\"{$image}\"/></a>";
              };
              // output media
              echo $content . '</div>';
            };
          } else {
            echo "<script>window.open('$loginUrl')</script>";
          };
        ?>

    </div>
    <div class="row">
      <div class="col-sm-4 col-sm-offset-2">
        <?php if ( get_theme_mod('darth_instagram_primary_text') ) :?>
          <a class="btn btn-primary btn-lg btn-block" href="<?php echo get_theme_mod('darth_instagram_primary_url')?>">
            <?php echo get_theme_mod('darth_instagram_primary_text')?>
          </a>
        <?php endif;?>
      </div>
      <div class="col-sm-4">
        <?php if ( get_theme_mod('darth_instagram_primary_text') ) :?>
          <a class="btn btn-danger btn-lg btn-block" href="<?php echo get_theme_mod('darth_instagram_secondary_url')?>">
            <?php echo get_theme_mod('darth_instagram_primary_text')?>
          </a>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>

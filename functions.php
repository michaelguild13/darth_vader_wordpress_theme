<?php
  // Allow SVG
  function allow_svgimg_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  };

  // Allow Menu Short Codes
  function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
  }
  add_shortcode('menu', 'print_menu_shortcode');

  // Register Theme Features
  function darth_theme_features() {
    $customHeaderArgs = array(
    	'default-image' => get_template_directory_uri() . '/img/darthvader.jpg',
    	'uploads'       => false,
      'header-text'   => false,
    );
    add_theme_support('custom-header', $customHeaderArgs);
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_filter('upload_mimes', 'allow_svgimg_types');
  };

  function darth_register_theme_menu() {
    register_nav_menu( 'cta', 'CTA Navigation Menu' );
  }

  function darth_theme_customizer( $wp_customize ) {
    // Add Custom Logo section
    $wp_customize->add_section( 'darth_logo_section' , array(
      'title' => __( 'Logo', 'darth' ),
      'priority' => 30,
      'description' => 'Upload a logo to replace the default site name and description in the header',
    ));
    $wp_customize->add_setting( 'darth_logo' );
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize, 'darth_logo', array(
        'label' => __( 'Logo', 'darth' ),
        'section' => 'darth_logo_section',
        'settings' => 'darth_logo',
      ))
    );

    // BSD Action Section
    $wp_customize->add_section( 'darth_form_section' , array(
      'title' => __( 'BSD Form', 'darth' ),
      'priority' => 30,
      'description' => 'Action Url for form submission post',
    ));
    $wp_customize->add_setting( 'darth_form_action' );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_form_action' , array(
        'label' => __( 'BSD URL action', 'darth' ),
        'section' => 'darth_form_section',
        'settings' => 'darth_form_action',
        'type' => 'text',
      ))
    );

    // Social Links Section
    $wp_customize->add_section( 'darth_social_section' , array(
      'title' => __( 'Footer Content', 'darth' ),
      'priority' => 30,
      'description' => 'Facebook & Twitter Links',
    ));
    $wp_customize->add_setting( 'darth_social_facebook' );
    $wp_customize->add_setting( 'darth_social_twitter' );
    $wp_customize->add_setting( 'darth_copyright' );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_social_facebook' , array(
        'label' => __( 'Facebook Url', 'darth' ),
        'section' => 'darth_social_section',
        'settings' => 'darth_social_facebook',
        'type' => 'text',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_social_twitter' , array(
        'label' => __( 'Twitter Url', 'darth' ),
        'section' => 'darth_social_section',
        'settings' => 'darth_social_twitter',
        'type' => 'text',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_copyright' , array(
        'label' => __( 'Copy Right Message', 'darth' ),
        'section' => 'darth_social_section',
        'settings' => 'darth_copyright',
        'type' => 'text',
      ))
    );

    // Instagram
    $wp_customize->add_section( 'darth_instagram_section' , array(
      'title' => __( 'Instagram Settings', 'darth' ),
      'priority' => 30,
      'description' => 'Instagram ',
    ));
    $wp_customize->add_setting( 'darth_instagram_connect' );
    $wp_customize->add_setting( 'darth_instagram_title' );
    $wp_customize->add_setting( 'darth_instagram_description' );
    $wp_customize->add_setting( 'darth_instagram_bg' );
    $wp_customize->add_setting( 'darth_instagram_primary_text' );
    $wp_customize->add_setting( 'darth_instagram_primary_url' );
    $wp_customize->add_setting( 'darth_instagram_secondary_text' );
    $wp_customize->add_setting( 'darth_instagram_secondary_url' );
    //http://jelled.com/instagram/lookup-user-id
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_connect' , array(
        'label' => __( 'Connect to Instagram?', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_connect',
        'type' => 'checkbox',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_title' , array(
        'label' => __( 'Instagram Section Title', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_title',
        'type' => 'text',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_description' , array(
        'label' => __( 'Instagram Section Description', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_description',
        'type' => 'textarea',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize, 'darth_instagram_bg', array(
        'label' => __( 'Background Image', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_bg',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_primary_text', array(
        'label' => __( 'Primary Button Text', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_primary_text',
        'type' => 'text',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_primary_url', array(
        'label' => __( 'Primary Button URL', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_primary_url',
        'type' => 'text',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_secondary_text', array(
        'label' => __( 'Secondary Button Text', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_secondary_text',
        'type' => 'text',
      ))
    );
    $wp_customize->add_control(
      new WP_Customize_Control( $wp_customize, 'darth_instagram_secondary_url', array(
        'label' => __( 'Secondary Button URL', 'darth' ),
        'section' => 'darth_instagram_section',
        'settings' => 'darth_instagram_secondary_url',
        'type' => 'text',
      ))
    );
  };

// Actions
add_action( 'init', 'darth_register_theme_menu' );
add_action( 'after_setup_theme', 'darth_theme_features' );
add_action('customize_register', 'darth_theme_customizer');

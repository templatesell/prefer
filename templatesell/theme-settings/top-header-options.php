<?php
$GLOBALS['prefer_theme_options'] = prefer_get_options_value();

/*Top Header Options*/
$wp_customize->add_section( 'prefer_top_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header', 'prefer' ),
   'panel' 		 => 'prefer_panel',
) );

/*callback functions header section*/
if ( !function_exists('prefer_header_active_callback') ) :
    function prefer_header_active_callback(){
      global $prefer_theme_options;
      $enable_header = absint($prefer_theme_options['prefer_enable_top_header']);
      if( 1 == $enable_header){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Top Header Section*/
$wp_customize->add_setting( 'prefer_options[prefer_enable_top_header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['prefer_enable_top_header'],
   'sanitize_callback' => 'prefer_sanitize_checkbox'
) );

$wp_customize->add_control( 'prefer_options[prefer_enable_top_header]', array(
   'label'     => __( 'Enable Top Header', 'prefer' ),
   'description' => __('Checked to show the top header section like search and social icons', 'prefer'),
   'section'   => 'prefer_top_header_section',
   'settings'  => 'prefer_options[prefer_enable_top_header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'prefer_options[prefer_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['prefer_enable_top_header_social'],
   'sanitize_callback' => 'prefer_sanitize_checkbox'
) );

$wp_customize->add_control( 'prefer_options[prefer_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'prefer' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'prefer'),
   'section'   => 'prefer_top_header_section',
   'settings'  => 'prefer_options[prefer_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'prefer_header_active_callback'
) );

/*Enable Menu in top Header*/
$wp_customize->add_setting( 'prefer_options[prefer_enable_top_header_menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['prefer_enable_top_header_menu'],
    'sanitize_callback' => 'prefer_sanitize_checkbox'
) );

$wp_customize->add_control( 'prefer_options[prefer_enable_top_header_menu]', array(
    'label'     => __( 'Menu in Header', 'prefer' ),
    'description' => __('Top Header Menu will display here. Go to Appearance < Menu.', 'prefer'),
    'section'   => 'prefer_top_header_section',
    'settings'  => 'prefer_options[prefer_enable_top_header_menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'prefer_header_active_callback'
) );

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'prefer_options[prefer_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['prefer_enable_header_image_overlay'],
   'sanitize_callback' => 'prefer_sanitize_checkbox'
) );

$wp_customize->add_control(
    'prefer_options[prefer_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'prefer' ),
       'description' => __('This option will add colors over the header image.', 'prefer'),
       'section'   => 'header_image',
       'settings'  => 'prefer_options[prefer_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('prefer_header_overlay_color_active_callback') ) :
  function prefer_header_overlay_color_active_callback(){
      global $prefer_theme_options;
      $slider_overlay = absint($prefer_theme_options['prefer_enable_header_image_overlay']);
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'prefer_options[prefer_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['prefer_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'prefer_options[prefer_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'prefer' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'prefer'),
   'section'   => 'header_image',
   'settings'  => 'prefer_options[prefer_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'prefer_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'prefer_options[prefer_slider_overlay_color]',
    array(
        'default'           => $default['prefer_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'prefer_options[prefer_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'prefer' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'prefer' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'prefer_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'prefer_options[prefer_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['prefer_slider_overlay_transparent'],
    'sanitize_callback' => 'prefer_sanitize_number'
) );
$wp_customize->add_control( 'prefer_options[prefer_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'prefer' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'prefer'),
   'section'   => 'header_image',
   'settings'  => 'prefer_options[prefer_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'prefer_header_overlay_color_active_callback',
) );
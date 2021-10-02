<?php
/**
 * Enqueue scripts and styles.
 */
function prefer_scripts() {
	global $prefer_theme_options, $wp_query;

    // Enqueue third party scripts and styles.
    wp_enqueue_style('prefer-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    wp_enqueue_style('prefer-heading', '//fonts.googleapis.com/css?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', array(), null);
    wp_enqueue_style('prefer-sign', '//fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap', array(), null);
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );
    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/grid.min.css', array(), '4.5.0' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );
    wp_enqueue_style( 'offcanvas', get_template_directory_uri() . '/assets/css/canvi.css', array(), '4.5.0' );

    // Conditionally enqueue scripts and styles.
    $masonry                  = esc_attr($prefer_theme_options['prefer-column-blog-page']);
    $prefer_pagination_option = esc_attr($prefer_theme_options['prefer-pagination-options']);
    $canvi                    = absint($prefer_theme_options['prefer_enable_offcanvas']);

    if( 'masonry-post' == $masonry )  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'prefer-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0' );
    }

    if( 'ajax' == $prefer_pagination_option )  {
        wp_enqueue_script( 'prefer-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0' );
    }

    if( 1  === $canvi )  {
        wp_enqueue_script( 'offcanvas-script', get_template_directory_uri() . '/assets/js/canvi.js', array('jquery'), '4.6.0' );
        wp_enqueue_script( 'offcanvas-custom', get_template_directory_uri() . '/assets/js/canvi-custom.js', array('jquery'), '4.6.0' );
    }

    if( 1 === absint($prefer_theme_options['prefer-enable-sticky-sidebar'])) {
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'prefer-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
    }

    // Load custom scripts and styles.
    wp_enqueue_style( 'prefer-style', get_stylesheet_uri() );
	wp_style_add_data( 'prefer-style', 'rtl', 'replace' );

	wp_enqueue_script( 'prefer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0' );

	wp_enqueue_script( 'prefer-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
	wp_enqueue_script( 'prefer-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );

    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script(
        'prefer-custom',
        'prefer_ajax',
        array(
            'ajaxurl'       => admin_url( 'admin-ajax.php' ),
            'paged'         => $paged,
            'max_num_pages' => $max_num_pages,
            'next_posts'    => next_posts( $max_num_pages, false ),
            'show_more'     => __( 'View More', 'prefer' ),
            'no_more_posts' => __( 'No More', 'prefer' ),
        )
    );

	wp_enqueue_script( 'prefer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

    // Enqueue comment scripts and styles.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'prefer_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function prefer_block_styles() {
    wp_enqueue_style( 'prefer-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );
    wp_enqueue_style('prefer-editor-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    wp_enqueue_style('prefer-editor-heading', '//fonts.googleapis.com/css?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', array(), null);

    $prefer_custom_css = '
        .edit-post-visual-editor.editor-styles-wrapper{ font-family: Muli;}

        .editor-post-title__block .editor-post-title__input,
        .editor-styles-wrapper h1,
        .editor-styles-wrapper h2,
        .editor-styles-wrapper h3,
        .editor-styles-wrapper h4,
        .editor-styles-wrapper h5,
        .editor-styles-wrapper h6{
            font-family: Josefin Sans;
    }';

    wp_add_inline_style( 'prefer-editor-styles', $prefer_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'prefer_block_styles' );


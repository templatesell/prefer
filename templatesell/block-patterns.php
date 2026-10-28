<?php
/**
 * Block patterns and block styles.
 *
 * @package Prefer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'prefer_register_block_patterns' ) ) :
	/**
	 * Register the pattern category and the patterns themselves.
	 */
	function prefer_register_block_patterns() {

		if ( ! function_exists( 'register_block_pattern' ) ) {
			return;
		}

		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'prefer',
				array( 'label' => __( 'Prefer', 'prefer' ) )
			);
		}

		register_block_pattern(
			'prefer/intro-heading',
			array(
				'title'      => __( 'Intro heading with lead paragraph', 'prefer' ),
				'categories' => array( 'prefer', 'text' ),
				'content'    => '<!-- wp:group {"align":"wide"} --><div class="wp-block-group alignwide">'
					. '<!-- wp:heading {"level":2,"textAlign":"center"} -->'
					. '<h2 class="wp-block-heading has-text-align-center">' . esc_html__( 'Words worth reading', 'prefer' ) . '</h2>'
					. '<!-- /wp:heading -->'
					. '<!-- wp:paragraph {"align":"center"} -->'
					. '<p class="has-text-align-center">' . esc_html__( 'Open with a short line that tells the reader what this post is about and why it is worth their time.', 'prefer' ) . '</p>'
					. '<!-- /wp:paragraph --></div><!-- /wp:group -->',
			)
		);

		register_block_pattern(
			'prefer/two-column-feature',
			array(
				'title'      => __( 'Two column feature', 'prefer' ),
				'categories' => array( 'prefer', 'columns' ),
				'content'    => '<!-- wp:columns {"align":"wide"} --><div class="wp-block-columns alignwide">'
					. '<!-- wp:column --><div class="wp-block-column">'
					. '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__( 'On the page', 'prefer' ) . '</h3><!-- /wp:heading -->'
					. '<!-- wp:paragraph --><p>' . esc_html__( 'Use this column for the story itself, and the one beside it for a detail, a quote or an aside.', 'prefer' ) . '</p><!-- /wp:paragraph -->'
					. '</div><!-- /wp:column -->'
					. '<!-- wp:column --><div class="wp-block-column">'
					. '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__( 'In the margin', 'prefer' ) . '</h3><!-- /wp:heading -->'
					. '<!-- wp:paragraph --><p>' . esc_html__( 'Short supporting notes sit well here, close to the paragraph they belong to.', 'prefer' ) . '</p><!-- /wp:paragraph -->'
					. '</div><!-- /wp:column --></div><!-- /wp:columns -->',
			)
		);

		register_block_pattern(
			'prefer/pull-quote',
			array(
				'title'      => __( 'Pull quote with attribution', 'prefer' ),
				'categories' => array( 'prefer', 'text' ),
				'content'    => '<!-- wp:quote {"className":"is-style-prefer-bordered"} -->'
					. '<blockquote class="wp-block-quote is-style-prefer-bordered">'
					. '<!-- wp:paragraph --><p>' . esc_html__( 'A quotation set in the theme serif, sized to sit apart from the body copy without shouting.', 'prefer' ) . '</p><!-- /wp:paragraph -->'
					. '<cite>' . esc_html__( 'Attribution', 'prefer' ) . '</cite>'
					. '</blockquote><!-- /wp:quote -->',
			)
		);
	}
endif;
add_action( 'init', 'prefer_register_block_patterns' );

if ( ! function_exists( 'prefer_register_block_styles' ) ) :
	/**
	 * Register block styles that reuse the theme's own look.
	 */
	function prefer_register_block_styles() {

		if ( ! function_exists( 'register_block_style' ) ) {
			return;
		}

		register_block_style(
			'core/quote',
			array(
				'name'  => 'prefer-bordered',
				'label' => __( 'Bordered', 'prefer' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'prefer-rounded',
				'label' => __( 'Rounded', 'prefer' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'  => 'prefer-outline',
				'label' => __( 'Outline', 'prefer' ),
			)
		);
	}
endif;
add_action( 'init', 'prefer_register_block_styles' );

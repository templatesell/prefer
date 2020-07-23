<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prefer
 */
global $prefer_theme_options;
$copyright = wp_kses_post($prefer_theme_options['prefer-footer-copyright']);
if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) {
	$count = 0;
	for ( $i = 1; $i <= 4; $i++ )
	{
		if ( is_active_sidebar( 'footer-' . $i ) )
		{
			$count++;
		}
	}
	
	$footer_col= 4;
	if( $count == 4 )
	{
		$footer_col= 4;
	}
	elseif( $count == 3)
	{
		$footer_col= 3;
	}
	elseif( $count == 2)
	{
		$footer_col= 2;
	}
	elseif( $count == 1)
	{
		$footer_col= 1;
	}
}

?>
<?php if(is_active_sidebar('post-area')){ ?>
<div class="post-area slider-below-widget-wrapper">
	<div class="container">
		<?php dynamic_sidebar( 'post-area' ); ?>
	</div>
</div>
<?php } ?>
<div class="footer-wrap">
	<div class="container">
		<div class="row">
			<?php
			for ( $i = 1; $i <= 4 ; $i++ ){
				if ( is_active_sidebar( 'footer-' . $i ) )
				{
					?>
					<div class="footer-col-<?php echo $footer_col; ?>">
						<div class="footer-top-box wow fadeInUp">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-md-12">
					<div class="copyright">
						<?php echo $copyright; ?>
						<a href="<?php echo esc_url('https://www.templatesell.com/'); ?>">
							<?php esc_html_e('Prefer', 'prefer' );?> 
						</a>
						<a href="<?php echo esc_url( 'https://wordpress.org/'); ?>" target="_blank">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Powered By : %s', 'prefer' ), 'WordPress' );
							?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php do_action('prefer_go_to_top_hook'); ?>
</div>
</div><!-- main container -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
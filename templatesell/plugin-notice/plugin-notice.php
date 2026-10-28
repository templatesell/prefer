<?php
/**
 * Recommended plugins notice.
 *
 * @package Prefer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'prefer_recommended_plugins' ) ) :
	/**
	 * Recommended plugins, in display order.
	 *
	 * @return array[] Each entry has a slug, the main plugin file and a display name.
	 */
	function prefer_recommended_plugins() {

		return array(
			array(
				'slug' => 'one-click-demo-import',
				'file' => 'one-click-demo-import/one-click-demo-import.php',
				'name' => __( 'One Click Demo Import', 'prefer' ),
			),
			array(
				'slug' => 'template-sell-demo-importer',
				'file' => 'template-sell-demo-importer/templatesell-demo-importer.php',
				'name' => __( 'Template Sell Demo Importer', 'prefer' ),
			),
			array(
				'slug' => 'templatesell-gated-downloads',
				'file' => 'templatesell-gated-downloads/templatesell-gated-downloads.php',
				'name' => __( 'Gated Downloads', 'prefer' ),
			),
			array(
				'slug' => 'templatesell-captchaflow',
				'file' => 'templatesell-captchaflow/captchaflow.php',
				'name' => __( 'CaptchaFlow', 'prefer' ),
			),
		);
	}
endif;

if ( ! function_exists( 'prefer_missing_recommended_plugins' ) ) :
	/**
	 * List the recommended plugins that are not active yet.
	 *
	 * @return array[] Subset of prefer_recommended_plugins(), each with an added 'installed' flag.
	 */
	function prefer_missing_recommended_plugins() {

		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$installed = array_keys( get_plugins() );
		$missing   = array();

		foreach ( prefer_recommended_plugins() as $plugin ) {
			if ( is_plugin_active( $plugin['file'] ) ) {
				continue;
			}

			$plugin['installed'] = in_array( $plugin['file'], $installed, true );
			$missing[]           = $plugin;
		}

		return $missing;
	}
endif;

if ( ! function_exists( 'prefer_plugin_action_url' ) ) :
	/**
	 * Build the install or activate URL for one recommended plugin.
	 *
	 * @param array $plugin One entry from prefer_recommended_plugins().
	 * @return string Admin URL, or an empty string if the user cannot act on it.
	 */
	function prefer_plugin_action_url( $plugin ) {

		if ( $plugin['installed'] ) {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return '';
			}

			return wp_nonce_url(
				self_admin_url( 'plugins.php?action=activate&plugin=' . rawurlencode( $plugin['file'] ) ),
				'activate-plugin_' . $plugin['file']
			);
		}

		if ( ! current_user_can( 'install_plugins' ) ) {
			return '';
		}

		return wp_nonce_url(
			self_admin_url( 'update.php?action=install-plugin&plugin=' . rawurlencode( $plugin['slug'] ) ),
			'install-plugin_' . $plugin['slug']
		);
	}
endif;

if ( ! function_exists( 'prefer_plugin_notice' ) ) :
	/**
	 * Show the recommendation until it is dismissed or everything is active.
	 */
	function prefer_plugin_notice() {

		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if ( get_user_meta( get_current_user_id(), 'prefer_plugin_notice_dismissed', true ) ) {
			return;
		}

		$missing = prefer_missing_recommended_plugins();

		if ( empty( $missing ) ) {
			return;
		}

		// Active theme name, so child themes read correctly.
		$theme_name = wp_get_theme()->get( 'Name' );

		$names = array();
		foreach ( $missing as $plugin ) {
			$names[] = '<em>' . esc_html( $plugin['name'] ) . '</em>';
		}
		?>
		<div class="notice notice-info is-dismissible prefer-plugin-notice">
			<p>
				<?php
				printf(
					/* translators: 1: theme name, 2: comma separated list of plugin names. */
					esc_html__( '%1$s recommends these free plugins: %2$s.', 'prefer' ),
					esc_html( $theme_name ),
					wp_kses( implode( ', ', $names ), array( 'em' => array() ) )
				);
				?>
				<?php esc_html_e( 'None of them are required.', 'prefer' ); ?>
			</p>
			<p>
				<?php
				foreach ( $missing as $plugin ) {
					$url = prefer_plugin_action_url( $plugin );

					if ( '' === $url ) {
						continue;
					}

					printf(
						'<a href="%1$s" class="button button-secondary">%2$s</a> ',
						esc_url( $url ),
						$plugin['installed']
							/* translators: %s: plugin name. */
							? esc_html( sprintf( __( 'Activate %s', 'prefer' ), $plugin['name'] ) )
							/* translators: %s: plugin name. */
							: esc_html( sprintf( __( 'Install %s', 'prefer' ), $plugin['name'] ) )
					);
				}
				?>
			</p>
			<p>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=prefer-theme' ) ); ?>"><?php esc_html_e( 'Theme options', 'prefer' ); ?></a>
			<span aria-hidden="true">|</span>				<a href="<?php echo esc_url( prefer_plugin_notice_dismiss_url() ); ?>"><?php esc_html_e( 'Dismiss this notice', 'prefer' ); ?></a>
			</p>
		</div>
		<?php
	}
endif;
add_action( 'admin_notices', 'prefer_plugin_notice' );

if ( ! function_exists( 'prefer_plugin_notice_dismiss_url' ) ) :
	/**
	 * Nonced URL that dismisses the notice for the current user.
	 *
	 * @return string
	 */
	function prefer_plugin_notice_dismiss_url() {

		return wp_nonce_url(
			add_query_arg( 'prefer_dismiss_plugins', '1' ),
			'prefer_dismiss_plugins',
			'prefer_plugins_nonce'
		);
	}
endif;

if ( ! function_exists( 'prefer_plugin_notice_dismiss' ) ) :
	/**
	 * Store the dismissal against the user.
	 */
	function prefer_plugin_notice_dismiss() {

		if ( ! isset( $_GET['prefer_dismiss_plugins'] ) ) {
			return;
		}

		if ( ! isset( $_GET['prefer_plugins_nonce'] )
			|| ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['prefer_plugins_nonce'] ) ), 'prefer_dismiss_plugins' )
		) {
			return;
		}

		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		update_user_meta( get_current_user_id(), 'prefer_plugin_notice_dismissed', 1 );
	}
endif;
add_action( 'admin_init', 'prefer_plugin_notice_dismiss' );

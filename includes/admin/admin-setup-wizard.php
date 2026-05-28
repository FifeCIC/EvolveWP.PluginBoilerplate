<?php
/**
 * Plugin Boilerplate Business Onboarding Wizard.
 *
 * ROLE: admin-ui
 *
 * Collects company information on first activation that powers all ecosystem
 * plugins. Stores data in evolvewp_companies and evolvewp_contacts tables.
 *
 * DEPENDS ON:
 *   - EvolveWP\Core\Database\Tables\Companies_Query
 *   - EvolveWP\Core\Database\Tables\Contacts_Query
 *   - EvolveWP\PluginBoilerplate\Core\Settings
 *   - EvolveWP\PluginBoilerplate\Core\Audit
 *
 * CONSUMED BY:
 *   - loader.php (instantiated during admin file loading)
 *   - Hook: admin_menu, admin_init
 *
 * @package  EvolveWP\PluginBoilerplate\Admin
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EvolveWP_Boilerplate_Admin_Setup_Wizard' ) ) :

/**
 * Business onboarding wizard for the EvolveWP ecosystem.
 *
 * @since 1.0.0
 */
class EvolveWP_Boilerplate_Admin_Setup_Wizard {

	/** @var string Current step key. */
	private $step = '';

	/** @var array Wizard steps. */
	private $steps = array();

	/**
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( apply_filters( 'plugin_boilerplate_enable_setup_wizard', true ) && current_user_can( 'manage_options' ) ) {
			add_action( 'admin_menu', array( $this, 'admin_menus' ) );
			add_action( 'admin_init', array( $this, 'setup_wizard' ) );
		}
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_menus() {
		add_dashboard_page( '', '', 'manage_options', 'plugin-boilerplate-setup', '' );
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	private function step_nonce_action() {
		return 'plugin_boilerplate_wizard_step_navigation';
	}

	/**
	 * Main wizard controller.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard() {
		$screen = get_current_screen();
		if ( ! $screen || 'dashboard_page_plugin-boilerplate-setup' !== $screen->id ) {
			return;
		}

		$this->steps = array(
			'introduction' => array(
				'name'    => __( 'Welcome', 'plugin-boilerplate' ),
				'view'    => array( $this, 'step_introduction' ),
				'handler' => '',
			),
			'company' => array(
				'name'    => __( 'Company', 'plugin-boilerplate' ),
				'view'    => array( $this, 'step_company' ),
				'handler' => array( $this, 'step_company_save' ),
			),
			'financial' => array(
				'name'    => __( 'Financial', 'plugin-boilerplate' ),
				'view'    => array( $this, 'step_financial' ),
				'handler' => array( $this, 'step_financial_save' ),
			),
			'team' => array(
				'name'    => __( 'Team', 'plugin-boilerplate' ),
				'view'    => array( $this, 'step_team' ),
				'handler' => array( $this, 'step_team_save' ),
			),
			'ready' => array(
				'name'    => __( 'Ready!', 'plugin-boilerplate' ),
				'view'    => array( $this, 'step_ready' ),
				'handler' => '',
			),
		);

		$nonce = isset( $_GET['_wpnonce'] ) ? sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ) : '';
		$nonce_valid = wp_verify_nonce( $nonce, $this->step_nonce_action() );

		$this->step = ( $nonce_valid && isset( $_GET['step'] ) )
			? sanitize_key( wp_unslash( $_GET['step'] ) )
			: current( array_keys( $this->steps ) );

		wp_enqueue_style( 'plugin_boilerplate_admin_styles', PluginBoilerplate()->plugin_url() . '/assets/css/admin.css', array(), PLUGIN_BOILERPLATE_VERSION );
		wp_enqueue_style( 'plugin-boilerplate-setup', PluginBoilerplate()->plugin_url() . '/assets/css/plugin-boilerplate-setup.css', array( 'dashicons', 'install' ), PLUGIN_BOILERPLATE_VERSION );

		if ( ! empty( $_POST['save_step'] ) && isset( $this->steps[ $this->step ]['handler'] ) ) {
			call_user_func( $this->steps[ $this->step ]['handler'] );
		}

		ob_start();
		$this->setup_wizard_header();
		$this->setup_wizard_steps();
		$this->setup_wizard_content();
		$this->setup_wizard_footer();
		exit;
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	public function get_next_step_link() {
		$keys = array_keys( $this->steps );
		$next = $keys[ array_search( $this->step, $keys, true ) + 1 ];
		return wp_nonce_url( add_query_arg( 'step', $next ), $this->step_nonce_action() );
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	public function get_prev_step_link() {
		$keys = array_keys( $this->steps );
		$idx  = array_search( $this->step, $keys, true );
		if ( $idx <= 0 ) {
			return '';
		}
		return wp_nonce_url( add_query_arg( 'step', $keys[ $idx - 1 ] ), $this->step_nonce_action() );
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_header() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<head>
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title><?php esc_html_e( 'Plugin Boilerplate &rsaquo; Setup', 'plugin-boilerplate' ); ?></title>
			<?php wp_print_styles( 'plugin-boilerplate-setup' ); ?>
			<?php wp_print_styles( 'plugin_boilerplate_admin_styles' ); ?>
		</head>
		<body class="plugin-boilerplate-setup wp-core-ui">
			<h1 id="plugin-boilerplate-logo"><?php esc_html_e( 'Plugin Boilerplate', 'plugin-boilerplate' ); ?></h1>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_footer() {
		?>
			<?php if ( 'ready' === $this->step ) : ?>
				<a class="plugin-boilerplate-return-to-dashboard" href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Return to the WordPress Dashboard', 'plugin-boilerplate' ); ?></a>
			<?php endif; ?>
			</body>
		</html>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_steps() {
		$output_steps = $this->steps;
		array_shift( $output_steps );
		?>
		<ol class="plugin-boilerplate-setup-steps">
			<?php foreach ( $output_steps as $step_key => $step ) : ?>
				<li class="<?php
					if ( $step_key === $this->step ) {
						echo 'active';
					} elseif ( array_search( $this->step, array_keys( $this->steps ), true ) > array_search( $step_key, array_keys( $this->steps ), true ) ) {
						echo 'done';
					}
				?>"><?php echo esc_html( $step['name'] ); ?></li>
			<?php endforeach; ?>
		</ol>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_content() {
		echo '<div class="plugin-boilerplate-setup-content">';
		if ( isset( $this->steps[ $this->step ]['view'] ) ) {
			call_user_func( $this->steps[ $this->step ]['view'] );
		}
		echo '</div>';
	}

	// -------------------------------------------------------------------------
	// Step 1: Introduction
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_introduction() {
		?>
		<h1><?php esc_html_e( 'Welcome to EvolveWP', 'plugin-boilerplate' ); ?></h1>
		<p><?php esc_html_e( 'This wizard collects your company information to power the EvolveWP ecosystem. It takes about two minutes.', 'plugin-boilerplate' ); ?></p>
		<p class="plugin-boilerplate-setup-actions step">
			<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button-primary button button-large button-next"><?php esc_html_e( "Let's Go!", 'plugin-boilerplate' ); ?></a>
			<a href="<?php echo esc_url( admin_url() ); ?>" class="button button-large"><?php esc_html_e( 'Not right now', 'plugin-boilerplate' ); ?></a>
		</p>
		<?php
	}

	// -------------------------------------------------------------------------
	// Step 2: Company Basics
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_company() {
		?>
		<h1><?php esc_html_e( 'Company Details', 'plugin-boilerplate' ); ?></h1>
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="company_name"><?php esc_html_e( 'Company Name', 'plugin-boilerplate' ); ?> <span class="required">*</span></label></th>
					<td><input type="text" id="company_name" name="company_name" class="input-text" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_number"><?php esc_html_e( 'Company Number', 'plugin-boilerplate' ); ?></label></th>
					<td><input type="text" id="company_number" name="company_number" class="input-text" placeholder="<?php esc_attr_e( '8 digits (UK)', 'plugin-boilerplate' ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_type"><?php esc_html_e( 'Company Type', 'plugin-boilerplate' ); ?></label></th>
					<td>
						<select id="company_type" name="company_type">
							<option value=""><?php esc_html_e( 'Select...', 'plugin-boilerplate' ); ?></option>
							<option value="limited"><?php esc_html_e( 'Limited Company', 'plugin-boilerplate' ); ?></option>
							<option value="cic"><?php esc_html_e( 'Community Interest Company', 'plugin-boilerplate' ); ?></option>
							<option value="partnership"><?php esc_html_e( 'Partnership', 'plugin-boilerplate' ); ?></option>
							<option value="sole_trader"><?php esc_html_e( 'Sole Trader', 'plugin-boilerplate' ); ?></option>
							<option value="non_profit"><?php esc_html_e( 'Non-Profit / Charity', 'plugin-boilerplate' ); ?></option>
							<option value="other"><?php esc_html_e( 'Other', 'plugin-boilerplate' ); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="company_email"><?php esc_html_e( 'Email', 'plugin-boilerplate' ); ?> <span class="required">*</span></label></th>
					<td><input type="email" id="company_email" name="company_email" class="input-text" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_phone"><?php esc_html_e( 'Phone', 'plugin-boilerplate' ); ?></label></th>
					<td><input type="text" id="company_phone" name="company_phone" class="input-text" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_website"><?php esc_html_e( 'Website', 'plugin-boilerplate' ); ?></label></th>
					<td><input type="url" id="company_website" name="company_website" class="input-text" value="<?php echo esc_attr( home_url() ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_address"><?php esc_html_e( 'Address', 'plugin-boilerplate' ); ?></label></th>
					<td><textarea id="company_address" name="company_address" class="input-text" rows="3"></textarea></td>
				</tr>
			</table>
			<p class="plugin-boilerplate-setup-actions step">
				<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'plugin-boilerplate' ); ?>" name="save_step" />
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php esc_html_e( 'Skip', 'plugin-boilerplate' ); ?></a>
				<?php wp_nonce_field( 'plugin-boilerplate-setup' ); ?>
			</p>
		</form>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_company_save() {
		check_admin_referer( 'plugin-boilerplate-setup' );

		$query = new \EvolveWP\Core\Database\Tables\Companies_Query();

		$company_id = $query->insert( array(
			'name'           => sanitize_text_field( wp_unslash( $_POST['company_name'] ?? '' ) ),
			'company_number' => sanitize_text_field( wp_unslash( $_POST['company_number'] ?? '' ) ),
			'company_type'   => sanitize_text_field( wp_unslash( $_POST['company_type'] ?? '' ) ),
			'email'          => sanitize_email( wp_unslash( $_POST['company_email'] ?? '' ) ),
			'phone'          => sanitize_text_field( wp_unslash( $_POST['company_phone'] ?? '' ) ),
			'website'        => esc_url_raw( wp_unslash( $_POST['company_website'] ?? '' ) ),
			'address'        => sanitize_textarea_field( wp_unslash( $_POST['company_address'] ?? '' ) ),
			'status'         => 'active',
			'created_at'     => gmdate( 'Y-m-d H:i:s' ),
			'created_by'     => get_current_user_id(),
		) );

		if ( $company_id ) {
			update_option( 'plugin_boilerplate_primary_company_id', $company_id );

			\EvolveWP\PluginBoilerplate\Core\Audit::log( array(
				'event_type'     => 'created',
				'event_category' => 'data',
				'plugin_slug'    => 'plugin-boilerplate',
				'object_type'    => 'company',
				'object_id'      => $company_id,
				'object_label'   => sanitize_text_field( wp_unslash( $_POST['company_name'] ?? '' ) ),
				'description'    => 'Company created via onboarding wizard.',
			) );
		}

		wp_safe_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}

	// -------------------------------------------------------------------------
	// Step 3: Financial Configuration
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_financial() {
		?>
		<h1><?php esc_html_e( 'Financial Configuration', 'plugin-boilerplate' ); ?></h1>
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="financial_year_start"><?php esc_html_e( 'Financial Year Start', 'plugin-boilerplate' ); ?></label></th>
					<td>
						<select id="financial_year_start" name="financial_year_start">
							<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
								<option value="<?php echo esc_attr( $m ); ?>" <?php selected( $m, 4 ); ?>><?php echo esc_html( gmdate( 'F', mktime( 0, 0, 0, $m, 1 ) ) ); ?></option>
							<?php endfor; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="tax_id"><?php esc_html_e( 'Tax ID / UTR', 'plugin-boilerplate' ); ?></label></th>
					<td><input type="text" id="tax_id" name="tax_id" class="input-text" placeholder="<?php esc_attr_e( '10 digits (optional)', 'plugin-boilerplate' ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="currency"><?php esc_html_e( 'Currency', 'plugin-boilerplate' ); ?></label></th>
					<td>
						<select id="currency" name="currency">
							<option value="GBP" selected>GBP (£)</option>
							<option value="USD">USD ($)</option>
							<option value="EUR">EUR (€)</option>
						</select>
					</td>
				</tr>
			</table>
			<p class="plugin-boilerplate-setup-actions step">
				<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'plugin-boilerplate' ); ?>" name="save_step" />
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php esc_html_e( 'Skip', 'plugin-boilerplate' ); ?></a>
				<?php if ( $this->get_prev_step_link() ) : ?>
					<a href="<?php echo esc_url( $this->get_prev_step_link() ); ?>" class="button button-large"><?php esc_html_e( 'Back', 'plugin-boilerplate' ); ?></a>
				<?php endif; ?>
				<?php wp_nonce_field( 'plugin-boilerplate-setup' ); ?>
			</p>
		</form>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_financial_save() {
		check_admin_referer( 'plugin-boilerplate-setup' );

		$month = absint( $_POST['financial_year_start'] ?? 4 );
		update_option( 'plugin_boilerplate_financial_year_start', $month );
		update_option( 'plugin_boilerplate_tax_id', sanitize_text_field( wp_unslash( $_POST['tax_id'] ?? '' ) ) );

		$currency = sanitize_text_field( wp_unslash( $_POST['currency'] ?? 'GBP' ) );
		\EvolveWP\PluginBoilerplate\Core\Settings::set( 'plugin-boilerplate', 'currency', $currency );

		wp_safe_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}

	// -------------------------------------------------------------------------
	// Step 4: Team & Directors
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_team() {
		?>
		<h1><?php esc_html_e( 'Team & Directors', 'plugin-boilerplate' ); ?></h1>
		<p><?php esc_html_e( 'Add at least one director or key person. You can add more later.', 'plugin-boilerplate' ); ?></p>
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="director_first_name"><?php esc_html_e( 'First Name', 'plugin-boilerplate' ); ?> <span class="required">*</span></label></th>
					<td><input type="text" id="director_first_name" name="director_first_name" class="input-text" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="director_last_name"><?php esc_html_e( 'Last Name', 'plugin-boilerplate' ); ?> <span class="required">*</span></label></th>
					<td><input type="text" id="director_last_name" name="director_last_name" class="input-text" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="director_email"><?php esc_html_e( 'Email', 'plugin-boilerplate' ); ?></label></th>
					<td><input type="email" id="director_email" name="director_email" class="input-text" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="director_role"><?php esc_html_e( 'Position', 'plugin-boilerplate' ); ?></label></th>
					<td><input type="text" id="director_role" name="director_role" class="input-text" placeholder="<?php esc_attr_e( 'e.g. Director, CEO, Owner', 'plugin-boilerplate' ); ?>" /></td>
				</tr>
			</table>
			<p class="plugin-boilerplate-setup-actions step">
				<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'plugin-boilerplate' ); ?>" name="save_step" />
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php esc_html_e( 'Skip', 'plugin-boilerplate' ); ?></a>
				<?php if ( $this->get_prev_step_link() ) : ?>
					<a href="<?php echo esc_url( $this->get_prev_step_link() ); ?>" class="button button-large"><?php esc_html_e( 'Back', 'plugin-boilerplate' ); ?></a>
				<?php endif; ?>
				<?php wp_nonce_field( 'plugin-boilerplate-setup' ); ?>
			</p>
		</form>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_team_save() {
		check_admin_referer( 'plugin-boilerplate-setup' );

		$company_id = get_option( 'plugin_boilerplate_primary_company_id', 0 );

		if ( $company_id ) {
			$query = new \EvolveWP\Core\Database\Tables\Contacts_Query();

			$query->insert( array(
				'company_id' => $company_id,
				'first_name' => sanitize_text_field( wp_unslash( $_POST['director_first_name'] ?? '' ) ),
				'last_name'  => sanitize_text_field( wp_unslash( $_POST['director_last_name'] ?? '' ) ),
				'email'      => sanitize_email( wp_unslash( $_POST['director_email'] ?? '' ) ),
				'role'       => sanitize_text_field( wp_unslash( $_POST['director_role'] ?? '' ) ),
				'is_primary' => 1,
				'status'     => 'active',
				'created_at' => gmdate( 'Y-m-d H:i:s' ),
				'created_by' => get_current_user_id(),
			) );
		}

		wp_safe_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}

	// -------------------------------------------------------------------------
	// Step 5: Ready
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_ready() {
		update_option( 'evolvewp_onboarding_complete', true );

		if ( class_exists( 'EvolveWP_Boilerplate_Admin_Notices' ) ) {
			EvolveWP_Boilerplate_Admin_Notices::remove_notice( 'install' );
		}

		\EvolveWP\PluginBoilerplate\Core\Audit::log( array(
			'event_type'     => 'setting_changed',
			'event_category' => 'system',
			'plugin_slug'    => 'plugin-boilerplate',
			'object_type'    => 'setting',
			'object_label'   => 'onboarding_complete',
			'description'    => 'Business onboarding wizard completed.',
		) );
		?>
		<h1><?php esc_html_e( 'EvolveWP is Ready!', 'plugin-boilerplate' ); ?></h1>
		<p><?php esc_html_e( 'Your company information has been saved. You can update it anytime from the EvolveWP settings.', 'plugin-boilerplate' ); ?></p>
		<div class="plugin-boilerplate-setup-next-steps">
			<div class="plugin-boilerplate-setup-next-steps-first">
				<h2><?php esc_html_e( 'Next Steps', 'plugin-boilerplate' ); ?></h2>
				<ul>
					<li class="setup-thing"><a class="button button-primary button-large" href="<?php echo esc_url( admin_url( 'options-general.php?page=plugin-boilerplate-settings' ) ); ?>"><?php esc_html_e( 'Go to Settings', 'plugin-boilerplate' ); ?></a></li>
				</ul>
			</div>
		</div>
		<?php
	}
}

endif;

new EvolveWP_Boilerplate_Admin_Setup_Wizard();

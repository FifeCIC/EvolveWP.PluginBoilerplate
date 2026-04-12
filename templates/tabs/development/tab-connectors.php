<?php
/**
 * Development tab — Connectors.
 *
 * ROLE: template
 *
 * Shows all registered API connectors with their configuration status,
 * capabilities, and a test connection button for configured connectors.
 *
 * @package  EvolveWP Core
 * @category Admin
 * @since    3.1.0
 */

defined( 'ABSPATH' ) || exit;

$providers  = EvolveWP_Core_API_Directory::get_all_providers();
$configured = EvolveWP_Core_API_Directory::get_configured_providers();
?>

<div class="plugin-boilerplate-admin-wrap">

	<div class="plugin-boilerplate-arch-section">
		<h3><?php esc_html_e( 'Registered Connectors', 'plugin-boilerplate' ); ?></h3>
		<p><?php esc_html_e( 'API connectors registered via the API Directory. Each implements the Connector Interface.', 'plugin-boilerplate' ); ?></p>

		<?php if ( empty( $providers ) ) : ?>
			<p><em><?php esc_html_e( 'No connectors registered.', 'plugin-boilerplate' ); ?></em></p>
		<?php else : ?>

			<div class="plugin-boilerplate-components-grid">
				<?php foreach ( $providers as $provider_id => $provider ) :
					$is_configured = isset( $configured[ $provider_id ] );
					$status_class  = $is_configured ? 'plugin-boilerplate-status-success' : 'plugin-boilerplate-status-warning';
					$status_label  = $is_configured
						? __( 'Configured', 'plugin-boilerplate' )
						: __( 'Not Configured', 'plugin-boilerplate' );
				?>
					<div class="plugin-boilerplate-card">
						<div class="plugin-boilerplate-card-header" style="display: flex; justify-content: space-between; align-items: center;">
							<strong>
								<span class="dashicons <?php echo esc_attr( $provider['icon'] ?? 'dashicons-admin-generic' ); ?>" style="margin-right: 4px;"></span>
								<?php echo esc_html( $provider['name'] ?: $provider_id ); ?>
							</strong>
							<span class="plugin-boilerplate-badge <?php echo esc_attr( $status_class ); ?>">
								<?php echo esc_html( $status_label ); ?>
							</span>
						</div>
						<div class="plugin-boilerplate-card-body">
							<?php if ( ! empty( $provider['description'] ) ) : ?>
								<p class="description"><?php echo esc_html( $provider['description'] ); ?></p>
							<?php endif; ?>

							<table class="plugin-boilerplate-table plugin-boilerplate-table-sm" style="margin-top: 8px;">
								<tr>
									<th scope="row"><?php esc_html_e( 'Provider ID', 'plugin-boilerplate' ); ?></th>
									<td><code><?php echo esc_html( $provider_id ); ?></code></td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Auth Type', 'plugin-boilerplate' ); ?></th>
									<td><?php echo esc_html( $provider['auth_type'] ?? 'bearer' ); ?></td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Class', 'plugin-boilerplate' ); ?></th>
									<td><code><?php echo esc_html( $provider['class_name'] ?? '—' ); ?></code></td>
								</tr>
								<?php if ( ! empty( $provider['url'] ) ) : ?>
								<tr>
									<th scope="row"><?php esc_html_e( 'Website', 'plugin-boilerplate' ); ?></th>
									<td><a href="<?php echo esc_url( $provider['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $provider['url'] ); ?></a></td>
								</tr>
								<?php endif; ?>
							</table>

							<?php
							// Show capabilities if the connector class exists.
							$caps = EvolveWP_Core_API_Directory::get_provider_capabilities( $provider_id );
							if ( ! empty( $caps ) ) :
							?>
								<h4 style="margin-top: 12px;"><?php esc_html_e( 'Capabilities', 'plugin-boilerplate' ); ?></h4>
								<table class="plugin-boilerplate-table plugin-boilerplate-table-sm">
									<thead>
										<tr>
											<th scope="col"><?php esc_html_e( 'Action', 'plugin-boilerplate' ); ?></th>
											<th scope="col"><?php esc_html_e( 'Method', 'plugin-boilerplate' ); ?></th>
											<th scope="col"><?php esc_html_e( 'Description', 'plugin-boilerplate' ); ?></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ( $caps as $action => $cap ) : ?>
										<tr>
											<td><code><?php echo esc_html( $action ); ?></code></td>
											<td><?php echo esc_html( $cap['method'] ?? 'POST' ); ?></td>
											<td><?php echo esc_html( $cap['description'] ?? '' ); ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							<?php endif; ?>

							<?php if ( $is_configured ) : ?>
								<div style="margin-top: 12px;">
									<button type="button"
										class="button plugin-boilerplate-test-connector"
										data-provider="<?php echo esc_attr( $provider_id ); ?>">
										<span class="dashicons dashicons-yes-alt" style="margin-top: 3px;"></span>
										<?php esc_html_e( 'Test Connection', 'plugin-boilerplate' ); ?>
									</button>
									<span class="plugin-boilerplate-test-result" data-provider="<?php echo esc_attr( $provider_id ); ?>"></span>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
	</div>

	<div class="plugin-boilerplate-arch-section" style="margin-top: 20px;">
		<h3><?php esc_html_e( 'REST Bridge Endpoints', 'plugin-boilerplate' ); ?></h3>
		<p><?php esc_html_e( 'Endpoints registered via the REST Bridge. Connector routes are auto-generated.', 'plugin-boilerplate' ); ?></p>

		<?php
		$endpoints = plugin_boilerplate_rest_endpoints();
		if ( empty( $endpoints ) ) :
		?>
			<p><em><?php esc_html_e( 'No endpoints registered yet. Endpoints are registered on rest_api_init.', 'plugin-boilerplate' ); ?></em></p>
		<?php else : ?>
			<table class="plugin-boilerplate-table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Method', 'plugin-boilerplate' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Route', 'plugin-boilerplate' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Capability', 'plugin-boilerplate' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Source', 'plugin-boilerplate' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Label', 'plugin-boilerplate' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $endpoints as $key => $ep ) : ?>
					<tr>
						<td><code><?php echo esc_html( $ep['method'] ); ?></code></td>
						<td><code>/wp-json/<?php echo esc_html( $ep['namespace'] . $ep['route'] ); ?></code></td>
						<td><?php echo esc_html( $ep['capability'] ); ?></td>
						<td>
							<span class="plugin-boilerplate-badge <?php echo 'connector' === $ep['source'] ? 'plugin-boilerplate-status-info' : ''; ?>">
								<?php echo esc_html( $ep['source'] ); ?>
							</span>
						</td>
						<td><?php echo esc_html( $ep['label'] ); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>

</div>

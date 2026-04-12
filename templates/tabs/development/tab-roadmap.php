<?php
/**
 * Roadmap tab — development planning and task management.
 *
 * ROLE: template
 *
 * Displays the plugin's development roadmap with accordion phases, two-column
 * task/architecture layout, priority badges, and localStorage-persisted
 * checkboxes. Every plugin cloned from EvolveWP Core gets this tab and populates
 * it with its own phases.
 *
 * DEPENDS ON:
 *   - assets/js/admin/roadmap.js (accordion + localStorage)
 *   - assets/css/components/roadmap.css (styling)
 *
 * @package  EvolveWP Core
 * @since    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="plugin-boilerplate-roadmap-intro">
	<p><?php esc_html_e( 'Development roadmap with task tracking. Checkbox states are saved in your browser.', 'plugin-boilerplate' ); ?></p>
	<p><small><?php esc_html_e( 'Keyboard: Ctrl+Shift+E = expand all, Ctrl+Shift+C = collapse all, Ctrl+Shift+R = reset tasks.', 'plugin-boilerplate' ); ?></small></p>
</div>

<!-- Phase Status Overview -->
<div class="plugin-boilerplate-roadmap-status-grid">
	<div class="plugin-boilerplate-roadmap-status-card plugin-boilerplate-status-completed">
		<h3><?php esc_html_e( 'PHASE 0', 'plugin-boilerplate' ); ?></h3>
		<div class="plugin-boilerplate-status-title"><?php esc_html_e( 'Composer & Namespaces', 'plugin-boilerplate' ); ?></div>
		<div class="plugin-boilerplate-status-badge"><?php esc_html_e( '✅ COMPLETE', 'plugin-boilerplate' ); ?></div>
	</div>
	<div class="plugin-boilerplate-roadmap-status-card plugin-boilerplate-status-completed">
		<h3><?php esc_html_e( 'PHASE 1', 'plugin-boilerplate' ); ?></h3>
		<div class="plugin-boilerplate-status-title"><?php esc_html_e( 'Structure — loader & includes', 'plugin-boilerplate' ); ?></div>
		<div class="plugin-boilerplate-status-badge"><?php esc_html_e( '✅ COMPLETE', 'plugin-boilerplate' ); ?></div>
	</div>
	<div class="plugin-boilerplate-roadmap-status-card plugin-boilerplate-status-active">
		<h3><?php esc_html_e( 'PHASE 2', 'plugin-boilerplate' ); ?></h3>
		<div class="plugin-boilerplate-status-title"><?php esc_html_e( 'Structure — templates', 'plugin-boilerplate' ); ?></div>
		<div class="plugin-boilerplate-status-badge"><?php esc_html_e( '🔄 IN PROGRESS', 'plugin-boilerplate' ); ?></div>
	</div>
	<div class="plugin-boilerplate-roadmap-status-card plugin-boilerplate-status-pending">
		<h3><?php esc_html_e( 'PHASE 3', 'plugin-boilerplate' ); ?></h3>
		<div class="plugin-boilerplate-status-title"><?php esc_html_e( 'Structure — assets', 'plugin-boilerplate' ); ?></div>
		<div class="plugin-boilerplate-status-badge"><?php esc_html_e( '📋 PLANNED', 'plugin-boilerplate' ); ?></div>
	</div>
	<div class="plugin-boilerplate-roadmap-status-card plugin-boilerplate-status-pending">
		<h3><?php esc_html_e( 'PHASE 4', 'plugin-boilerplate' ); ?></h3>
		<div class="plugin-boilerplate-status-title"><?php esc_html_e( 'AI-Readable Standards', 'plugin-boilerplate' ); ?></div>
		<div class="plugin-boilerplate-status-badge"><?php esc_html_e( '📋 PLANNED', 'plugin-boilerplate' ); ?></div>
	</div>
</div>

<!-- Main Roadmap Content -->
<div class="plugin-boilerplate-roadmap-main">

	<!-- PHASE 0: Composer & Namespaces -->
	<div class="plugin-boilerplate-roadmap-phase">
		<div class="plugin-boilerplate-roadmap-phase-header" data-phase="phase0">
			<h2><?php esc_html_e( 'PHASE 0: Composer & Namespace Foundation ✅', 'plugin-boilerplate' ); ?></h2>
			<div class="plugin-boilerplate-roadmap-phase-toggle">▶</div>
		</div>
		<div class="plugin-boilerplate-roadmap-phase-content" id="phase0-content" style="display:none;">
			<div class="plugin-boilerplate-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'plugin-boilerplate' ); ?></strong>
				<?php esc_html_e( 'Establish PSR-4 autoloading via Composer so every new file uses namespaces from the start.', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-roadmap-section">
				<div class="plugin-boilerplate-roadmap-tasks-grid">
					<div class="plugin-boilerplate-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t01" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t01"><?php esc_html_e( 'Create composer.json with PSR-4 autoload map', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t02" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t02"><?php esc_html_e( 'Load Composer autoloader in plugin-boilerplate.php', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t03" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t03"><?php esc_html_e( 'Create namespace directory structure', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t04" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t04"><?php esc_html_e( 'Migrate Registry as proof-of-concept', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t05" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t05"><?php esc_html_e( 'Delete legacy SPL autoloader', 'plugin-boilerplate' ); ?></label>
						</div>
					</div>
					<div class="plugin-boilerplate-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Key Files', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>composer.json</code><br>
							<?php esc_html_e( 'PSR-4 map: EvolveWP\Core\\ → includes/', 'plugin-boilerplate' ); ?>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>vendor/autoload.php</code><br>
							<?php esc_html_e( 'Composer autoloader entry point', 'plugin-boilerplate' ); ?>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>includes/Ecosystem/Registry.php</code><br>
							<?php esc_html_e( 'First namespaced class — proof of concept', 'plugin-boilerplate' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 1: Structure -->
	<div class="plugin-boilerplate-roadmap-phase">
		<div class="plugin-boilerplate-roadmap-phase-header" data-phase="phase1">
			<h2><?php esc_html_e( 'PHASE 1: Structure — loader & includes ✅', 'plugin-boilerplate' ); ?></h2>
			<div class="plugin-boilerplate-roadmap-phase-toggle">▶</div>
		</div>
		<div class="plugin-boilerplate-roadmap-phase-content" id="phase1-content" style="display:none;">
			<div class="plugin-boilerplate-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'plugin-boilerplate' ); ?></strong>
				<?php esc_html_e( 'Reorganise includes/ so the category of any file is obvious from its path. Namespace and migrate all Tier 1 classes.', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-roadmap-section">
				<div class="plugin-boilerplate-roadmap-tasks-grid">
					<div class="plugin-boilerplate-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Migrated Classes (13 total)', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t11" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t11"><?php esc_html_e( 'Ecosystem: Registry, Menu_Manager, Installer', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t12" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t12"><?php esc_html_e( 'Core: Install, AJAX_Handler, Logger, Enhanced_Logger, Task_Scheduler', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t13" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t13"><?php esc_html_e( 'Admin: Dashboard_Widgets, Notification_Bell, Uninstall_Feedback', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t14" class="plugin-boilerplate-task-checkbox" checked disabled>
							<label for="t14"><?php esc_html_e( 'API: REST_Controller, Base_API', 'plugin-boilerplate' ); ?></label>
						</div>
					</div>
					<div class="plugin-boilerplate-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Namespace Map', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>EvolveWP Core\Ecosystem\</code> → <code>includes/Ecosystem/</code>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>EvolveWP Core\Core\</code> → <code>includes/Core/</code>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>EvolveWP Core\Admin\</code> → <code>includes/Admin/</code>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>EvolveWP Core\API\</code> → <code>includes/API/</code>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 2: Templates (active) -->
	<div class="plugin-boilerplate-roadmap-phase plugin-boilerplate-roadmap-phase-active">
		<div class="plugin-boilerplate-roadmap-phase-header" data-phase="phase2">
			<h2><?php esc_html_e( 'PHASE 2: Structure — templates 🔄', 'plugin-boilerplate' ); ?></h2>
			<div class="plugin-boilerplate-roadmap-phase-toggle">▼</div>
		</div>
		<div class="plugin-boilerplate-roadmap-phase-content" id="phase2-content">
			<div class="plugin-boilerplate-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'plugin-boilerplate' ); ?></strong>
				<?php esc_html_e( 'Consolidate all templates into templates/ with predictable naming: pages → tabs → partials.', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-roadmap-section">
				<div class="plugin-boilerplate-roadmap-section-header">
					<h3><?php esc_html_e( 'Template Migration', 'plugin-boilerplate' ); ?></h3>
					<span class="plugin-boilerplate-priority-badge plugin-boilerplate-priority-high"><?php esc_html_e( 'HIGH PRIORITY', 'plugin-boilerplate' ); ?></span>
				</div>
				<div class="plugin-boilerplate-roadmap-tasks-grid">
					<div class="plugin-boilerplate-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t21" class="plugin-boilerplate-task-checkbox" checked>
							<label for="t21"><?php esc_html_e( 'Inventory all template files in FILE-INVENTORY.md', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t22" class="plugin-boilerplate-task-checkbox" checked>
							<label for="t22"><?php esc_html_e( 'Move 15 development tab files to templates/tabs/development/', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t23" class="plugin-boilerplate-task-checkbox" checked>
							<label for="t23"><?php esc_html_e( 'Move 17 UI library partials to templates/partials/ui-library/', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t24" class="plugin-boilerplate-task-checkbox">
							<label for="t24"><?php esc_html_e( 'Add roadmap tab scaffold (this tab)', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t25" class="plugin-boilerplate-task-checkbox">
							<label for="t25"><?php esc_html_e( 'Add architecture tab scaffold', 'plugin-boilerplate' ); ?></label>
						</div>
					</div>
					<div class="plugin-boilerplate-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Structure', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>templates/pages/</code><br>
							<?php esc_html_e( 'Full admin pages (one per menu item)', 'plugin-boilerplate' ); ?>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>templates/tabs/{page}/</code><br>
							<?php esc_html_e( 'Tab content (one per tab)', 'plugin-boilerplate' ); ?>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>templates/partials/</code><br>
							<?php esc_html_e( 'Reusable HTML fragments', 'plugin-boilerplate' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 3: Assets -->
	<div class="plugin-boilerplate-roadmap-phase">
		<div class="plugin-boilerplate-roadmap-phase-header" data-phase="phase3">
			<h2><?php esc_html_e( 'PHASE 3: Structure — assets 📋', 'plugin-boilerplate' ); ?></h2>
			<div class="plugin-boilerplate-roadmap-phase-toggle">▶</div>
		</div>
		<div class="plugin-boilerplate-roadmap-phase-content" id="phase3-content" style="display:none;">
			<div class="plugin-boilerplate-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'plugin-boilerplate' ); ?></strong>
				<?php esc_html_e( 'Convert procedural asset files to Asset_Manager class. Add component CSS for roadmap and architecture tabs.', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-roadmap-section">
				<div class="plugin-boilerplate-roadmap-tasks-grid">
					<div class="plugin-boilerplate-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t31" class="plugin-boilerplate-task-checkbox">
							<label for="t31"><?php esc_html_e( 'Create Asset_Manager class', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t32" class="plugin-boilerplate-task-checkbox">
							<label for="t32"><?php esc_html_e( 'Create assets/css/components/roadmap.css', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t33" class="plugin-boilerplate-task-checkbox">
							<label for="t33"><?php esc_html_e( 'Create assets/js/admin/roadmap.js', 'plugin-boilerplate' ); ?></label>
						</div>
					</div>
					<div class="plugin-boilerplate-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Key Files', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>assets/Asset_Manager.php</code><br>
							<?php esc_html_e( 'Replaces manage-assets.php + queue-assets.php', 'plugin-boilerplate' ); ?>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>assets/css/components/</code><br>
							<?php esc_html_e( 'roadmap.css, flow-diagram.css, action-docs.css', 'plugin-boilerplate' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 4: AI Standards -->
	<div class="plugin-boilerplate-roadmap-phase">
		<div class="plugin-boilerplate-roadmap-phase-header" data-phase="phase4">
			<h2><?php esc_html_e( 'PHASE 4: AI-Readable Code Standards 📋', 'plugin-boilerplate' ); ?></h2>
			<div class="plugin-boilerplate-roadmap-phase-toggle">▶</div>
		</div>
		<div class="plugin-boilerplate-roadmap-phase-content" id="phase4-content" style="display:none;">
			<div class="plugin-boilerplate-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'plugin-boilerplate' ); ?></strong>
				<?php esc_html_e( 'Every file has a standard header with ROLE, DEPENDS ON, CONSUMED BY, and DATA FLOW tags so AI can navigate the codebase without reading implementations.', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-roadmap-section">
				<div class="plugin-boilerplate-roadmap-tasks-grid">
					<div class="plugin-boilerplate-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t41" class="plugin-boilerplate-task-checkbox" checked>
							<label for="t41"><?php esc_html_e( 'Create FILE-HEADER-TEMPLATE.md', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t42" class="plugin-boilerplate-task-checkbox">
							<label for="t42"><?php esc_html_e( 'Apply headers to all Core/ files', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t43" class="plugin-boilerplate-task-checkbox">
							<label for="t43"><?php esc_html_e( 'Apply headers to all Ecosystem/ files', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t44" class="plugin-boilerplate-task-checkbox">
							<label for="t44"><?php esc_html_e( 'Create Hook_Registry.php', 'plugin-boilerplate' ); ?></label>
						</div>
						<div class="plugin-boilerplate-roadmap-task">
							<input type="checkbox" id="t45" class="plugin-boilerplate-task-checkbox" checked>
							<label for="t45"><?php esc_html_e( 'Create NAMING-CONVENTIONS.md', 'plugin-boilerplate' ); ?></label>
						</div>
					</div>
					<div class="plugin-boilerplate-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Reference', 'plugin-boilerplate' ); ?></h4>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>docs/FILE-HEADER-TEMPLATE.md</code><br>
							<?php esc_html_e( 'Copy-paste headers for all 10 role types', 'plugin-boilerplate' ); ?>
						</div>
						<div class="plugin-boilerplate-roadmap-arch-item">
							<code>docs/NAMING-CONVENTIONS.md</code><br>
							<?php esc_html_e( 'All naming patterns documented', 'plugin-boilerplate' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Progress Summary -->
<div class="plugin-boilerplate-roadmap-summary">
	<h3><?php esc_html_e( 'Development Progress', 'plugin-boilerplate' ); ?></h3>
	<div class="plugin-boilerplate-roadmap-progress-bars">
		<div class="plugin-boilerplate-progress-item">
			<label><?php esc_html_e( 'Phase 0 — Composer & Namespaces', 'plugin-boilerplate' ); ?></label>
			<div class="plugin-boilerplate-progress-bar"><div class="plugin-boilerplate-progress-fill" style="width:100%; background: linear-gradient(90deg, #46b450, #28a745);"></div></div>
			<span class="plugin-boilerplate-progress-text"><?php esc_html_e( '5/5 tasks completed', 'plugin-boilerplate' ); ?></span>
		</div>
		<div class="plugin-boilerplate-progress-item">
			<label><?php esc_html_e( 'Phase 1 — Structure (loader & includes)', 'plugin-boilerplate' ); ?></label>
			<div class="plugin-boilerplate-progress-bar"><div class="plugin-boilerplate-progress-fill" style="width:100%; background: linear-gradient(90deg, #46b450, #28a745);"></div></div>
			<span class="plugin-boilerplate-progress-text"><?php esc_html_e( '13/13 classes migrated', 'plugin-boilerplate' ); ?></span>
		</div>
		<div class="plugin-boilerplate-progress-item">
			<label><?php esc_html_e( 'Phase 2 — Structure (templates)', 'plugin-boilerplate' ); ?></label>
			<div class="plugin-boilerplate-progress-bar"><div class="plugin-boilerplate-progress-fill" style="width:60%;"></div></div>
			<span class="plugin-boilerplate-progress-text"><?php esc_html_e( '3/5 tasks completed', 'plugin-boilerplate' ); ?></span>
		</div>
	</div>
</div>

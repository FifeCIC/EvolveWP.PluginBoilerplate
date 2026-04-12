<?php
/**
 * Architecture View
 * 
 * @package EvolveWP Core
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once PLUGIN_BOILERPLATE_PLUGIN_DIR . 'includes/classes/architecture-mapper.php';

?>

<div class="plugin-boilerplate-architecture-view">
    <h2>Plugin Architecture</h2>
    <p>Visual guide to EvolveWP Core structure for developers and AI assistants.</p>
    
    <?php EvolveWP_Core_Architecture_Mapper::render_tree(); ?>
</div>

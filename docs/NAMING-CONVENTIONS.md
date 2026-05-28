# WPSeed Naming Conventions

> This document is the single source of truth for naming patterns across WPSeed
> and every plugin cloned from it. AI assistants use this to predict file paths
> and class names without guessing. Developers use it to stay consistent.
>
> When cloning WPSeed, replace every occurrence of the boilerplate prefix with
> your plugin's own prefix throughout all files and in `composer.json`.

---

## Boilerplate Prefixes (replace when cloning)

| Type | WPSeed prefix | Example after cloning to EvolveWP.Verifier |
|---|---|---|
| PHP constants | `PLUGIN_BOILERPLATE_` | `EVOLVEWP_VERIFIER_` |
| PHP functions | `plugin_boilerplate_` | `evolvewp_verifier_` |
| Global classes | `EvolveWP_Boilerplate_` | `EvolveWP_Verifier_` |
| Namespace root | `WPSeed\` | `EvolveWP\Verifier\` |
| Text domain | `wpseed` | `evolvewp-verifier` |
| Option prefix | `plugin_boilerplate_` | `evolvewp_verifier_` |
| Hook prefix | `plugin_boilerplate_` | `evolvewp_verifier_` |

---

## File Naming

| Type | Convention | Example |
|---|---|---|
| Legacy global classes | `kebab-case.php` | `includes/classes/install.php` |
| Namespaced classes | `PascalCase.php` matching the class name | `includes/Core/Install.php` |
| Templates | `admin-page-{tab-name}.php` | `templates/admin-page-settings.php` |
| Partials | `partial-{name}.php` | `templates/partials/partial-notice.php` |
| Functions files | `kebab-case.php` | `includes/functions/validate.php` |
| Assets (CSS/JS) | `kebab-case.css` / `kebab-case.js` | `assets/css/admin.css` |

---

## Class Naming

| Type | Convention | Example |
|---|---|---|
| Legacy global class | `EvolveWP_Boilerplate_Category_Name` | `EvolveWP_Boilerplate_Admin_Settings` |
| Namespaced class | `PascalCase` (no prefix — namespace provides context) | `WPSeed\Core\Install` → class `Install` |
| Abstract class | `Abstract_Name` or just the name with docblock noting it is abstract | `WPSeed\API\REST_Controller` |
| Interface | `Name_Interface` | `WPSeed\Core\Logger_Interface` |
| Trait | `Name_Trait` | `WPSeed\Core\Singleton_Trait` |

---

## Namespace Directory Map

The PSR-4 root `WPSeed\` maps to `includes/`. Subdirectory = sub-namespace.

```
WPSeed\Core\       → includes/Core/        Core classes loaded on every request
WPSeed\Admin\      → includes/Admin/       Admin-only classes
WPSeed\Ecosystem\  → includes/Ecosystem/   Cross-plugin registry and bridges
WPSeed\Utilities\  → includes/Utilities/   Stateless helper classes
WPSeed\API\        → includes/API/         REST controllers and API base classes
WPSeed\CLI\        → includes/CLI/         WP-CLI command classes
```

**File path from fully-qualified class name:**
`WPSeed\Core\Install` → `includes/Core/Install.php`
`WPSeed\Ecosystem\Registry` → `includes/Ecosystem/Registry.php`

**When cloning:** replace `EvolveWP\Core\\` with your namespace in both PHP files and
in the `composer.json` autoload section.

---

## Method Naming

| Convention | Example |
|---|---|
| `snake_case` for all methods | `get_plugin_count()` |
| Getters: `get_{noun}` | `get_registered_plugins()` |
| Setters: `set_{noun}` | `set_menu_location()` |
| Boolean checks: `is_{state}` or `has_{thing}` | `is_ecosystem_mode()`, `has_logging()` |
| Actions: `{verb}_{noun}` | `register_plugin()`, `detect_ecosystem()` |
| Static factories: `instance()` for singletons | `Registry::instance()` |

---

## Constant Naming

```
PLUGIN_BOILERPLATE_VERSION          Plugin version string
PLUGIN_BOILERPLATE_PLUGIN_FILE      Absolute path to main plugin file (__FILE__)
PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH  Absolute path to plugin root directory (trailing slash)
PLUGIN_BOILERPLATE_PLUGIN_URL       Plugin root URL (trailing slash)
PLUGIN_BOILERPLATE_LOG_DIR          Absolute path to log directory
PLUGIN_BOILERPLATE_DEV_MODE         Boolean — true enables developer tooling
```

All constants guarded with `if ( ! defined( 'PLUGIN_BOILERPLATE_CONSTANT_NAME' ) )`.

---

## Hook Naming

```
Pattern:   {prefix}_{noun}_{verb}
Examples:  plugin_boilerplate_plugin_registered
           plugin_boilerplate_ecosystem_loaded
           plugin_boilerplate_settings_saved

Filter:    {prefix}_{noun}           (returns a value)
Examples:  plugin_boilerplate_menu_location
           plugin_boilerplate_registered_plugins

AJAX:      {prefix}_{action}
Examples:  plugin_boilerplate_save_settings
           plugin_boilerplate_get_status
```

---

## Option Naming

```
Pattern:   {prefix}_{setting_name}
Examples:  plugin_boilerplate_version
           plugin_boilerplate_db_version
           plugin_boilerplate_ecosystem_mode
           plugin_boilerplate_ecosystem_plugins
```

---

## Nonce Actions

```
Pattern:   {prefix}_{action_description}
Examples:  plugin_boilerplate_save_settings
           plugin_boilerplate_do_update
           plugin_boilerplate_force_update
```

---

## Database Table Naming

```
Pattern:   {wpdb->prefix}{plugin_prefix}_{table_name}
Examples:  wp_plugin_boilerplate_api_calls
           wp_plugin_boilerplate_debug_logs
           wp_plugin_boilerplate_notifications
```

---

## CSS / JS Handle Naming

```
Pattern:   {plugin-slug}-{asset-name}
Examples:  plugin-boilerplate-admin
           plugin-boilerplate-roadmap
           plugin-boilerplate-ecosystem
```

# EvolveWP Plugin Cloning Guide

> How to create a new EvolveWP ecosystem plugin from the PluginBoilerplate.
> Follow every step in order. A PowerShell script (`clone-plugin.ps1`) automates
> steps 1–7.
>
> **Updated**: April 2026 — corrected token order, added legacy class prefix,
> documented lessons from OpsStudio clone.

---

## Before You Start

You need:
- The `EvolveWP.PluginBoilerplate` directory (the cloning source)
- A target directory that already has a `.git` folder (cloned from GitHub)
- Your new plugin's details (see Planned Clones table below)

**The PluginBoilerplate must never be activated** alongside Core or any real
plugin. It is a cloning source only.

---

## The 7 Tokens

All replacements are case-sensitive. **Order matters** — namespace must be
replaced before class name to prevent double-prefixing.

| # | Find | Replace With | Example (OpsStudio) |
|---|---|---|---|
| 1 | `EvolveWP\PluginBoilerplate\` | `{Namespace}\` | `EvolveWP\OpsStudio\` |
| 2 | `PLUGIN_BOILERPLATE_` | `{CONSTANT_PREFIX_}` | `EVOLVEWP_OPS_` |
| 3 | `EvolveWP_Boilerplate_` | `{Legacy_Class_Prefix_}` | `EvolveWP_Ops_` |
| 4 | `plugin_boilerplate_` | `{function_prefix_}` | `evolvewp_ops_` |
| 5 | `plugin-boilerplate` | `{slug}` | `evolvewp-opsstudio` |
| 6 | `PluginBoilerplate` | `{ClassName}` | `EvolveWPOpsStudio` |
| 7 | `Plugin Boilerplate` | `{Display Name}` | `EvolveWP OpsStudio` |

### Why This Order?

- **Namespace (#1) before class name (#6)**: The namespace token
  `EvolveWP\PluginBoilerplate\` contains `PluginBoilerplate`. If the class
  name replacement runs first, it becomes `EvolveWP\EvolveWPOpsStudio\` — wrong.
- **Legacy class prefix (#3) early**: `EvolveWP_Boilerplate_` is the prefix for
  ~40 non-namespaced classes. Missing this causes `Cannot redeclare class`
  fatal errors when running alongside Core.
- **Display name (#7) last**: Catches remaining human-readable strings in
  PHPDoc, admin UI, and translatable text.

### What to Exclude

- `vendor/` — update `vendor/composer/autoload_psr4.php` manually instead
- `libraries/` — third-party code, never modify
- `.git/` — preserve the target repo's git history

---

## Automated Cloning (Recommended)

Use the PowerShell script in the PluginBoilerplate directory:

```powershell
cd c:\wamp64\www\Ecosystem\wp-content\plugins\EvolveWP.PluginBoilerplate

.\clone-plugin.ps1 `
    -ClassName "EvolveWPClientJourney" `
    -ConstantPrefix "EVOLVEWP_CJ_" `
    -Namespace "EvolveWP\ClientJourney" `
    -FunctionPrefix "evolvewp_cj_" `
    -Slug "evolvewp-clientjourney" `
    -DisplayName "EvolveWP ClientJourney" `
    -LegacyPrefix "EvolveWP_CJ_" `
    -Description "CRM, proposals, and client portal for the EvolveWP ecosystem." `
    -GitHubRepo "EvolveWP.ClientJourney"
```

The script:
1. Copies files (preserving target `.git`)
2. Renames main plugin file
3. Runs all 7 replacements in correct order
4. Updates plugin header and composer.json
5. Updates the Composer autoloader
6. Reports any stale tokens

After the script, you still need to:
- Write a plugin-specific `README.md`
- Restart Apache (OPcache)
- Activate in WordPress and check `debug.log`
- Commit and push

---

## Manual Cloning Steps

If not using the script:

### Step 1 — Copy the directory

Copy all files from `EvolveWP.PluginBoilerplate/` into the target directory.
**Preserve the target's `.git` folder** — do not overwrite or delete it.

```
robocopy "EvolveWP.PluginBoilerplate" "EvolveWPClientJourney" /E /XD .git /IS /IT
```

### Step 2 — Rename the main plugin file

```
plugin-boilerplate.php  →  evolvewp-clientjourney.php
```

### Step 3 — Run all 7 token replacements

Run in the order shown in the table above. Exclude `vendor/`, `libraries/`,
and `.git/` directories.

### Step 4 — Update the plugin file header

```php
/**
 * Plugin Name: EvolveWP ClientJourney
 * Plugin URI:  https://evolvewp.dev/plugins/clientjourney
 * Github URI:  https://github.com/FifeCIC/EvolveWP.ClientJourney
 * Description: CRM, proposals, and client portal for the EvolveWP ecosystem.
 * Version:     1.0.0
 * Author:      FifeCIC
 * Author URI:  https://evolvewp.dev
 * Text Domain: evolvewp-clientjourney
 * Domain Path: /i18n/languages/
 *
 * @package EvolveWP\ClientJourney
 */
```

### Step 5 — Update composer.json

```json
{
    "name": "evolvewp/evolvewp-clientjourney",
    "description": "EvolveWP ClientJourney — CRM, proposals, and client portal.",
    "autoload": {
        "psr-4": {
            "EvolveWP\\ClientJourney\\": "includes/"
        }
    }
}
```

### Step 6 — Update the Composer autoloader

Edit `vendor/composer/autoload_psr4.php`:

```php
return array(
    'EvolveWP\\ClientJourney\\' => array( $baseDir . '/includes' ),
);
```

### Step 7 — Write README.md

Replace the boilerplate README with plugin-specific content.

### Step 8 — Update $GLOBALS variable

In `loader.php`, the last line boots the plugin into a global. Update the
variable name:

```php
$GLOBALS['evolvewp_cj'] = EvolveWPClientJourney();
```

### Step 9 — Restart Apache and activate

1. Restart Apache (clears OPcache)
2. Activate from WordPress Plugins screen
3. Check `wp-content/debug.log` for errors
4. Confirm admin menu appears

### Step 10 — Commit and push

```bash
git add .
git commit -m "Initial clone from PluginBoilerplate"
git push origin main
```

---

## Planned Clones

| Plugin | Class Name | Constant Prefix | Legacy Prefix | Namespace | Function Prefix | Slug |
|---|---|---|---|---|---|---|
| OpsStudio | `EvolveWPOpsStudio` | `EVOLVEWP_OPS_` | `EvolveWP_Ops_` | `EvolveWP\OpsStudio` | `evolvewp_ops_` | `evolvewp-opsstudio` |
| ClientJourney | `EvolveWPClientJourney` | `EVOLVEWP_CJ_` | `EvolveWP_CJ_` | `EvolveWP\ClientJourney` | `evolvewp_cj_` | `evolvewp-clientjourney` |
| PredictiveERP | `EvolveWPPredictiveERP` | `EVOLVEWP_ERP_` | `EvolveWP_ERP_` | `EvolveWP\PredictiveERP` | `evolvewp_erp_` | `evolvewp-predictiveerp` |
| Intranet | `EvolveWPIntranet` | `EVOLVEWP_INTRANET_` | `EvolveWP_Intranet_` | `EvolveWP\Intranet` | `evolvewp_intranet_` | `evolvewp-intranet` |
| WorkplaceHub | `EvolveWPWorkplaceHub` | `EVOLVEWP_WH_` | `EvolveWP_WH_` | `EvolveWP\WorkplaceHub` | `evolvewp_wh_` | `evolvewp-workplacehub` |

---

## Troubleshooting

### "Cannot redeclare function/class"
A function or class name collides with Core or another plugin. Check:
- Was the legacy class prefix replacement (#3) run? Search for `EvolveWP_Boilerplate_`
- Does `functions.php` still contain `evolvewp_register_module()`? Remove it — that's Core-only.

### "Class not found" after activation
The Composer autoloader has the wrong namespace. Check:
- `vendor/composer/autoload_psr4.php` maps the correct namespace to `includes/`
- `composer.json` has the correct PSR-4 entry

### Plugin activates but shows "EvolveWP Core" in admin UI
The display name replacement (#7) missed some strings. Search for
`Plugin Boilerplate` (case-sensitive) — any remaining instances are bugs.

### Changes not taking effect after editing PHP files
OPcache is serving stale files. Restart Apache via WAMP tray icon.

---

## Checklist

- [ ] Files copied (preserving `.git`)
- [ ] Main plugin file renamed to `{slug}.php`
- [ ] All 7 token replacements completed in order
- [ ] Plugin file header updated (name, description, URIs, @package)
- [ ] `composer.json` updated (name, description, PSR-4 namespace)
- [ ] `vendor/composer/autoload_psr4.php` updated
- [ ] `$GLOBALS` variable renamed in `loader.php`
- [ ] `README.md` written with plugin-specific content
- [ ] `evolvewp_register_module()` NOT present in `functions.php`
- [ ] Apache restarted
- [ ] Plugin activates without PHP errors
- [ ] Plugin appears in wp-admin menu
- [ ] No stale boilerplate tokens remain (search all 7)
- [ ] Committed and pushed to GitHub

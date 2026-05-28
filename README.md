# EvolveWP Plugin Boilerplate

**Clean starter template for new EvolveWP ecosystem plugins. Clone this repo to begin a new plugin.**

Built by [FifeCIC](https://fifecic.scot) | Part of the [EvolveWP Ecosystem](https://evolvewp.dev)

---

## What This Is

This is the **clone template** for creating new plugins in the EvolveWP ecosystem. It contains the same architecture as [WPSeed](https://github.com/FifeCIC/WPSeed) but stripped to a clean starting point — no demo content, no example data, ready to rename and build on.

For full documentation, feature showcase, and integration examples, see **[WPSeed](https://github.com/FifeCIC/WPSeed)**.

## Quick Start

### 1. Clone

```powershell
# Using the included script (Windows):
.\clone-plugin.ps1 -Name "MyPlugin" -Slug "myplugin"

# Or manually:
git clone https://github.com/FifeCIC/EvolveWP.PluginBoilerplate.git MyPlugin
cd MyPlugin
```

### 2. Rename

Find and replace across all files:
- `plugin-boilerplate` → `myplugin`
- `PluginBoilerplate` → `MyPlugin`
- `PLUGIN_BOILERPLATE` → `MYPLUGIN`
- `Plugin Boilerplate` → `My Plugin`

### 3. Activate

1. Place in `wp-content/plugins/`
2. Run `composer install` if using Composer autoloading
3. Activate in WordPress Admin → Plugins

## What's Included

- WordPress plugin header and bootstrap
- Composer PSR-4 autoloading
- Admin page structure
- REST API base controller
- Asset management framework
- i18n/translation ready
- Uninstall cleanup
- GPL-3.0 license

## Documentation

All architecture docs, code examples, and integration guides live in the WPSeed repository:

→ **[WPSeed Documentation](https://github.com/FifeCIC/WPSeed/tree/main/docs)**

## Requirements

- WordPress 5.6+
- PHP 7.4+
- Composer (recommended)

## Support

- **GitHub Sponsors**: [github.com/sponsors/ryanbayne](https://github.com/sponsors/ryanbayne)
- **Buy Me a Coffee**: [buymeacoffee.com/ryanbayne](https://www.buymeacoffee.com/ryanbayne)

## Licence

GPL-3.0-or-later — see [LICENSE](LICENSE) for details.

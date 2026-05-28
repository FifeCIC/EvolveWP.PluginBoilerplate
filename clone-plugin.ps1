# clone-plugin.ps1 — Clone EvolveWP.PluginBoilerplate into a new ecosystem plugin.
#
# Usage:
#   .\clone-plugin.ps1 -ClassName "EvolveWPClientJourney" -ConstantPrefix "EVOLVEWP_CJ_" -Namespace "EvolveWP\ClientJourney" -FunctionPrefix "evolvewp_cj_" -Slug "evolvewp-clientjourney" -DisplayName "EvolveWP ClientJourney" -LegacyPrefix "EvolveWP_CJ_" -Description "CRM, proposals, and client portal for the EvolveWP ecosystem." -GitHubRepo "EvolveWP.ClientJourney"
#
# Prerequisites:
#   - Target directory must already exist (cloned from GitHub with .git intact)
#   - PluginBoilerplate source must be at the expected path
#
# What this script does:
#   1. Copies all files from PluginBoilerplate (excluding .git)
#   2. Renames the main plugin file
#   3. Runs 7 token replacements in the correct order
#   4. Updates plugin header, composer.json, README
#   5. Removes evolvewp_register_module() if still present
#   6. Regenerates Composer autoloader (manual)
#   7. Reports any remaining stale tokens

param(
    [Parameter(Mandatory)] [string] $ClassName,        # e.g. EvolveWPClientJourney
    [Parameter(Mandatory)] [string] $ConstantPrefix,    # e.g. EVOLVEWP_CJ_
    [Parameter(Mandatory)] [string] $Namespace,         # e.g. EvolveWP\ClientJourney
    [Parameter(Mandatory)] [string] $FunctionPrefix,    # e.g. evolvewp_cj_
    [Parameter(Mandatory)] [string] $Slug,              # e.g. evolvewp-clientjourney
    [Parameter(Mandatory)] [string] $DisplayName,       # e.g. EvolveWP ClientJourney
    [Parameter(Mandatory)] [string] $LegacyPrefix,      # e.g. EvolveWP_CJ_
    [Parameter(Mandatory)] [string] $Description,       # Plugin description
    [Parameter(Mandatory)] [string] $GitHubRepo         # e.g. EvolveWP.ClientJourney
)

$ErrorActionPreference = "Stop"

$PluginsDir = "c:\wamp64\www\Ecosystem\wp-content\plugins"
$SourceDir  = "$PluginsDir\EvolveWP.PluginBoilerplate"
$TargetDir  = "$PluginsDir\$ClassName"

Write-Host "`n=== EvolveWP Plugin Cloner ===" -ForegroundColor Cyan
Write-Host "Source:  $SourceDir"
Write-Host "Target:  $TargetDir"
Write-Host "Plugin:  $DisplayName ($Slug)"
Write-Host ""

# --- Step 1: Verify target exists and has .git ---
if (-not (Test-Path "$TargetDir\.git")) {
    Write-Host "WARNING: $TargetDir\.git not found. Target may not be a git repo." -ForegroundColor Yellow
}

# --- Step 2: Copy files (exclude .git from both sides) ---
Write-Host "[1/7] Copying files from PluginBoilerplate..." -ForegroundColor Green
$robocopyResult = robocopy $SourceDir $TargetDir /E /XD .git /IS /IT /NJH /NJS /NP 2>&1
Write-Host "  Files copied."

# --- Step 3: Rename main plugin file ---
Write-Host "[2/7] Renaming main plugin file..." -ForegroundColor Green
if (Test-Path "$TargetDir\plugin-boilerplate.php") {
    Rename-Item "$TargetDir\plugin-boilerplate.php" "$Slug.php"
    Write-Host "  Renamed to $Slug.php"
} else {
    Write-Host "  plugin-boilerplate.php not found (may already be renamed)" -ForegroundColor Yellow
}

# --- Step 4: Run 7 token replacements in correct order ---
Write-Host "[3/7] Running token replacements..." -ForegroundColor Green

# Order matters! Namespace first (most specific), class name last.
$replacements = @(
    @("EvolveWP\PluginBoilerplate\", "$Namespace\"),           # 1. Namespace (in PHP code)
    @("EvolveWP\\PluginBoilerplate\\", "$($Namespace -replace '\\', '\\')\\"),  # 1b. Namespace (escaped in JSON/strings)
    @("PLUGIN_BOILERPLATE_", $ConstantPrefix),                  # 2. Constant prefix
    @("EvolveWP_Boilerplate_", $LegacyPrefix),                  # 3. Legacy class prefix
    @("plugin_boilerplate_", $FunctionPrefix),                   # 4. Function prefix
    @("plugin-boilerplate", $Slug),                              # 5. Slug
    @("PluginBoilerplate", $ClassName),                          # 6. Class name (after namespace!)
    @("Plugin Boilerplate", $DisplayName)                        # 7. Display name (last)
)

$files = Get-ChildItem -Path $TargetDir -Recurse -File | Where-Object {
    $_.FullName -notmatch '\\vendor\\' -and
    $_.FullName -notmatch '\\libraries\\' -and
    $_.FullName -notmatch '\\.git\\' -and
    $_.Extension -match '\.(php|json|js|css|md|txt|pot|bat|yml)$'
}

$totalChanged = 0
foreach ($f in $files) {
    $content = [System.IO.File]::ReadAllText($f.FullName)
    $original = $content
    foreach ($r in $replacements) {
        $content = $content.Replace($r[0], $r[1])
    }
    if ($content -ne $original) {
        [System.IO.File]::WriteAllText($f.FullName, $content)
        $totalChanged++
    }
}
Write-Host "  Replaced tokens in $totalChanged files."

# --- Step 5: Update plugin header ---
Write-Host "[4/7] Updating plugin header..." -ForegroundColor Green
$mainFile = "$TargetDir\$Slug.php"
if (Test-Path $mainFile) {
    $content = [System.IO.File]::ReadAllText($mainFile)
    $content = $content -replace 'Plugin URI:\s+https://evolvewp\.dev', "Plugin URI:  https://evolvewp.dev/plugins/$($Slug -replace 'evolvewp-', '')"
    $content = $content -replace 'Github URI:\s+https://github\.com/FifeCIC/[^\r\n]+', "Github URI:  https://github.com/FifeCIC/$GitHubRepo"
    $content = $content -replace 'Description:\s+[^\r\n]+', "Description: $Description"
    [System.IO.File]::WriteAllText($mainFile, $content)
    Write-Host "  Updated $Slug.php header."
}

# --- Step 6: Update composer.json ---
Write-Host "[5/7] Updating composer.json..." -ForegroundColor Green
$composerFile = "$TargetDir\composer.json"
if (Test-Path $composerFile) {
    $content = [System.IO.File]::ReadAllText($composerFile)
    $content = $content -replace '"description":\s*"[^"]*"', "`"description`": `"$DisplayName - $Description`""
    [System.IO.File]::WriteAllText($composerFile, $content)
    Write-Host "  Updated composer.json."
}

# --- Step 7: Update Composer autoloader ---
Write-Host "[6/7] Updating Composer autoloader..." -ForegroundColor Green
$psr4File = "$TargetDir\vendor\composer\autoload_psr4.php"
if (Test-Path $psr4File) {
    $nsEscaped = $Namespace -replace '\\', '\\\\'
    $psr4Content = @"
<?php

// autoload_psr4.php @generated by Composer

`$vendorDir = dirname( dirname( __FILE__ ) );
`$baseDir   = dirname( `$vendorDir );

return array(
    '$nsEscaped\\' => array( `$baseDir . '/includes' ),
);
"@
    [System.IO.File]::WriteAllText($psr4File, $psr4Content)
    Write-Host "  Updated autoload_psr4.php."
}

# --- Step 8: Remove evolvewp_register_module if present ---
Write-Host "[7/7] Checking for stale tokens..." -ForegroundColor Green
$staleTokens = @('PluginBoilerplate', 'PLUGIN_BOILERPLATE_', 'plugin_boilerplate_', 'plugin-boilerplate', 'Plugin Boilerplate', 'EvolveWP_Boilerplate_')
foreach ($token in $staleTokens) {
    $hits = $files | Select-String -Pattern $token -CaseSensitive -SimpleMatch -List
    if ($hits) {
        Write-Host "  REMAINING: '$token' in $($hits.Count) files" -ForegroundColor Yellow
        $hits | ForEach-Object { Write-Host "    $($_.Path.Replace($TargetDir + '\', ''))" }
    }
}

# Check for evolvewp_register_module
$moduleHits = $files | Select-String -Pattern 'function evolvewp_register_module' -SimpleMatch -List
if ($moduleHits) {
    Write-Host "  WARNING: evolvewp_register_module() still declared — remove manually!" -ForegroundColor Red
    $moduleHits | ForEach-Object { Write-Host "    $($_.Path.Replace($TargetDir + '\', '')):$($_.LineNumber)" }
}

Write-Host "`n=== Clone complete: $DisplayName ===" -ForegroundColor Cyan
Write-Host "Next steps:"
Write-Host "  1. Write a proper README.md"
Write-Host "  2. Restart Apache"
Write-Host "  3. Activate in WordPress and check debug.log"
Write-Host "  4. git add . && git commit -m 'Initial clone from PluginBoilerplate' && git push"
Write-Host ""

<?php
$plugin = rex_plugin::get('out5', 'structure_separator');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('status', 'deaktiviert');
}

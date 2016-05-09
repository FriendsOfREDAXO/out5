<?php
$plugin = rex_plugin::get('out5', 'structure_separators');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('sepp', 'sepp: ');
    $plugin->setConfig('cssColor', '#283542');
    $plugin->setConfig('cssBackground', '#dfe3e9');
    $plugin->setConfig('status', 'deaktiviert');
}

<?php

$plugin = rex_plugin::get('out5', 'min');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('status', 'deaktiviert');
}

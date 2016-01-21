<?php
$plugin = rex_plugin::get('out5', 'border');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('text', 'ACHTUNG: Dies ist die Entwicklungsversion');
    $plugin->setConfig('farbe', '#B02F15');
}


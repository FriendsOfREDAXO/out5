<?php
$plugin = rex_plugin::get('out5', 'email_url');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('status', 'deaktiviert');    
}

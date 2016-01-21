<?php
$plugin = rex_plugin::get('out5', 'wartungsarbeiten');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('url', 'http://www.redaxo.org');
}

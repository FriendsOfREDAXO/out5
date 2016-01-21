<?php

$plugin = rex_plugin::get('out5', 'login_image');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('bild', 'out5_login_image.jpg');
}

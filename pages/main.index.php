<?php

$content = '
Dieses Addon ermöglicht es - auf Basis von Plugins - kleinere Anpassungen am Backend vorzunehmen.
';

$be5_plugins = rex_addon::get('be5')->getInstalledPlugins();

$fragment = new rex_fragment();
$fragment->setVar('class', 'info');
$fragment->setVar('title', 'BE5 - Backend Erweiterungen für Redaxo 5');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');


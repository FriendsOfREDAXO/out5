<?php
$content = '
<p>Diese Plugin erzeugt einen Hinweis mit dem Text "ENTWICKLUNGSVERSION".<p/>



';

$be5_plugins = rex_addon::get('be5')->getInstalledPlugins();

$fragment = new rex_fragment();
$fragment->setVar('class', 'info');
$fragment->setVar('title', 'Border');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

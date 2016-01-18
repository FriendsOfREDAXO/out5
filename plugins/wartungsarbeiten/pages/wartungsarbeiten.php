<?php
$content = '
<p>Umleitung von Frontend Besuchern auf google.de sofern der Benutzer nicht im Backend eingeloggt ist.<p/>

<b>ToDo</b>

<ul>
<li>Verwaltung der gewünschten URL auf die weitergeleitet werden soll</b></li>
</ul>

';

// $be5_plugins = rex_addon::get('be5')->getInstalledPlugins();

$fragment = new rex_fragment();
$fragment->setVar('class', 'info');
$fragment->setVar('title', 'Wartungsarbeiten');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

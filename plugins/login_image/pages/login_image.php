<?php
$content = '
<p>Dies Plugin ermöglicht es ein Kundenlogo auf der Redaxo Login Seite darzustellen.<p/>

<p>Sofern im Medienpool ein Bild mit folgenden Eigenschaften vorhanden ist wird diese angezeigt.</p>
<b>Eigenschaften</p>

<ul>
<li>Dateiname: <b>login_image.jpg</b></li>
<li>Abmessungen: <b>340px + 90px</b></li>
</ul>

';

$be5_plugins = rex_addon::get('be5')->getInstalledPlugins();

$fragment = new rex_fragment();
$fragment->setVar('class', 'info');
$fragment->setVar('title', 'Login Image');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

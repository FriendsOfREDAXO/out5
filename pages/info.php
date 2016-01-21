<?php

$content = '

<h2>ToDo</h2>

<ul>
<li>Anleitung schreiben</li>
<li>Formularfelder formatieren</li>
<li>.lang Dateien anpassen</li>
<li>Formulare schöner machen (+Button)</li>
<li>Formular Media: Login Image</li>
</ul>



';

$fragment = new rex_fragment();
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

<?php
$plugin = rex_plugin::get('out5', 'email_url');

$content = 'Nicht notwendig :-)';


$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', 'E-Mail / externe Links');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

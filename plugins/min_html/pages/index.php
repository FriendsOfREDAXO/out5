<?php
$plugin = rex_plugin::get('out5', 'minHTML');

$content = 'Nicht notwendig :-)';


$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', 'minHTML');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

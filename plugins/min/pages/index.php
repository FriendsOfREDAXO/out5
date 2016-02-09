<?php
$plugin = rex_plugin::get('out5', 'min');

$content = "
<pre>
$ str = file_get_contents('main.css');
$ str = $ str.file_get_contents('navigation.css');
$ str = $ str.file_get_contents('content.css');
$ str = $ str.file_get_contents('media/default.css');


file_put_contents('./media/combinied.min.css', minify_css($ str));

combinied.min.css im Frontend einbinden

";


$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', 'min');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

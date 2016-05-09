<?php
$plugin = rex_plugin::get('out5', 'min');

$content = "
<p>combinied.min.css im Frontend einbinden</p>
<pre>
$ str = file_get_contents('main.css');
$ str = $ str.file_get_contents('navigation.css');
$ str = $ str.file_get_contents('content.css');
$ str = $ str.file_get_contents('media/default.css');


file_put_contents('./media/combinied.min.css', minify_css($ str));
</pre>

<br/>
<p>combinied.min.js im Frontend einbinden</p>

<pre>
// if (!file_exists('./assets/js/combinied.js')) {

$ str = file_get_contents('./assets/vendor/jquery/domscript.js');
$ str = $ str.file_get_contents('./assets/vendor/jquery/jquery.cookiebar.js');
file_put_contents('./assets/js/domscript.js', minify_js($ str));

// }
</pre>
($ str ohne Leerzeichen)
";


$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', 'min');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

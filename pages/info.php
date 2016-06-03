<?php

$file = rex_file::get(rex_path::addon('out5','README.md'));
$Parsedown = new Parsedown();
$content =  $Parsedown->text($file);

$fragment = new rex_fragment();
$fragment->setVar('title', 'Hilfe');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');



$file = rex_file::get(rex_path::addon('out5','CHANGELOG.md'));
$Parsedown = new Parsedown();
$content =  $Parsedown->text($file);

$fragment = new rex_fragment();
$fragment->setVar('title', 'Changelog');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');


$file = rex_file::get(rex_path::addon('out5','LICENSE.md'));
$Parsedown = new Parsedown();
$content =  $Parsedown->text($file);

$fragment = new rex_fragment();
$fragment->setVar('title', 'Lizenz');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

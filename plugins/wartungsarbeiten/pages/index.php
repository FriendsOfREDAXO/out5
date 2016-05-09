<?php
$plugin = rex_plugin::get('out5', 'wartungsarbeiten');

$content = '';

if (rex_post('config-submit', 'boolean')) {
    $plugin->setConfig(rex_post('config', [
        ['url', 'string'],
    ]));

    $content .= rex_view::info('Änderung gespeichert');
}

$content .=  '
<div class="rex-form">
    <form action="' . rex_url::currentBackendPage() . '" method="post">
        <fieldset>';

$formElements = [];

$n = [];
$n['label'] = '<label for="rex-out5-wartungsarbeiten-url">URL</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-out5-wartungsarbeiten-url" name="config[url]" value="' . $plugin->getConfig('url') . '"/>';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/form.php');

$content .= '
        </fieldset>

        <fieldset class="rex-form-action">';

$formElements = [];

$n = [];
$n['field'] = '<div class="btn-toolbar"><button id="rex-out5-wartungsarbeiten-save" type="submit" name="config-submit" class="btn btn-save rex-form-aligned" value="1">Einstellungen speichern</button></div>';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/submit.php');

$content .= '
        </fieldset>

    </form>
</div>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', 'Wartungsarbeiten - Einstellungen');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

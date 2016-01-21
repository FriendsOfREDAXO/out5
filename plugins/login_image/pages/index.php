<?php
$plugin = rex_plugin::get('out5', 'login_image');

$content = '';

if (rex_post('config-submit', 'boolean')) {
    $plugin->setConfig(rex_post('config', [
        ['bild', 'string'],
    ]));

    $content .= rex_view::info('Änderung gespeichert');
}

$content .=  '
<div class="rex-form">
    <form action="' . rex_url::currentBackendPage() . '" method="post">
        <fieldset>';

$formElements = [];

$n = [];
$n['label'] = '<label for="rex-out5-login_image">Dateiname<br/>(Name der Datei im Medienpool 340x90px)</label>';

$n['field'] = '<input id="rex-out5-login_image" type="text" name="config[bild]" value="'.$plugin->getConfig('bild') . '" >';

$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/form.php');

$content .= '
        </fieldset>

        <fieldset class="rex-form-action">';

$formElements = [];

$n = [];
$n['field'] = '<input type="submit" name="config-submit" value="Speichern" />';
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
$fragment->setVar('title', 'Login Image - Einstellungen');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

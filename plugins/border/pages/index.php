<?php
$plugin = rex_plugin::get('out5', 'border');

$content = '';

if (rex_post('config-submit', 'boolean')) {
    $plugin->setConfig(rex_post('config', [
        ['text', 'string'],
        ['farbe', 'string'],
    ]));

    $content .= rex_view::info('Änderung gespeichert');
}

$content .=  '
<div class="rex-form">
    <form action="' . rex_url::currentBackendPage() . '" method="post">
        <fieldset>';

$formElements = [];

$n = [];
$n['label'] = '<label for="rex-out5-border-text">Text</label>';
$n['field'] = '<input type="text" id="rex-out5-border-text" name="config[text]" value="' . $plugin->getConfig('text') . '"/>';
$formElements[] = $n;

$n['label'] = '<label for="rex-out5-border-farbe">Farbe</label>';
$n['field'] = '<input type="text" id="rex-out5-border-farbe" name="config[farbe]" value="' . $plugin->getConfig('farbe'). '"/>';
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
$fragment->setVar('title', 'Border - Einstellungen');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

<?php
$plugin = rex_plugin::get('out5', 'structure_separators');

$content = '';

if (rex_post('config-submit', 'boolean')) {
    $plugin->setConfig(rex_post('config', [
        ['sepp', 'string'],
        ['cssColor', 'string'],
        ['cssBackground', 'string'],
    ]));

    $content .= rex_view::info('Änderung gespeichert');
}

$content .=  '
<div class="rex-form">
    <form action="' . rex_url::currentBackendPage() . '" method="post">
        <fieldset>';

$formElements = [];

$n = [];
$n['label'] = '<label for="rex-out5-sepp-text">Separator</label>';
$n['field'] = '<input class="form-control"  type="text" id="rex-out5-sepp-text" name="config[sepp]" value="' . $plugin->getConfig('sepp') . '"/>';
$formElements[] = $n;

$n['label'] = '<label for="rex-out5-sepp-farbe">Textfarbe</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-out5-sepp-farbe" name="config[cssColor]" value="' . $plugin->getConfig('cssColor'). '"/>';
$formElements[] = $n;

$n['label'] = '<label for="rex-out5-sepp-farbe">Hintergrundfarbe</label>';
$n['field'] = '<input class="form-control" type="text" id="rex-out5-sepp-farbe" name="config[cssBackground]" value="' . $plugin->getConfig('cssBackground'). '"/>';
$formElements[] = $n;


$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/form.php');

$content .= '
        </fieldset>

        <fieldset class="rex-form-action">';

$formElements = [];

$n = [];
$n['field'] = '<div class="btn-toolbar"><button id="rex-out5-sepp-save" type="submit" name="config-submit" class="btn btn-save rex-form-aligned" value="1">Einstellungen speichern</button></div>';
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
$fragment->setVar('title', 'Structure Separator - Einstellungen');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

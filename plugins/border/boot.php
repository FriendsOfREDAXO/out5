<?php
if (rex::isBackend()) {
    rex_extension::register('OUTPUT_FILTER',function(rex_extension_point $ep){
    $suchmuster = '<div id="rex-start-of-page" class="rex-page">';
    $ersetzen = '<div style="font-size: 12px; background-color: #B12F14; color: #fff; width: 100%; font-weight: bold; text-align: center; padding: 8px 0 6px 0; text-transform: uppercase; ">Entwicklungsversion</div><div id="rex-start-of-page" class="rex-page">';
    $ep->setSubject(str_replace($suchmuster, $ersetzen, $ep->getSubject()));
    });
}

<?php
if (rex::isBackend()) {
  rex_extension::register('OUTPUT_FILTER',function(rex_extension_point $ep){

  $filepath = '';
  if ($file = rex_media::get('login_image.jpg')) {
    $filepath = '<img src="../media/login_image.jpg" width="340" height="90" alt="Bitte anmelden"/>';
  } else {
    $filepath = '<img src="/assets/addons/be5/plugins/login_image/images/be5_customer_logo.jpg" width="340" height="90" alt="Bitte anmelden"/>';
  }

    $suchmuster = '<header class="panel-heading"><div class="panel-title">Bitte anmelden.</div></header>';
    $ersetzen = '<header class="panel-heading">'.$filepath.'</header>';
    $ep->setSubject(str_replace($suchmuster, $ersetzen, $ep->getSubject()));
    });
}

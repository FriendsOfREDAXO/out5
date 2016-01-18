<?php
if (!rex::isBackend()) {

  $offline_url = 'http://www.google.de';

  $session = rex_backend_login::hasSession();

  if (!$session) {
    header('Location: ' . $offline_url);
   exit;
  }

}

<?php
if (!rex::isBackend()) {

  $session = rex_backend_login::hasSession();

  if (!$session) {
    header('Location: ' . $this->getConfig('url'));
   exit;
  }

}

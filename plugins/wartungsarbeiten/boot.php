<?php
if (!rex::isBackend()) {
	if ($this->getConfig('status') != 'deaktiviert') {
		$session = rex_backend_login::hasSession();
		if (!$session) {
			header('Location: ' . $this->getConfig('url'));
			exit;
  		}
  	}
}

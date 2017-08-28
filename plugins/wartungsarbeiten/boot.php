<?php
if (!rex::isBackend()) {
	if ($this->getConfig('status') != 'deaktiviert') {
		$session = rex_backend_login::hasSession();
		if (!$session or $this->getConfig('ip')!=$_SERVER['REMOTE_ADDR']) {
			header('Location: ' . $this->getConfig('url'));
			exit;
  		}
  	}
}


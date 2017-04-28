<?php
if (!rex::isBackend()) {
	if ($this->getConfig('status') != 'deaktiviert') {
		$session = rex_backend_login::hasSession();
		$ipcheck = $_SERVER['REMOTE_ADDR'];
		if (!$session and $ipcheck!=$this->getConfig('ip')) {
			header('Location: ' . $this->getConfig('url'));
			exit;
  		}
  	}
}


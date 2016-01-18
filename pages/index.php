<?php

/** @var rex_addon $this */

echo rex_view::title($this->i18n('title'));

// Alle Plugins laden
$plugin = rex_be_controller::getCurrentPagePart(3); // be5/main/login_image / 1 = be5; 2 = main; 3 = login_image
if(!empty($plugin)) { 
  $Plugin = $this->getPlugin($plugin);
  if(!is_a($Plugin,'rex_null_plugin')) { // Gibts das plugin in? oder nicht?
    include $Plugin->getPath('pages/index.php'); // index.php im Pages-Verzeichnis einbinden
  } else $plugin = null; // Plugin null setzen für weiter unten
} 

// Für alle Seiten die nicht von Plugins generiert wurden
if(empty($plugin)) {
  include rex_be_controller::getCurrentPageObject()->getSubPath();
}
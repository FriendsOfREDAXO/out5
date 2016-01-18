<?php

if (rex::isBackend() && is_object(rex::getUser())) {
    rex_perm::register('be5[]');
}

// $this->getInstalledPlugins();

$InstalledPlugins = $this->getAvailablePlugins();

if(!empty($InstalledPlugins)) {
  $Page = $this->getProperty('page');
  foreach($InstalledPlugins as $key => $plugin) {

    $icon = $plugin->getProperty('nav_icon');
    if (!$icon) {
      $icon = 'fa-cubes';
    }
    $title = $plugin->getProperty('title');
    if (!$title) {
      $title = $key;
    }
    rex_perm::register('be5['.$key.']'); // with perms?
    $Page['subpages']['main']['subpages'][$key] = [
      'title' => $title,
      'perm' => 'be5['.$key.']', // with perms?
       'icon' => 'rex-icon '.$icon.''
    ];
  }
  $this->setProperty('page',$Page);
}


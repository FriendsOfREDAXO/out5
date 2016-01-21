<?php

$func               = rex_request('func', 'string');

if ($func == '') {
$content = '
<section class="rex-page-section">
  <div class="panel panel-default">
  <header class="panel-heading"><div class="panel-title">Liste der verfügbaren Filter</div></header>
  <form action="index.php?page=out5/uebersicht" method="post">
    <table class="table">
      <thead>
        <tr>
          <th class="rex-table-icon"></th>
          <th>Name</th>
          <th>Kurzbeschreibung</th>
          <th>Umgebung</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
';

$AvailablePlugins = $this->getAvailablePlugins();
$i=0;
if(!empty($AvailablePlugins)) {
  $Page = $this->getProperty('page');
  foreach($AvailablePlugins as $key => $plugin) {

    $i++;

    $icon = $plugin->getProperty('nav_icon');
    if (!$icon) {
      $icon = 'fa-cubes';
    }
    $title = $plugin->getProperty('title');
    if (!$title) {
      $title = $key;
    }
    $kurzbeschreibung = $plugin->getProperty('kurzbeschreibung');
    if (!$kurzbeschreibung) {
      $kurzbeschreibung = $key;
    }
    $umgebung = $plugin->getProperty('umgebung');
    if (!$umgebung) {
      $umgebung = $key;
    }
    rex_perm::register('out5['.$key.']'); // with perms?
    $Page['subpages']['main']['subpages'][$key] = [
      'title' => $title,
      'perm' => 'out5['.$key.']', // with perms?
      'icon' => 'rex-icon '.$icon.''
    ];

$content .= '
  <tr>
    <td class="rex-table-icon"><a href="index.php?page=out5/'.$key.'&amp;func=edit"><i class="rex-icon '.$icon.'"></i></a></td>
    <td data-title="Name">
      <a href="index.php?page=out5/'.$key.'&amp;func=edit">'.$title.'</a>
    </td>

    <td  data-title="Kurzbeschreibung" >'.$kurzbeschreibung.'</td>
    <td data-title="Umgebung">'.$umgebung.'</td>
    <td class="rex-table-action"><a href="index.php?page=out5/'.$key.'/"><i class="rex-icon rex-icon-edit"></i> editieren</a></td>
  </tr>
';

  }
  $this->setProperty('page',$Page);
}

$content .= '
     </tbody>
    </table>
</form>
  </div>
</section>
';

echo $content;
}

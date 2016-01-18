<?php

// echo rex_view::title($this->i18n('title')); 

$subpage = rex_be_controller::getCurrentPagePart(3);
include $subpage.'.php'; // hier einfach nur die anderen Seiten einbinden!	
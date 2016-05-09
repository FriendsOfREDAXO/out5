  <?php


  if (rex::isBackend()) {
  	if ($this->getConfig('status') != 'deaktiviert') {

        if (rex_be_controller::getCurrentPage() == 'structure') {
            rex_extension::register('OUTPUT_FILTER', function(rex_extension_point $ep) {

                // settings
                // - - - - - - - - - - - - - - - - - -
                // separator
                $sepp = $this->getConfig('sepp');
                // color
                $cssColor = $this->getConfig('cssColor');
                // background
                $cssBackground = $this->getConfig('cssBackground');
                // - - - - - - - - - - - - - - - - - -
                // settings end


                $seppClass = preg_replace('/\W+/', '', $sepp);
                $html = $ep->getSubject();
                $put = '
    <script>
    var $sepp = "' . $sepp . '";
    var $seppClass = "' . $seppClass . '";
    $(document).on("rex:ready", function (event, container) {
        container.find(\'tr:contains("\' + $sepp + \'")\').each(function () {
            $(this).addClass($seppClass);
            var $td = $(this).find(\'td:contains("\' + $sepp + \'")\').addClass($seppClass);
            var $regex = new RegExp($sepp, "g");
            $td.html($td.html().replace($regex, "")).find("a").contents().unwrap();
        });
    });
    </script>
    <style>
    .' . $seppClass . ' > td {
        background-color: ' . $cssBackground . ';
    }
    .' . $seppClass . ' > td,
    .' . $seppClass . ' > td a {
        color: ' . $cssBackground . ';
    }
    .' . $seppClass . ' > td.' . $seppClass . ' {
        color: ' . $cssColor . ';
        font-size: 85%;
        font-weight: 700;
        vertical-align: middle;
    }
    </style>
    ';
                $html = str_replace('</body>', $put . '</body>', $html);
                $ep->setSubject($html);

            });
        }


  	}
  }





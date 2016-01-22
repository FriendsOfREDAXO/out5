<?php
if (rex::isBackend()) {
	if ($this->getConfig('status') != 'deaktiviert') {


		if (!rex_request::isPJAXRequest()) {


	
	   if(rex_request('page','string')=='structure'){
		   rex_extension::register('OUTPUT_FILTER',function(rex_extension_point $ep){
	
	        $dom = new DOMDocument();
	        @$dom->loadHTML($ep->getSubject());  // Warnings unterdrückt wegen Element: nav
	        $dom->validate();
	        $xpath = new DOMXpath($dom);
	
	        $TRs = $xpath->query(".//table/tbody/tr");
	        if (!is_null($TRs)) {
	          foreach ($TRs as $TR) {
	            $TDs = $TR->childNodes;
	            foreach ($TDs as $TD) {
	              if(substr($TD->nodeValue,0,10) == 'separator:'){
	                $name = str_replace('separator:','',$TD->nodeValue);
	                $TR->setAttribute('class','separator');
	                $TD->nodeValue = $name;
	                continue;
	              }else{
	                continue;
	              }
	            }
	          }
	        }
	        $TRs = $xpath->query('.//tr[@class="separator"]');
	          if (!is_null($TRs)) {
	            foreach ($TRs as $TR) {
	              $TDs = $TR->childNodes;
	              $counter = 0;
	              $replace = array(1,3,7);
	              foreach ($TDs as $TD) {
	                $counter++;
	                if(in_array($counter,$replace)) {
	                  $TD->nodeValue= ' ';
	                }
	              }
	            }
	          }
	        $html = $dom->saveHtml();
	        $ep->setSubject($html);
	        }
	      );
	    }
	  // rex_view::addCssFile($this->getAssetsUrl('css/be5plus.css'));
	

		} 


	}
	

}

	?>
	<style>
		tr.separator {
			font-size: 12px;
			font-weight: bold;
			background: #fff;
			border-top: 2px solid #DFE3E9;
			border-bottom: 2px solid #DFE3E9;			
		}

		tr.separator:hover {
			background: #fff !important;
		}

		tr.separator .rex-table-action a{
			font-weight: normal;
 		    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
			filter: alpha(opacity=20);
			-moz-opacity: 0.2;
			-khtml-opacity: 0.2;
			opacity: 0.2;			
		}
		tr.separator .rex-table-action a:hover {
 		    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
			filter: alpha(opacity=100);
			-moz-opacity: 1;
			-khtml-opacity: 1;
			opacity: 1;			
		}		
		
		
		
		
		
		</style>
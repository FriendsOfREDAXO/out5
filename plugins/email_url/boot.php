<?php
if (!rex::isBackend()) {


  rex_extension::register('OUTPUT_FILTER',function(rex_extension_point $ep){
	  preg_match_all("/<a[^>]*(href\s*=\s*(\"|')(mailto)(?=:).*?(\"|'))[^>]*>(.*?)<\/a>/ims", $ep->getSubject(), $matches);

	 // hier jetzt alle gefundenen durchgehen und um klasse erweitern
	  if ( isset ($matches[0][0]) and $matches[0][0] != '')
	  {
	    for ($m = 0; $m < count ($matches[0]); $m++)
	    {
	      $msearch = $matches[0][$m];
	      if (strstr($matches[0][$m], 'class='))
	      {
	        $mreplace = $matches[0][$m];
	      }
	      else
	      {
	        $mreplace = str_replace('href=', 'class="email" href=', $matches[0][$m]);
	      }
	     $ep->setSubject(str_replace($msearch, $mreplace,  $ep->getSubject()));
	    }
	  }

	  // hier jetzt alle gefundenen durchgehen und crypt
	  if ( isset ($matches[1][0]) and $matches[1][0] != '')
	  {
	    for ($m = 0; $m < count ($matches[1]); $m++)
	    {
	      $va = explode('mailto:', $matches[1][$m]);
	      $originalemail = str_replace('"', '', $va[1]);
	
	      $encryptedemail = '';
	      for ($i=0; $i < strlen($originalemail); $i++) {
	        $encryptedemail .= '&#'.ord(substr($originalemail, $i, 1)).';';
	      }
	
	      $msearch = 'mailto:'.$originalemail;
	      $mreplace = 'mailto:'.str_replace('&#64;', '%40', $encryptedemail);
	      $ep->getSubject(str_replace($msearch, $mreplace, $ep->getSubject()));
	
	      $msearch = $originalemail;
	      $mreplace = $encryptedemail;
          $ep->setSubject(str_replace($msearch, $mreplace,  $ep->getSubject()));

	    }
	  }

	/**
	 * Kennzeichnung externe Links mit Ausnahme
	 */

	 $excl = array();
	 // Von der Ersetzung ausgeschlossen:
	 // $excl[] = 'href="' . $REX['SERVER'];
	 // $excl[] = 'href="http://' . $_SERVER['HTTP_HOST'];
	 // $excl[] = 'href="https://' . $_SERVER['HTTP_HOST'];
	 // $excl[] = '#top';
	 // $excl[] = '#nav';
	 // $excl[] = '#mainnav';
	 // $excl[] = '#content';
	 // $excl[] = 'href="http://www.facebook.com';
	 // $excl[] = 'href="http://twitter.com';

	  // hier via regEx alle absoluten, externen Linkadressen heraussuchen
	  preg_match_all("/<a[^>]*(href\s*=\s*(\"|')(http(s)?|ftp(s)?|telnet|irc)(?=:\/\/).*?(\"|'))[^>]*>(.*?)<\/a>/ims",  $ep->getSubject(), $matches);
	
	  if ( isset ($matches[0][0]) and $matches[0][0] != '')
	  {
	    $srch = $repl = array();
	    for ($m = 0; $m < count ($matches[0]); $m++)
	    {
	      $msearch = $matches[0][$m];
	      if (strstr($matches[0][$m], 'class='))
	      {
	        $mreplace = $matches[0][$m];
	      }
	      else
	      {
	        $mreplace = str_replace('href=', 'class="extern" href=', $matches[0][$m]);
	      }
	  for ($x = 0; $x < count($excl); $x++)
      {
        if (strstr($matches[1][$m], $excl[$x]))
        {
          $mreplace = $matches[0][$m];
        }
      }

	      $srch[] = $msearch;
	      $repl[] = $mreplace;
	    }
         $ep->setSubject(str_replace($srch, $repl,  $ep->getSubject()));
	  } 
	  
	  
  });
}




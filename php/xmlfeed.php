<?php 	
	
	/**
	* 
	*/
	class Anzeigen 
	{

		
		public $xmlURI 		= 'http://stellen-online.de/index.php/jobexport.html?scope=standard&consumer=feed_premium&username=standard&password=standard0815';
		public $xmlLocal 	= 'jobexport.html.xml';

		function __construct(){
			echo 'Klasse Anzeige geht<br /><br />';
		}

		function getAnzeige($local){			
			$xmlURL = ($local) ? $this->xmlURI : $this->xmlLocal;

			echo 'URL: '.$xmlURL.'<br />';

			$xml = simplexml_load_file($xmlURL);
			$json = json_encode($xml);

			print_r($json);
			// return $_GET[$json;
		}
	}

	$anzeige = new Anzeigen();

	$anzeige->getAnzeige(true);

 ?>
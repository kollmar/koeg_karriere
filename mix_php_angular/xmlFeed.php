<?php 	
	
	/**
	* 
	*/
	class Anzeigen 
	{

		
		public $xmlURI 		= 'http://stellen-online.de/index.php/jobexport.html?scope=standard&consumer=feed_premium&username=standard&password=standard0815';
		public $xmlLocal 	= 'media/js/jobexport.html.xml';
		public $koeag		= 'KÖNIGSTEINER AGENTUR GmbH';

		function __construct(){
			// echo 'Klasse Anzeige geht<br /><br />';
		}

		function getAnzeige($local){			
			$xmlURL = ($local) ? $this->xmlURI : $this->xmlLocal;

			// echo 'URL: '.$xmlURL.'<br /><br />';

			$xml  = simplexml_load_file($xmlURL);
			$array = array();
			$i = 0;

			foreach ($xml->job as $key) {
				if ((string) $key->companyname1 == $this->koeag) {
					$array[$i]['company']  = (string) $key->companyname1;
					$array[$i]['location'] = (string) $key->location;
					$array[$i]['position'] = (string) $key->position;

					$i++;
				}
			}

			
			$xmlFeed = json_encode($array, JSON_UNESCAPED_UNICODE );
			
			print_r($xmlFeed);

			if (isset($_GET['callback'])){
				return $_GET['callback'].'('.$xmlFeed.');';
			}
			
		}
	}

	$anzeige = new Anzeigen();
	$anzeige->getAnzeige(false);

	// if(isset($_GET['lokal']) == false){
	// 	$anzeige->getAnzeige(false);
	// }
	// else{
	// 	$anzeige->getAnzeige(true);
	// }

 ?>
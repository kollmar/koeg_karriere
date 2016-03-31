<?php 
	/**
	* 
	*/
	class Test
	{
		public $test;
		public $local;
		public $xmlFile;
		public $xmlURI;


		function __construct($local=NULL)
		{

			if($local){

				$this->xmlURI = 'jobexport.html.xml';
				echo "Lokale Datei: ".$this->xmlURI."<br /><br />";
			}
			else {
				$this->xmlURI = 'http://stellen-online.de/index.php/jobexport.html?scope=standard&consumer=feed_premium&username=standard&password=standard0815';
				echo "Nicht lokal: ".(string) $this->xmlURI;
			}
		}
 
		function filtXML ($filterFirma){
			$koeag = ($filterFirma == 'koeag') ? 'KÖNIGSTEINER AGENTUR GmbH' : $filterFirma;
			$xmlFile = $this->xmlURI;
			$file_header = @get_headers($xmlFile);

			echo 'File Header: '.$file_header;

			if($xmlFile !== 'HTTP/1.1 404 Not Found'){

				$xml = simplexml_load_file($xmlFile) or die( 'error!');

				foreach ($xml->job as $key) {

					if ((string) $key->companyname1 == $koeag) {

						echo '<tr>
							 	<td>'.(string) $key->position.'</td>
							 	<td>'.(string) $key->location.'</td>
							 	<td>'.(string) $key->companyname1.'</td>
							 </tr>';
					}
				}
			}
			else {
				exit('Konnte .xml nicht öffnen');
			}
		}
	}
 ?>
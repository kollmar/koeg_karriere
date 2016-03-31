<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>test</title>
	<link rel="stylesheet" href="">

</head>
<body>	
	<?php  
		try {			
			include ("test.php");
			$anzeige = new Test(true);

			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	?>
	<h1>PHP - Version </h1>
	
	<table>		
		<thead>
			<tr>
				<th>Position</th>
				<th>Standort</th>
				<th>Firma</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
				$anzeige->filtXML('koeag');
			
			?>
		</tbody>
	</table>

</body>
</html>
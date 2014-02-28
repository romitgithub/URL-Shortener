<?php

	include 'connect.inc.php';

	if (isset($_GET['shortcode'])) {
		$shortcode = $_GET['shortcode'];

		$query = "SELECT long_url FROM main WHERE short_code='$shortcode'";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);

		if($num==1){

			$row = mysql_fetch_row($result);
			$longurl = $row[0];

			$update = "UPDATE main SET counter = counter+1 WHERE short_code='$shortcode'";
			mysql_query($update);

			header( "Location: $longurl" ) ;

		}
	}


?>

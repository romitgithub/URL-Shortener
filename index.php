<?php


	include_once 'connect.inc.php';



?>
<!DOCTYPE html>
<html lan='en'>
	<head>
		<title>URL Shortener</title>
		<meta name='author' content='Romit Choudhary'>
		<meta http-equiv='cache-control' content='public'>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta http-equiv='content-language' content='en-US'>
		<meta name='copyright' content='&copy; 2014 Romit Choudhary'>
		<meta name='description' content='URL shortener converts long url to short url.'>
		<meta name='keywords' content='url shortener, short url, tiny url, small url , long url, big url, convert long url to short url, romits url shortener'>
		<meta name='robots' content='index,follow'>
		<meta property='og:title' content='URL Shortener'>
		<meta property='og:type' content='website'>
		<meta property='og:site_name' content='URL Shortener'>
		<meta property='fb:admins' content='100002095998425'>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<div id='content' align='center'>
			<div id='logo'>
				<p>
					<span id='one'>URL</span>
					<span id='two'>shortener</span>
				</p>
			</div>
			<div id='form'>
				<form action='index.php' method='post'>
					<input type='text' name='url' placeholder='Paste Your long URL here and Hit Enter'><br>
				</form>
			</div>
		</div>

			<span id='encodedurl' align='center'>
		<?php
				

				if (isset($_POST['url'])) {
		
					$url = $_POST['url'];

					if (empty($url)) {
						echo $message = '<p>No url was supplied</p>';
					}
					elseif (validateUrlFormat($url) == false) {
						echo $message = '<p>URL does not have a valid format.</p>';
					}
					elseif (checkUrlExists($url) == false) {
						echo $message = '<p>URL does not appear to exist.</p>';
					}
					elseif (urlExistsinDB($url) == true) {
						$shortcode = urlExistsinDB($url);
						echo $message = "<div id='error' title='Copy this code'>Copy this url to share  -  <b style='font:bold 18px arial;margin-left:5px;color:green;'>$shortcode</b></div>";
					}
					else{
						$shortcode = createShortCode($url);
						echo "<div id='error' title='Copy this code'>Copy this url to share  -  <b style='font:bold 18px arial;margin-left:5px;color:green;'>$shortcode</b></div>";
					}
				}





				?>
			</span>
			<div id='datalink'>
				<a href="list.php">Click here to see all the links whuch were shortened</a>
			</div>
			<div id='footer'>
				<span id='copy'>Copyright &copy Romit Choudhary 2014</span>
				<span id='social'>
					<a href="http://www.facebook.com/choudharyromit" target='_blank'>Facebook</a>  |  <a href="https://twitter.com/RomitChoudhary1" target='_blank'>Twitter</a>  |  <a href="https://plus.google.com/u/0/+RomitChoudhary/posts" target='_blank'>Google+</a>  |  <a href="http://www.linkedin.com/pub/romit-choudhary/71/4b9/522" target='_blank'>Linkedin</a>
				</span>
			</div>
	</body>
</html>	

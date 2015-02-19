<!doctype html>
<html>
	<head>

		<title>Step 1</title>
		<script src="lib/jquery/jquery-1.11.1.min.js"></script>
		<script src="lib/jquery/jquery-ui.js"></script>
		<script src='lib/jquery/autosizeinput.js'></script>
		<link rel="stylesheet" href="lib/jquery/jquery-ui.css">
		<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Comfortaa:700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="http://php.net/images/logos/php_xpstyle.ico" type="image/ico">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>
			.ui-autocomplete {
			   font-family: 'Coming Soon', cursive;
			   font-size: 26px;
				/* width: 245px;
				max-height: 250px;
				 prevent horizontal scrollbar */
				overflow-x: hidden;
			}
			p, li {
			   font-family: 'Comfortaa', cursive;
				font-size: 26px;
			}
			input {
			   font-family: 'Coming Soon', cursive;
			   font-size: 26px;
				text-align: left;
				-webkit-transition: width 0.6s;
				-moz-transition: width 0.6s;
				transition: width 0.6s;
				width: 250px;
				min-width: 250px;
			}
			button  {
			   font-family: 'Comfortaa', cursive;
			   font-size: 26px;
				text-align: center;
				width: 254px;
			}
			#help {
			  position: fixed;
			  bottom: 0;
			  right:0;
			}
		</style>
		<script>
		$(function() {
			var availableTags = [
				<?php
					foreach (glob("*.webm") as $vypis) {
						echo '"'.$vypis.'",';
					}
					foreach (glob("*.mp4") as $vypis) {
						echo '"'.$vypis.'",';
					}
					foreach (glob("*.mkv") as $vypis) {
						echo '"'.$vypis.'",';
					}
					foreach (glob("*.ogv") as $vypis) {
						echo '"'.$vypis.'",';
					}
				?>
			];
			$( "#videoname" ).autocomplete({
				source: availableTags
			});
			$(videoname).autosizeInput();
			$(csfdname).autosizeInput();
		});
		</script>
	</head>
	<body>
<a href="http://jakubkrizka.php5.cz"><button class="home_button">Domovská stránka</button></a><hr>
	<a href="https://github.com/you"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
		<form action="step2.php" method="post">
			<input type="text" name="videoname" id="videoname" placeholder="Název souboru..."/>
			<br>
			<input type="text" name="csfdname" id="csfdname" autocomplete="off" placeholder="Název filmu..."/>
			<br>
			<button type="submit">Pokračovat</button>
		</form>
		<hr>
		<p>
         <?php
			echo 'Video soubory: <br>';
			foreach (glob("*.webm") as $vypis) {
				echo '<li>'.$vypis.'</li>';
			}
			foreach (glob("*.mp4") as $vypis) {
				echo '<li>'.$vypis.'</li>';
			}
			foreach (glob("*.mkv") as $vypis) {
				echo '<li>'.$vypis.'</li>';
			}
			foreach (glob("*.ogv") as $vypis) {
				echo '<li>'.$vypis.'</li>';
			}
		?>
		</p>
		<p><a href="http://goo.gl/lNahXl">Zdroj</a></p>
		<div id="help"><a href="http://php.net/" target="_blank"><img src="http://php.net/images/logos/php-power-white.png"></a></div>

	</body>
</html>
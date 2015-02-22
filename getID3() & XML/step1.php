<html>
	<head>
		<title>Step 1</title>
		<?php
			include('head.html');
		?>
		<style>
			body, input, button, p, li, a {
				font-size: 26px;
			}
			p, li, a {
			   font-family: 'Comfortaa', cursive;
			}
			input {
			   font-family: 'Coming Soon', cursive;
				text-align: left;
				transition: width 0.6s;
				width: 250px;
				min-width: 250px;
			}
			button  {
			   font-family: 'Comfortaa', cursive;
				text-align: center;
				width: 250px;
			}
			.ui-autocomplete {
			   font-family: 'Coming Soon', cursive;
				/* prevent horizontal scrollbar */
				overflow-x: hidden;
			}
		</style>
		<script>
		$(function() {
			// define autocomplete variables
			// definování proměných automatického doplňování 
			var availableTags = [
				<?php
					// show all video files
					// výpis video souborů
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
			// set auto-complete input
			// nastavení automatického doplňování neboli předdefinované návrhy
			$( "#videoname" ).autocomplete({
				source: availableTags
			});
			// set autosize input
			// nastavení automatického zvěthování pole s přibýjacím počtem znaků
			$(videoname).autosizeInput();
			$(csfdname).autosizeInput();
		});
		</script>
	</head>
	<body>
		<?php
			include("top.html");
		?>
		<!-- Form -->
		<form action="step2.php" method="post">
			<input type="text" name="videoname" id="videoname" placeholder="Název souboru..."/>
			<br>
			<input type="text" name="csfdname" id="csfdname" autocomplete="off" placeholder="Název filmu..."/>
			<br>
			<button type="submit">Pokračovat <i class="fa fa-angle-double-right"></i></button>
		</form>
		<hr>
		<p>
		<?php
			// show all video files
			// výpis video souborů
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
		<hr>
			<a href="http://goo.gl/lNahXl">Zdroj</a>
		</p>
		<?php
			include('bottom.html');
		?>
	</body>
</html>
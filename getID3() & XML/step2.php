<?php
	// include CSFD - XML api
	// přidání knihovny CSFD - XML
	include 'lib/csfd/global.php';
	// get POST variables
	// získání post promenné + uprava znaku mezery
	$videoname = $_POST['videoname'];
	$csfdname = $_POST['csfdname'];
	$csfdnamesearch = str_replace(" ", "+", $csfdname);
	// search name in CSFD api
	// vyhledání názvu v aplikaci csfd
	logAction('HLEDAT: '.$csfdnamesearch);
	$html = file_get_html('http://www.csfd.cz/hledat/?q='.$csfdnamesearch);
	$filmy = '';
	$i = 0;
	// define 
	// dosazení výsledku
	foreach( $html->find('#search-films li') as $film_html){
		$i++;
		$film = str_get_html($film_html);
		$filmy[$i]['nazev'] = $film->find('a.film', 0)->innertext;
		$el_type = $film->find('.film-type', 0);
		$filmy[$i]['typ'] = $el_type ? $el_type->innertext : null;
		$filmy[$i]['rating'] = csfdRating( $film->find('a.film', 0)->class );
		$filmy[$i]['id'] = csfdId( $film->find('a.film', 0)->href );
		$filmy[$i]['rok'] = csfdHledatRok( $film );
	}
	if(!$filmy AND $html->find('#pg-film', 0)){
		$info = $html->find('.info', 0);
		$filmy[1]['nazev'] = trim( $info->find('h1', 0)->innertext );
		$filmy[1]['rok'] = csfdHledatRok( $info->find('.origin', 0) );
		$filmy[1]['id'] = csfdId( $html->find('.trivia a', 0)->href );
	  $filmy[$i]['typ'] = $el_type ? $el_type->innertext : null;
	}
?>
<html>
	<head>
		<title>Step 2</title>
		<?php
			include('head.html');
		?>
		<style>
			a {
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
			.hide {
				visibility: hidden;
				width: 3px;
				height: 3px;
			}
		</style>
		<script>
		</script>
	</head>
	<body>
		<?php
			include("top.html");
		?>
		<input type="text" name="videoname" id="videoname" value="<?php echo $videoname; ?>" disabled/>
		<br>
		<input type="text" name="csfdname" id="csfdname" value="<?php echo $csfdname; ?>" disabled/>
		<hr>
			<?php
				// výpis
				foreach($filmy as $film){
					echo '<form action="step3.php" method="post">';
					echo '<a target="_blank" href="http://www.csfd.cz/film/'.$film['id'].'">'.$film['nazev'].' ('.$film['rok'].') '.$film['typ'].'</a>';
					echo '<input class="hide" name="videoname" value="'.$videoname.'"/>';
					echo '<input class="hide" name="csfdid" value="'.$film['id'].'"/>';
					echo '<input class="hide" name="csfdname" value="'.$csfdname.'"/>';
					echo '<input class="hide" name="csfdrok" value="'.$film['rok'].'"/>';
					echo '<input class="hide" name="odeslane_csfd" value="http://www.csfd.cz/film/'.$film['id'].'"/>';
					echo '<br>';
					echo '<button type="submit" id="'.$film['id'].'">Pokračovat <i class="fa fa-angle-double-right"></i></button>';
					echo '</form>';
					echo '<hr>';
				}
			include('bottom.html');
			?>
	</body>
</html>

<?php
include 'lib/csfd/global.php';

// získání post promenné + uprava znaku mezery
$videoname = $_POST['videoname'];
$csfdname = $_POST['csfdname'];
$csfdnamesearch = str_replace(" ", "+", $csfdname);

// vyhledání názvu v aplikaci csfd
logAction('HLEDAT: '.$csfdnamesearch);
$html = file_get_html('http://www.csfd.cz/hledat/?q='.$csfdnamesearch);
$filmy = '';
$i = 0;

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
	//echo $info->find('.origin', 0)->innertext;
	$filmy[1]['rok'] = csfdHledatRok( $info->find('.origin', 0) );
	$filmy[1]['id'] = csfdId( $html->find('.trivia a', 0)->href );
  $filmy[$i]['typ'] = $el_type ? $el_type->innertext : null;
	$filmy[1]['rating'] = csfdConvertRating( $html->find('#rating .average', 0)->innertext );
}
?>
<html>
	<head>
		<title>Step 2</title>
		<script src="lib/jquery/jquery-1.11.1.min.js"></script>
		<script src='lib/jquery/autosizeinput.js'></script>
		<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Comfortaa:700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="http://php.net/images/logos/php_xpstyle.ico" type="image/ico">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
			#hide {
				visibility: hidden;
				width: 3px;
				height: 3px;
			}
			#help {
			  position: fixed;
			  bottom: 0;
			  right:0;
			}
		</style>
		<script>
		</script>
	</head>
	<body>
		<a href="http://jakubkrizka.php5.cz"><button class="home_button">Domovská stránka</button></a><hr>
		<a href="https://github.com/you"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
		<input type="text" name="videoname" id="videoname" value="<?php echo $videoname; ?>" disabled/>
		<br>
		<input type="text" name="csfdname" id="csfdname" value="<?php echo $csfdname; ?>" disabled/>
		<hr>
			<?php
				// výpis
				foreach($filmy as $film){
					echo '<form action="step3.php" method="post">';
					echo '<a target="_blank" href="http://www.csfd.cz/film/'.$film['id'].'">'.$film['nazev'].' ('.$film['rok'].') '.$film['typ'].'</a>';
					echo '<input name="csfdid" id="hide" value="'.$film['id'].'"/>';
	                echo '<input name="videoname" id="hide" value="'.$videoname.'"/>';
    	            echo '<input name="csfdname" id="hide" value="'.$csfdname.'"/>';
        	        echo '<input name="csfdrok" id="hide" value="'.$film['rok'].'"/>';
            	    echo '<input value="http://www.csfd.cz/film/'.$film['id'].'" name="odeslane_csfd" id="hide"/>';
					echo '<br>';
					echo '<button type="submit" id="'.$film['id'].'">Pokračovat</button>';
                	echo '</form>';
					echo '<hr>';
    			}
			?>
		<div id="help"><a href="http://php.net/" target="_blank"><img src="http://php.net/images/logos/php-power-white.png"></a></div>
	</body>
</html>

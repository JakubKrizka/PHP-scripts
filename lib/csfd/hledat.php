<?php
include 'global.php';

// HLEDAT
$z = isset($_POST['z']) ? $_POST['z'] : false;
$q = isset($_GET['q']) ? $_GET['q'] : false;
$q = str_replace(" ", "+", $q);
$p = str_replace("+", " ", $q);


logAction('HLEDAT: '.$q);
$html = file_get_html('http://www.csfd.cz/hledat/?q='.$q);

$filmy = '';

$i = 0;

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
  $filmy[1]['typ'] = '';
  $filmy[1]['rating'] = csfdConvertRating( $html->find('#rating .average', 0)->innertext );
}
?>
<html>
	<head>
		<title>ou no toto jestli vyjde tak mě poser</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<style type="text/css">
			body,td,th, button, input{
				font-family: sans-serif;
				font-size: 26px;
			}
			#hide {
				visibility: hidden;
			}
		</style>
		<script>
		</script>
	</head>
	<body>
<form id="form2" action "" method="get">
<input placeholder="Název filmu nebo seriálu" name="q" value="<?php echo $p;?>"/>
<button type="submit">Hledat</button>
</form>
<br>
		<?php
echo $z;
echo '<hr>';

foreach($filmy as $film){

								echo '<form id="form1" action"" method="post">';
								echo '<a target="_blank" href="http://www.csfd.cz/film/'.$film['id'].'">'.$film['nazev'].' ('.$film['rok'].') '.$film['typ'].'</a>';
								echo '<br>';
								echo '<input name="z" id="hide" value="'.$film['id'].'"/>';
								echo '<br>';
								echo '<button type="submit" id="'.$film['id'].'">ID = "'.$film['id'].'"</button>';
								echo '</form>';
								echo '<hr>';
    }
?>
</body>
	</html>
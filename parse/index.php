<?php
	// Include the html parse DOM library
	include('simple_html_dom.php');
	// Retrieve the DOM from a given URL
	$html = file_get_html('http://novinky.cz');
	// Find all "A" tags and print their HREFs
	foreach($html->find('div#sectionBox') as $e) 
		echo $e . '<br>';
?>
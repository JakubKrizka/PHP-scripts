<?php 
    // Include the html parse DOM library
    include('assets/php/simple_html_dom.php');
    // Include head and header static content
    include('templates/default/head.html');
    include('templates/default/header.html');
    // Load get content
    $obsah = include('templates/' . $_GET['page'] . '.php');
    // If is empty show home page else get page
    if (!isset($_GET["page"]) || $_GET["page"] == "home") {
        include('templates/default.php');
    } else {  
        echo $obsah;
    } 
?>

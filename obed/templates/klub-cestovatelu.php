<style>
span {
	color: rgb(0,0,255);
	font-size: 1.3em;
}
.fr {
	display: none;
}
.article-content {
	width: 700px;
	margin: 0 auto;
}
</style>

<?php
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.hedvabnastezka.cz/klub-cestovatelu-brno/poledni-menu-2/');

// Find all "A" tags and print their HREFs
foreach($html->find('div#article') as $e) 
    echo $e . '<br>';
?>


<div class="box col-xs-12 col-md-4">
	<h2>Klub cestovatelů</h2>
<br>
Veleslavínova 14 <br>
Brno - Královo Pole, PSČ 612 00<br>
<br>
Tel.:  774 048 589<br>
Email: brno(@)hedvabnastezka.cz<br>
<br>
PARKOVÁNÍ OBVYKLE MOŽNÉ DO 150 METRŮ OD RESTAURACE (ZDARMA).<br>



</div>

<div class="box col-xs-12 col-md-4">


<table border="0" cellspacing="2" cellpadding="0" align="center">
<tbody>
<tr>
<td class="rtecenter" colspan="3">
<h2>Otevírací doba</h2>
</td>
</tr>
<tr>
<td class="rtecenter"><strong>Po - Čt</strong></td>
<td class="rtecenter" colspan="2">11:00 - 23:00</td>
</tr>
<tr>
<td class="rtecenter"><strong>Pátek</strong></td>
<td class="rtecenter" colspan="2">11:00 - 24:00</td>
</tr>
<tr>
<td class="rtecenter"><strong>Sobota</strong></td>
<td class="rtecenter" colspan="2">12:00 - 24:00</td>
</tr>
<tr>
<td class="rtecenter"><strong>Neděle</strong></td>
<td class="rtecenter" colspan="2">12:00 - 24:00</td>
</tr>
</tbody>
</table>



</div>




<div class="box col-xs-12 col-md-4">

<iframe src="https://maps.google.cz/maps?f=q&amp;source=s_q&amp;hl=cs&amp;geocode=&amp;q=Veleslavínova 14,+Brno&amp;aq=0&amp;oq=Veleslavínova 14&amp;t=m&amp;brcurrent=5,0,0&amp;ie=UTF8&amp;hq=&amp;hnear=Husitsk%C3%A1+1762%2F8A,+612+00+Brno&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

</div>
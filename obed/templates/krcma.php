<style>
h1, .rtecenter {
	text-align: center;
}
h4 {
	font-size: 1.5em;
	font-weight: bold;
	color: rgb(0,0,255);
}

.content {
		width: 999px;
	margin: 0 auto;
}

</style>
<?php
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.krcmausvatehovaclava.cz/denni-menu');
// Find all "A" tags and print their HREFs
foreach($html->find('div#obsah') as $e) 
    echo $e . '<br>';
?>

<hr>


<div class="box col-xs-12 col-md-4">
	<h2>Krčma u svatého Václava</h2>
 

Husitská 1762/8a<br>
612 00 Brno - Královo Pole <br>    
 <br>
Odpovědná vedoucí: Romana Podolanová<br>
IČ:01290045

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
<td class="rtecenter"><strong>Pondělí</strong></td>
<td class="rtecenter" colspan="2">11:11 - 22:22</td>
</tr>
<tr>
<td class="rtecenter"><strong>Úterý</strong></td>
<td class="rtecenter" colspan="2">11:11 - 22:22</td>
</tr>
<tr>
<td class="rtecenter"><strong>Středa </strong></td>
<td class="rtecenter" colspan="2">11:11 - 22:22</td>
</tr>
<tr>
<td class="rtecenter"><strong>Čtvrtek</strong></td>
<td class="rtecenter" colspan="2">11:11 - 22:22</td>
</tr>
<tr>
<td class="rtecenter"><strong>Pátek</strong></td>
<td class="rtecenter" colspan="2">11:11 - 22:22</td>
</tr>
<tr>
<td class="rtecenter"><strong>Sobota</strong></td>
<td class="rtecenter" colspan="2">dle domluvy</td>
</tr>
<tr>
<td class="rtecenter"><strong>Neděle</strong></td>
<td class="rtecenter" colspan="2">19:19 - 22:22</td>
</tr>
</tbody>
</table>




</div>




<div class="box col-xs-12 col-md-4">

<iframe src="https://maps.google.cz/maps?f=q&amp;source=s_q&amp;hl=cs&amp;geocode=&amp;q=Husitsk%C3%A1+8A,+Brno&amp;aq=0&amp;oq=husitska+8a&amp;sll=49.124896,16.594122&amp;sspn=1.579922,4.22699&amp;t=m&amp;brcurrent=5,0,0&amp;ie=UTF8&amp;hq=&amp;hnear=Husitsk%C3%A1+1762%2F8A,+612+00+Brno&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

</div>







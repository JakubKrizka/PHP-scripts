<style>
table {
	margin: 0 auto;
}
p {
	text-align: center;
}
</style>
<?php
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.restaurace-racek.cz/sluzby/denni-menu/');

// Find all "A" tags and print their HREFs
foreach($html->find('div.wsw') as $e) 
    echo $e . '<br>';
?>

<hr>

<div class="box col-xs-12 col-md-4">
	<h2>Restaurace Racek</h2>
 

Jungmannova 5<br>
612 00 Brno - Královo Pole <br>    
 <br>
Tel. 774 052 002 <br>
Email: racek@centrum.cz <br>
IČ: 29302803

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
<td class="rtecenter"><strong>Po - So</strong></td>
<td class="rtecenter" colspan="2">10:30 – 23:00</td>
</tr>
<tr>
<td class="rtecenter"><strong>Neděle</strong></td>
<td class="rtecenter" colspan="2">11:00 – 22:00</td>
</tr>
</tbody>
</table>




</div>




<div class="box col-xs-12 col-md-4">

<iframe src="https://maps.google.cz/maps?f=q&amp;source=s_q&amp;hl=cs&amp;geocode=&amp;q=Jungmannova 5,+Brno&amp;aq=0&amp;oq=Jungmannova 5&amp;sll=49.124896,16.594122&amp;sspn=1.579922,4.22699&amp;t=m&amp;brcurrent=5,0,0&amp;ie=UTF8&amp;hq=&amp;hnear=Husitsk%C3%A1+1762%2F8A,+612+00+Brno&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

</div>
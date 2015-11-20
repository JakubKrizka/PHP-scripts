<style>
.left-half, .right-half {
	width: 800px;
	margin: 0 auto;
}

.price {
	padding-left: 15px;
}

.bistro-menu tbody tr {
	border-bottom: 1px solid black;
}

</style><?php
// Retrieve the DOM from a given URL
$html = file_get_html('http://www.ocean48.cz/bistro/nabidka');

// Find all "A" tags and print their HREFs
foreach($html->find('div.left-half') as $e) 
    echo $e . '<br>';

foreach($html->find('div.right-half') as $e) 
    echo $e . '<br>';

?>

<hr>

<div class="box col-xs-12 col-md-4">
	<h2>Ocean48 Bistro</h2>
<br>
Palackého třída 13<br>
Brno - Královo Pole, PSČ 612 00<br>
<br>
Tel.: +420 530 504 513<br>
Mobil: +420 773 520 206<br>
E-mail: palackeho@ocean48.cz<br>






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
<td class="rtecenter"><strong>Úterý – Pátek</strong></td>
<td class="rtecenter" colspan="2">10–18 hodin</td>
</tr>
<tr>
<td class="rtecenter"><strong>Sobota</strong></td>
<td class="rtecenter" colspan="2">8–12 hodin</td>
</tr>
</tbody>
</table>



</div>




<div class="box col-xs-12 col-md-4">

<iframe src="https://maps.google.cz/maps?f=q&amp;source=s_q&amp;hl=cs&amp;geocode=&amp;q=Palackého třída 13,+Brno&amp;aq=0&amp;oq=Palackého třída 13&amp;t=m&amp;brcurrent=5,0,0&amp;ie=UTF8&amp;hq=&amp;hnear=Husitsk%C3%A1+1762%2F8A,+612+00+Brno&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

</div>
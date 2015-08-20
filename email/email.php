<?php 
// check if isset main information
// kontrola vyplnění povinný údajů
if (!empty($_POST["emailfrom"]) && !empty($_POST["emailto"]) && !empty($_POST["emailname"]) && !empty($_POST["emailmassage"])) {
  // if ok, take information from post request and continue
  // pokud ok deklarace proměnných z formuláře POST
  $email_from=$_POST["emailfrom"];
  $email_to=$_POST["emailto"];
  $email_name=$_POST["emailname"];
  $email_massage=$_POST["emailmassage"];
  // define some aditional information, like time, ip adress, HTTP user agent etc.
  // definice dodatečných informací, jako datum, čas, ip adresa a HTTP user agent
  $date = date("d.m.Y");
  $time = date("H:i:s T e");
  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  $ip_address = $_SERVER["REMOTE_ADDR"];
  // define header to email, show mess like html page
  // definování stylu a jazyku zprávy
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  // subject
  // předmět
  $subject = "PHP Email from $email_name";
  // define template of message
  // šablona zrávy emailu
  $mess = "<html><body>";
  $mess .= "<h1>Email from: $email_from</h1>";
  $mess .= "<h1>Email to: $email_to</h1>";
  $mess .= "<h1>Name: $email_name</h1>";
  $mess .= "<hr>";
  $mess .= "<h2>From IP: $ip_address</h2>";
  $mess .= "<h2>$date ($time)</h2>";
  $mess .= "<h3>User agent: $user_agent</h3>";
  $mess .= "<hr>";
  $mess .= "<hr>";
  $mess .= "<p>Message: $email_massage</p>";
  $mess .= '</body></html>';
  // send email
  // odeslat email
  $send = mail ($email_to, $subject, $mess, $headers);  
  // check if send ok
  // kontrola odeslání emailu
  if($send) {
  ?>
    <script type="text/javascript">
    
      // info alert function
      // výpis výsledku
      alert("Email se úspěšně odeslal");
      
      // redirect back
      // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
      window.history.back();
    </script>
  <?php
  }
  // if send failed
  // pokud odeslání selhalo
  else {
    ?>
      <script type="text/javascript">
      
        // info alert function
        // výpis výsledku
        alert("Chyba, email nebyl odeslán!");
        
        // redirect back
        // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
        window.history.back();
      </script>
    <?php
  }
}
// if is not define all input fileds
// pokud nejsou definovány všechna povinná pole
else {  
  ?>
    <script type="text/javascript">
    
      // info alert function
      // výpis výsledku
      alert("Nejsou vyplněna povinná pole");
      
      // redirect back
      // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
      window.history.back();
    </script>
  <?php
}
?>

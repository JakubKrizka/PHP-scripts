<?php

// check if isset required POST information
// kontrola povinných údajů z formuláře POST
if (!empty($_POST["loginname"]) && !empty($_POST["loginpass"])) {
  // define POST variabley, we can define niminum conditions or terms
  // definice proměných, můžeme dále nastavit povinnou délkou nebo zakázat speciální znaky
  $loginname=$_POST["loginname"];
  $loginpass=$_POST["loginpass"];
  // define mysql login information
  // nastavení přístupu do databáze (adresa, uživatel, heslo)
  $id_spojeni = mysql_connect("localhost","user","password");
  // select database 
  // výběr databáze
  $vysledek_vybrani = mysql_select_db("database",$id_spojeni);
  // send request to mysql !!! this is unsecure solution, injection isn't resolved !!!
  // odeslání požadavku na databázový server, kde se hledá v tabulce "users" uživatel jako "id"
  // POZOR !!! není vyřešena bezpečnost
  $select = mysql_query("SELECT * from users where id = '$loginname'");
  // define result
  // definování výsledku, přiřazení proměných
  $result=MySQL_Fetch_Array($select);
  $pass=$result["pass"];
  // define number od result
  // vrátí počet výsledků
  $control=mysql_num_rows($select);
  // must be only one user
  // podmínka, musí být pouze jeden výsledek
  if ($control == 1) { 
    // check if agrees password
    // kontrola jestli sedí heslo
    if ($pass == $loginpass) {
    ?>
      <script type="text/javascript">
        
        // info alert function
        // výpis výsledku
        alert("Přihlášení úspěšné");
        
        // redirect back
        // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
        window.history.back();
      </script>
    <?php
    }
    // if pass fail
    // pokud heslo nesouhlasíí
    else {
    ?>
      <script type="text/javascript">
        
        // info alert function
        // výpis výsledku
        alert("Heslo je chybné");
        
        // redirect back
        // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
        window.history.back();
      </script>
    <?php
    }
  }
  // if user do not exist or more result
  // pokud nebyl vrácen jeden výsledek nebo výsledků více
  else {
  ?>
    <script type="text/javascript">
    
      // info alert function
      // výpis výsledku
      alert("Uživatel neexistuje");
      
      // redirect back
      // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
      window.history.back();
    </script>
  <?php  
  }  
}
  // if is not isset needed input fields
  // pokud nejsou vyplněna povinná pole
  else
  ?>
    <script type="text/javascript">
    
      // info alert function
      // výpis výsledku
      alert("Nejsou vyplněny některé pole");
      
      // redirect back
      // přesměrování zpět, nebo kamkoliv jinam nebo třeba zápis do cookies atd...
      window.history.back();
    </script>
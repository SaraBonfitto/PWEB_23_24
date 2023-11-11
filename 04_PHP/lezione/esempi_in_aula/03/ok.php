<!DOCTYPE html>
<html>
<?php REQUIRE "header.html"; ?>
	<body>
<?php
$pass = $_GET["pwd"];
$name = $_GET["nome"];
if ($name=="marco" && $pass=="123")
   {
    echo "<p class=\"titolo\">Benvenuto $name. 
              Login effettuato con successo</p>";
   }
   else{
      echo "<p class=\"errore\">Login o password errati. 
                 <a href=\"login.php\">Riprova</a></p>";
   }
?>
</body>
</html>
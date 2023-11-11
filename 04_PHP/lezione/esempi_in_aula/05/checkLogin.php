<?php
  session_start();
// si noti che la sessione va inizializzata prima di mandare qualunque dato in output
?>
<html>
	<?php
	REQUIRE "header.html";
	?>	
	<body>
		<p class="titolo"> Servizi riservati!<br/>
		Per accedere devi digitare username e password e quindi premere OK </p>
<?php
 
    $pass = $_POST["pwd"];
    $name = $_POST["nome"];
if ($name=="marco" && $pass=="123")
   {
	 $_SESSION["logged"]=true;
	 $_SESSION["userName"]=$name;
	 $_SESSION["pass"]=$pass;
	 // si noti che l'uso delle sessioni permette di evitare passaggi di parametri
     header('location:datiUtente.php');    
   }
   else{
	  // se l'operazione di login non è andata a buon fine, do notifica all'utente e 
      // elimino la sesssione di lavoro. 	  
	  session_destroy();
      echo "<p class=\"errore\">Login o password errati. 
                 <a href=\"login.php\">Riprova</a></p>";
   }
?>
	</body>
</html>
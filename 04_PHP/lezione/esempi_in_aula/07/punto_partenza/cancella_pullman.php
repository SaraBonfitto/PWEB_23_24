<!DOCTYPE html> 
<html> 
<head> 
<title> Elimina il pullman </title> 
</head> 
<body> 
<?php 
require "connetti.php"; 
$conn = connessione("localhost", "root", "",  "agenzia_viaggi"); 

 $id = $_POST["pullman_da_eliminare"]; 
 
 $sql = "DELETE FROM pullman WHERE id_pullman = $id;"; 
 
 $risultato = $conn->query($sql); 
 
 if($risultato == FALSE) { 
    die("Errore nell'esecuzione della query: $sql <br>"); 
  } else{ 
     echo "Eliminazione del pullman con id = $id avvenuta con successo."; 
 } 
 
 ?> 
 
 <p> 
 Clicca 
 <a href="gestione_pullman.html"> 
 qui 
 </a> 
 per tornare alla pagina di gestione dei pullman. 
 </p> 
 </body> 
</html> 
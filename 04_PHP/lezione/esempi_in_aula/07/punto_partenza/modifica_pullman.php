<!DOCTYPE html > 
<html > 
<head> 
<title> Modifica pullman </title> 
</head> 
<body> 
<?php 
require "connetti.php"; 
$conn = connessione("localhost", "root", "", "agenzia_viaggi"); 
$id = $_POST["id_pullman"]; 
$marca = $_POST["marca"]; 
$modello = $_POST["modello"]; 
$capienza = $_POST["capienza"]; 
$sql = "UPDATE pullman 
SET marca = '$marca', 
modello = '$modello', 
capienza = '$capienza' 
WHERE id_pullman = $id";
echo $sql; 
$risultato = $conn->query($sql); 
if ($risultato == FALSE) {
    die("Errore nell’esecuzione della query: $sql <br>"); 
} else { 
     echo "Aggiornamento del pullman effettuato con successo"; 
} 
 
 $conn->close(); 
 ?> 
 
 <p> 
 Clicca  <a href="gestione_pullman.html">  qui </a> per tornare alla pagina di gestione dei pullman. 
</p> 
</body> 
</html>
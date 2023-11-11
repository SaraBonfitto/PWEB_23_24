<!DOCTYPE html> 
<html> 
<head> 
<title> Pullman da cancellare</title> 
</head> 
<body> 
   <h1> Elimina un pullman dal db </h1> 
   <p> In questa pagina puoi selezionare un pullman da eliminare dal db. <br> 

   Scegli il pullman da eliminare dal men&ugrave; a tendina: 
  </p> 
 
<form action="cancella_pullman.php" method="post"> 
 
<?php 
 require "connetti.php"; 
 $conn = connessione("localhost", "root", "", "agenzia_viaggi"); 
 
 $sql = "SELECT * FROM pullman;"; 
 
 $risultato = $conn->query($sql); 
 
 if ($risultato == FALSE) { 
    die("Errore dovuto alla seguente query : $sql <br>"); 
 } 
 
echo "<select name='pullman_da_eliminare'>"; 
while ($riga = $risultato->fetch_assoc()) { 
    // salvo le informazioni del pullman in 4 variabili 
    $id = $riga["id_pullman"]; 
    $marca = $riga["marca"]; 
    $modello = $riga["modello"]; 
    $capienza = $riga["capienza"]; 
    echo " <option value='$id'> $marca - $modello - $capienza </option>"; 
} 
echo "</select>"; 
echo "<input type='submit' name='invia_pullman_eliminare'” 
     value='Elimina Pullman'> <br>"; 
$conn->close(); 
?> 
</form> 
</body> 
</html>
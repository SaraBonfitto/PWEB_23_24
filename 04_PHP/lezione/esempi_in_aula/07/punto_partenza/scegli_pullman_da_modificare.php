<!DOCTYPE html> 
<html> 
<head> 
<title> Scegli pullman da modificare</title> 
</head> 
<body> 
<hi> Scegli un pullman da modificare </hi> 
<p> In questa pagina puoi selezionare un pullman di cui modificare le informazioni. <br> 
Scegli il pullman da modificare dal men&ugrave; a tendina: 
</p> 
<form action="dati_per_modifica.php" method="post"> 
 <?php 
 require "connetti.php"; 
 $conn = connessione("localhost", "root", "",  "agenzia_viaggi"); 
 
 $sql = "SELECT * FROM pullman;"; 
 $risultato = $conn->query($sql);
if ($risultato == FALSE) { 
    die("Errore dovuto alla seguente query : $sql <br>"); 
    } 
    echo "<select name='pullman_da_modificare'>"; 
    while ($riga = $risultato->fetch_assoc()) { 
    //salvo le informazioni del pullman in 4 variabili 
    $id = $riga["id_pullman"]; 
    $marca = $riga["marca"]; 
    $modello = $riga["modello"]; 
    $capienza = $riga["capienza"]; 
    echo " <option value='$id'> 
    $marca - $modello - $capienza 
    </option>"; 
    } 
    echo "</select>"; 
    echo "<input type='submit' name='invia_pullman_modificare' 
    value='Modifica Pullman'> <br>"; 
    $conn->close(); 
    ?> 
    </form> 
    </body> 
    </html> 

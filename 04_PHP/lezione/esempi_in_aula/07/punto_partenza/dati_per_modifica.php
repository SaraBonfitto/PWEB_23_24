<!DOCTYPE html> 
<html> 
    <head> 
        <title> Dati per modifica </title> 
    </head> 
<body> 
  <?php 
    //Si usa il php per accedere ai dati del pullman da 
    //modificare e mostrarli all’interno del form 
    require "connetti.php"; 
    $conn = connessione("localhost", "root", "", "agenzia_viaggi"); 
    $id = $_POST["pullman_da_modificare"]; 
    $sql = "SELECT * FROM pullman WHERE id_pullman = $id;"; 
    echo $sql;
    $risultato = $conn->query($sql); 
    if($risultato == FALSE) { 
        die("Errore nell’esecuzione della query: $sql.<br>"); 
    } 
    //la query produce una tabella con una sola riga 
    $riga = $risultato->fetch_assoc(); 
        // salvo in 3 variabili le informazioni che mi servono 
        //per dare un valore agli input del form 
    $marca = $riga["marca"]; 
    $modello = $riga["modello"]; 
    $capienza = $riga["capienza"]; 
    $conn->close(); 
?> 
<h2> Modifica i dati del pullman </h2>
<p> 
Di seguito puoi modificare le informazioni 
di un pullman. Compila il form con le nuove 
informazioni. 
</p> 
<form action="modifica_pullman.php"  method="post"> 
<input type="hidden" name="id_pullman" value="<?php echo $id; ?>"> 
Marca: <input type="text" name="marca" value="<?php echo $marca; ?>"> <br> 
Modello: <input type="text" name="modello" value="<?php echo $modello; ?>"> <br> 
Capienza: 
<select name="capienza"> 
<option value="20" <?php if ($capienza == 20) echo "selected"; ?> > 
20 - piccolo 
</option> 
<option value="40" <?php if ($capienza == 40) echo "selected"; ?> > 
40 - medio 
</option> 
<option value="60" <?php if ($capienza == 60) echo "selected"; ?> > 
60 - grande 
</option> 
</select> 
<br> 
<input type="submit" name="invia_dati_modifica" 
value="Modifica i dati"> 
</form> 
</body> 
</html>
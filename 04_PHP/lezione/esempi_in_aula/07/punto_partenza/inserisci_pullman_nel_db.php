<!DOCTYPE html> 
<html> 
    <head> 
     <title> Inserimento pullman nel db </title> 
    </head> 
    <body> 
    <?php 
        require "connetti.php"; 
            $conn = connessione("localhost", "root", "", "agenzia_viaggi"); 
            // accedere ai valori inseriti nel form 
            $marca = $_POST["marca"]; 
            $modello = $_POST["modello"]; 
            $capienza = $_POST["capienza"]; 
            // creazione query di inserimento del pullman 
            $sql = "INSERT INTO pullman(marca, modello, capienza) 
                    VALUES ('$marca', '$modello', '$capienza');"; 
            echo $sql;        
            $risultato = $conn->query($sql); 
            if ($risultato == TRUE) { 
                echo "Inserimento del pullman riuscito con successo."; 
            } else { 
                echo "Errore nell'inserimento del pullman.<br>"; 
                echo "La query che ha generato l'errore &egrave; $sql"; 
            }    
            $conn->close(); 
            ?> 
    <br> 
    <p> Torna a <a href="gestione_pullman.html"> gestione dei pullman. </a></p> 
</body> 
</html>
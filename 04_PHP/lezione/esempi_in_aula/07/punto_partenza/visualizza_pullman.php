<!DOCTYPE html> 
<html> 
    <head> 
        <title> Visualizza pullman </title> 
    </head> 
    <body> 
    <hi> Lista dei Pullman </hi> 
    <p> I pullman presenti nel database sono riportati nella seguente tabella: 
    </p> 
<?php 
require "connetti.php"; 
$conn = connessione("localhost", "root", "", "agenzia_viaggi"); 
$sql = "SELECT * FROM pullman;"; 
$risultato = $conn->query($sql); 
if($risultato == FALSE) { 
     die("Errore nell'esecuzione della query: $sql<br>"); } 
//mostro i risultati della query in una tabella 
echo "<table> 
<tr> 
<th> Id Pullman </th> 
<th> Marca </th> 
<th> Modello </th> 
<th> Capienza </th> 
</tr>"; 
while ($riga = $risultato->fetch_assoc()) { 
    echo " <tr>".  
            "<td> " . $riga["id_pullman"] . "</td> " .
            "<td> " . $riga["marca"] . " </td>" .
            "<td> " . $riga["modello"] . "</td>" . 
            "<td> " . $riga["capienza"] . " </td> " .
        "</tr>"; 
}
echo "</table>"; 
$conn->close(); 
?>
 
<p> 
Clicca  <a href="gestione_pullman.html">  qui </a> per tornare alla pagina di gestione dei pullman. 
</p> 
</body> 
</html> 

<?php
session_start();

$dati = array(); // questo array serve per contenere i dati di ritorno da ok.php
$errore = array(); // questo array serve per contenere gli errori riscontrati da ok.php

$tipoErrore= array(
    "1"=> "cognome non valido (meno di 3 caratteri)",
    "2"=> "nome non valido (meno di 3 caratteri)",
    "3"=> "data non valida",
    "4"=> "Bisogna specificare almeno una attività",
    "5"=> "Bisogna accettare le condizioni di utilizzo",
	"6"=> "Bisogna specificare il sesso"
);


// in questa pagina posso accedere solo se ho effettuato il login
// altrimenti devo essere ridiretto alla pagina di login
if (!isset($_SESSION["logged"]))  header('location:login.php'); 
	


if (isset($_SESSION["status"]))
 { // se status è definito significa che sono di ritorno da ok.php e devo inizializzare $dati e $errore 
   // a secondo dello status
   // si noti che a differenza del codice precedente, non ho bisogno di effettuare "userialize" 
   // delle variabili. I loro contenuti sono presenti nella sessione
   if ($_SESSION["status"]=="ko")  
          $errore = $_SESSION["errore"];    
   $dati = $_SESSION["dati"];
 }
else
   {  // sto arrivando per la prima volta alla form e deve aspettare che l'utente inserica i campi della form
	  // per uniformità di gestione, inizializzo i valori dei campi
      $dati["nome"]="";
      $dati["cognome"]="";
      $dati["giorno"]="";
	  $dati["mese"]="";
	  $dati["anno"]="";
	  $dati["sex"]="";
	  $dati["attivita"]=array();
	  $dati["condizioni"]=null;
   }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prova per creare un form</title>
		<link rel="stylesheet" type="text/css" href="sito.css">
	</head>
	<body>
		<?php
		   // se status è definito sono di ritorno da un controllo che non è andato a buon fine
		   // altrimenti sto arrivando dalla pagina di login e la login è andata a buon fine.
           if (isset($_SESSION["status"]))
           {
			   if ($_SESSION["status"]=="ko")
                  echo "<p class=\"errore\">CI sono errori nei dati da correggere</p>";
			  else 
				  echo "<p class=\"titolo\">$_SESSION[userName], i dati inseriti sono corretti</p>";
           }
		   else
		   { 
			echo "<p class=\"titolo\">Benvenuto $_SESSION[userName]. Login effettuato con successo</p>";  
		   }   
		   
        ?>
        <p class="form">
		<form method="POST" action="ok.php">
		  
		  <table class="insert" border="1"> 
				<tr>
					<td>Nome: </td><td><input type = "text" name = "nome"
                       value="<?php echo $dati["nome"];?>"
                    ></input>
                <?php 
                   if (isset($errore["nome"]))
                   echo "<span class='errore'>". $tipoErrore[$errore["nome"]] . "</span>";
                ?>
                </td>
				</tr>
				<tr>
					<td>Cognome: </td><td><input type = "text" name = "cognome"
					value="<?php echo $dati["cognome"];?>"></input>
					<?php 
                        if (isset($errore["cognome"]))
                        echo "<span class='errore'>". $tipoErrore[$errore["cognome"]] . "</span>";
                ?>
				</td>
				</tr>
				<tr>
					<!-- inroduco codice per generare i numeri di giorni, mese e anno 
				         considero anche la data vuota per gestire questo caso
				    -->
					<td>Data nascita: </td><td>
					giorno:
					<select name="giorno">
					    <option value=""></option>
						<?php
						  for ($i=1;$i<=31;$i++) 
						 {
						  $check=""; 
						  if ($dati["giorno"]==$i) $check="selected";  
						  echo "<option value=\"$i\" $check>$i</option>";
						 }
						?>
					</select>
					mese:
					<select name="mese">
					<option value=""></option>
						<?php
						  for ($i=1;$i<=12;$i++) 
						  {
							$check=""; 
							if ($dati["mese"]==$i) $check="selected";  
							echo "<option value=\"$i\" $check>$i</option>";
						   }
						?>
					</select>
					anno:
					<select name="anno">
					<option value=""></option>
						<?php
						  for ($i=1970;$i<=2024;$i++) 
						  {
							$check=""; 
							if ($dati["anno"]==$i) $check="selected";  
							echo "<option value=\"$i\" $check>$i</option>";
						   }
						?>
					</select>
					<?php 
                        if (isset($errore["giorno"]))
                        echo "<span class='errore'>". $tipoErrore[$errore["giorno"]] . "</span>";
                ?>
					</td>
				</tr>
				<tr>
					<td>Sesso: </td><td>
					     <input type="radio" name="sex" value="m"
						 <?php 
						   if ($dati["sex"]=='m') echo "checked";
						 ?>
						 >Maschio</input>
						 <input type="radio" name="sex" value="f"
						 <?php 
						   if ($dati["sex"]=='f') echo "checked";
						 ?>
						 >Femmina</input>
						 <?php 
                        if (isset($errore["sex"]))
                        echo "<span class='errore'>". $tipoErrore[$errore["sex"]] . "</span>";
                ?>
					</td>
				</tr>
				<tr>
					<td>Attivit&agrave;: </td><td>
				
						<input type="checkbox" name="attivita[]" value="sci"
						<?php 
						   if (in_array( "sci", $dati["attivita"])) echo "checked";
						 ?>
						>Sci</input><br/>
						<input type="checkbox" name="attivita[]" value="tennis"
						<?php 
						   if (in_array( "tennis", $dati["attivita"])) echo "checked";
						 ?>
						 >Tennis</input><br/>
						<input type="checkbox" name="attivita[]" value="golf"
						<?php 
						   if (in_array( "golf", $dati["attivita"])) echo "checked";
						 ?>
						 >Golf</input><br/>
						<input type="checkbox" name="attivita[]" value="canoa"
						<?php 
						   if (in_array( "canoa", $dati["attivita"])) echo "checked";
						 ?>
						 >Canoa</input><br/>
						<input type="checkbox" name="attivita[]" value="altro"
						<?php 
						   if (in_array( "altro", $dati["attivita"],)) echo "checked";
						 ?>
						 >Altro</input><br/>
						 <?php 
                        if (isset($errore["attivita"]))
                        echo "<span class='errore'>". $tipoErrore[$errore["attivita"]] . "</span>";
                ?>
					</td>
				</tr>
				
				<tr>
					<td>Condizioni di utilizzo </td><td>
				
				         <table border="1">
						 <tr><td>bla bla bla bla bla bla bla bla bla bla bla bla 
						         bla bla bla bla bla bla bla bla bla bla bla bla 
								 bla bla bla bla bla bla bla bla bla bla bla bla </td></tr>
						</table>						 
						<input type="checkbox" name="condizioni" value="ok"
						<?php 
						   if ($dati["condizioni"]==true) echo "checked";
						 ?>
						>Accetto</input><br/>
						<?php 
                        if (isset($errore["condizioni"]))
                        echo "<span class='errore'>". $tipoErrore[$errore["condizioni"]] . "</span>";
                ?>
					</td>
				</tr>
				
				
				<tr>
					<td colspan="2" align="center"><input type= "submit" value= "OK"/>
					    <input type = "reset" value = "Cancella"/>
						
					</td>
				</tr>
			</table>
				</form>
		</p>
</body>
</html>		
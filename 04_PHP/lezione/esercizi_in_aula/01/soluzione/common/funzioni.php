<?php


/* Funzioni relative alla gestione degli utenti */

function isUser($cid,$login,$pwd)
{
	$risultato= array("msg"=>"","status"=>"ok");

   /* inserire controlli dell'input */
   $sql = "SELECT * FROM utente where login = '$login' and password = '$pwd'";
   
   $res = $cid->query($sql);
   	if ($res==null) 
	{
	        $msg = "Si sono verificati i seguenti errori:<br/>" 
     		. $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;			
	}elseif($res->num_rows==0 || $res->num_rows>1)
	{
			$msg = "Login o password sbagliate";
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;		
	}elseif($res->num_rows==1)
	{
	    $msg = "Login effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;		
	}
    return $risultato;
}


/* funzioni relative alla gestione delle squadre */


function leggiSquadre($cid)
{
	$squadre = array();
	$risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");
	
	if ($cid->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		return $risultato;
	}
	$sql= "SELECT sigla, nome FROM squadre;";
	$res=$cid->query($sql);
	if ($res==null)
	{
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella esecuzione della interrogazione " . $cid->error;
		return $risultato;
	}
	while($row=$res->fetch_row())
	{
			$squadre[$row[0]]=$row[1];
	}
	$risultato["contenuto"]=$squadre;
	return $risultato;
}


function stampaSquadre($squadre)
{
	echo "<div class=\"table-responsive\">";
	echo "<table class=\"table text-center\">";
	echo "<tr><th class=\"text-center\">Sigla</th>
	          <th class=\"text-center\">Nome squadra</th>
			  <th class=\"text-center\">Modifica</th>
			  <th class=\"text-center\">Cancella</th>
			  </tr>";
	foreach ($squadre AS $sigla => $nome)
	{
		echo "<tr><td>$sigla</td>
		      <td>$nome</td> 
		      <td><a href=\"../backend/updateS.php?id=$sigla\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
		      <td><a href=\"../backend/deleteS.php?id=$sigla\"><span class=\"glyphicon glyphicon-remove\"></span></a></td></tr>";
              // bisogna implementare queste funzioni
			  }
	echo "</table>";
	echo "</div>";
}

function scriviSquadra($cid,$sigla,$nome)
{	
	$risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");
	
	$msg="";
	$errore=false;
	
	$sigla = trim(strtoupper($sigla));
	$nome= trim($nome);
	if (empty($sigla) || empty($nome))
	{
		$errore = true;
		$msg = "Uno dei parametri non &egrave; specificato<br/>";
	}
	if (strlen($sigla)>2 ||  !ctype_alpha($sigla))
	{
		$errore = true;
		$msg .= "La sigla della squadra deve essere di due caratteri<br/>";
	}
	if (strlen($nome)<3 || !ctype_alpha($nome))
	{
		$errore = true;
		$msg .= "Il nome della squadra deve essere maggiore di 2 caratteri<br/>";
	}
	$res=leggiSquadre($cid);
	
	if ($res["status"]=='ko' || $errore)
	{
		$errore = true;
		$msg .= "Problemi nella lettura dal database<br/>";
	}	
	else 
	{	
		$squadre=$res["contenuto"];
		
		if (isset($squadre[$sigla]))
		{
			$errore = true;
			$msg .= "La sigla $sigla specifica &egrave; gi&agrave; usata per $squadre[$sigla]<br/>";
		}
	}
	if (!$errore)
	{
	   $sql= "INSERT INTO squadre(sigla,nome) VALUES('$sigla','$nome');";
	   $res=$cid->query($sql);
	   if ($res==1)
		   $risultato["msg"]="L'operazione di inserimento si è conclusa con successo";
	   else
	   {
		   $risultato["status"]="ko";
		   $risultato["msg"]="L'operazione di inserimento è fallita";
	   }
	}
	else
	{
		$risultato["status"]="ko";
		$risultato["msg"]=$msg;
	}	
	return $risultato;
}

function selezionaSquadre($squadre, $nomeS, $id)
{
	echo "<select type=\"text\" class='form-control' name='$nomeS' id='$id'>";
	
	foreach ($squadre AS $sigla => $nome)
	{
		echo "<option value='$sigla'>$nome</option>";
	}
	echo "</select>";
}




function leggiPartite($cid)
{
	$partite = array();
	$risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");

	if ($cid->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		return $risultato;
	}
	
    $sql= "SELECT * FROM partite";
	
	$res = $cid->query($sql);

   	if ($res==null) 
	{
	        $msg = "Si sono verificati i seguenti errori:<br/>" 
     		. $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;			
	}elseif($res->num_rows==0)
	{
			$msg = "La tabella non contiene tuple";
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;		
    }
	else{// L'interrogazione è andata a buon fine e posso leggere le tuple risultato		
	
		while ($row=$res->fetch_assoc())
			{
			 $partite[]=array("casa" => $row["squadraCasa"], 
							  "ospite" =>$row["squadraOspite"], 
							  "goalcasa" =>$row["golcasa"], 
							  "goalospite"=>$row["golospite"]);
			}	
		    $risultato["contenuto"]=$partite;
	}		
	return $risultato;
}

function stampaPartite($partite,$squadre)
{
	echo "<div class=\"table-responsive\">";
	echo "<table class=\"table text-center\">";
	echo "<tr><th class=\"text-center\">Squadra casa</th><th class=\"text-center\">goals</th><th class=\"text-center\">Squadra ospite</th>
	<th class=\"text-center\">goals</th>
	<th class=\"text-center\">Modifica</th>
	<th class=\"text-center\">Cancella</th>
	</tr>";
	if (count($partite)>0)
	{
		foreach ($partite AS $partita)
		{
			$casa= $squadre[$partita["casa"]];
			$ospite=$squadre[$partita["ospite"]];
			echo "<tr><td>$casa</td><td>$partita[goalcasa]</td><td>$ospite</td>
				  <td>$partita[goalospite]</td>
				  <td><a href=\"../backend/updateP.php?casa=$casa&ospite=$ospite\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
				  <td><a href=\"../backend/deleteP.php?casa=$casa&ospite=$ospite\"><span class=\"glyphicon glyphicon-remove\"></span></a></td></tr>";
				  // queste funzioni vanno implementate
		}
	}
	echo "</table>";
	echo "</div>";
}

function stampaClassifica($partite,$squadre)
{
  $classifica = array();
  foreach ($squadre AS $sigla => $nome)
  { 
    $classifica[$sigla]=0;
  }
  foreach ($partite AS $partita)
  {
	if ($partita["goalcasa"]> $partita["goalospite"])
    {     $classifica[$partita["casa"]] += 3;}
    elseif ($partita["goalcasa"] <  $partita["goalospite"]) 	 
	{     $classifica[$partita["ospite"]] += 3;}
    else
    {
		$classifica[$partita["casa"]] += 1;
		$classifica[$partita["ospite"]] += 1;
	}   	
  } // end- foreach
  arsort($classifica);
  echo "<div class=\"table-responsive\">";
  echo "<table class=\"table text-center\">";
  echo "<tr><th class=\"text-center\">Squadra</th><th class=\"text-center\">Punteggio</th></tr>";
	foreach ($classifica AS $sigla => $punti)
	{
		echo "<tr><td>$squadre[$sigla]</td><td>$punti</td></tr>";
	}
	echo "</table>";
	echo "</div>";

}
	
function scriviPartita($cid,$squadre,$sq1,$sq2,$ris1,$ris2)
{	
	$risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");
	$msg="";
	$errore=false;
	
	if (empty($sq1) || empty($sq2))
	{
		$errore = true;
		$msg = "Uno dei parametri non \&egrave; specificato<br/>";
	}
	if ($sq1==$sq2)
	{
		$errore = true;
		$msg .= "Le squadre devono essere diverse<br/>";
	}
	if (!is_numeric($ris1))
	{
		$errore = true;
		$msg .= "Il risultato squadra di casa deve essere numerico<br/>";
	}
	if (!is_numeric($ris2))
	{
		$errore = true;
		$msg .= "Il risultato squadra ospite deve essere numerico<br/>";
	}
	// controllo dei parametri 
	// controllo che $sq1 e $sq2 corrispondano a squadre che esistono
	
	if ($cid->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		return $risultato;
	}
	
	if (!$errore)
	{
		
	  $sql = "INSERT INTO partite(squadraCasa, squadraOspite, golcasa, golospite) 
	          VALUES ('$sq1','$sq2', $ris1, $ris2)";	
	  $res = $cid->query($sql);
	
	  if (!$res) 
		{
			$risultato["msg"]= "Problema nella memorizzazione del risultato sul database<br/>";
			$risultato["status"]="ok";
		}
	  else
	  {  
	   $risultato["msg"] = "L'operazione di inserimento si &egrave; conclusa con successo";
	   $risultato["status"]="ok";
	  }
	}
	else
	{
		$risultato["msg"] = "Si sono verificati i seguenti errori:<br/>" 
     		. $msg;
	   $risultato["status"]="ko";
	}
	return $risultato;
}	

/* funzioni generali che si applicano a partite e squadre */

function svuotaFile($cid, $nometabella)
{
    $risultato= array("msg"=>"","status"=>"ok");
	$msg="";

	if ($cid->connect_errno) {
		$risultato["status"]="ko";
		$risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		return $risultato;
	}
	
	$sql = "DELETE FROM " . $nometabella . ";";	

    $res = $cid->query($sql);

		// gestione dell'errore
	if ($res==null) 
	{
	        $msg = "Si sono verificati i seguenti errori:<br/>" 
     		. $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;
	}
	return $risultato;
}

?>
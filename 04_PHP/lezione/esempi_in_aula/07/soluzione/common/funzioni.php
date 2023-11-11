<?php

function leggiPullman($cid)
{
	$pullman = array();
	$risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");

	if ($cid == null || $cid->connect_errno) {
		$risultato["status"]="ko";
		if (!is_null($cid))
		     $risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		else $risultato["msg"]="errore nella connessione al db ";
		return $risultato;
	}
	
    $sql= "SELECT * FROM pullman;";
	
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
			 $pullman[]=array("id" => $row["id_pullman"], 
							  "marca" =>$row["marca"], 
							  "modello" =>$row["modello"], 
							  "capienza"=>$row["capienza"]);
			}	
		    $risultato["contenuto"]=$pullman;
	}		
	return $risultato;
}

function stampaRigheTabella($data)
{
    foreach ($data as $riga) { 
        echo " <tr>";
        foreach ($riga as $col)
        {
            echo  "<td> " . $col . "</td> \n";
        }
        // in ogni riga aggiungo due colonne per contenere le funzioni di modifica e cancellazione
        echo "<td><a href=\"modifica.php?id=$riga[id]\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
		      <td><a href=\"cancella.php?id=$riga[id]\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
        echo " </tr>\n"; 
   }
}


function scriviPullman($cid,$marca,$modello,$capienza)
{	
	$risultato = array("status"=>"ok","msg"=>"", "contenuto"=>"");
	
	$msg="";
	$errore=false;
	
	$marca = trim($marca);
    $modello = trim($modello);

    if ($cid == null || $cid->connect_errno) {
		$risultato["status"]="ko";
		if (!is_null($cid))
		     $risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		else $risultato["msg"]="errore nella connessione al db ";
		return $risultato;
	}

	if (empty($marca) || empty($modello) || empty($capienza))
	{
		$errore = true;
		$msg = "Uno dei parametri non e specificato<br/>";
	}
	if (!in_array($capienza,array("20","40","60")))
	{
		$errore = true;
		$msg .= "La capienza non e tra i valori validi<br/>";
	}
	if (strlen($marca)<3 || !ctype_alpha($marca))
	{
		$errore = true;
		$msg .= "La marca deve essere una stringa si almeno 3 caratteri<br/>";
	}
	
	if (strlen($modello)<3 || !ctype_alpha($modello))
	{
		$errore = true;
		$msg .= "Il modello deve essere una stringa si almeno 3 caratteri<br/>";
	}

	if (!$errore)
	{
	   $sql = "INSERT INTO pullman(marca, modello, capienza) 
                    VALUES ('$marca', '$modello', '$capienza');"; 
       $res=$cid->query($sql);
	   if ($res==1)
		   $risultato["msg"]="Operazione di inserimento si è conclusa con successo";
	   else
	   {
		   $risultato["status"]="ko";
		   $risultato["msg"]="Operazione di inserimento è fallita";
	   }
	}
	else
	{
		$risultato["status"]="ko";
		$risultato["msg"]=$msg;
	}	
	return $risultato;
}



function cancellaPullman($cid, $id_pullman)
{
    $risultato= array("msg"=>"","status"=>"ok");
	$msg="";

	if ($cid == null || $cid->connect_errno) {
		$risultato["status"]="ko";
		if (!is_null($cid))
		     $risultato["msg"]="errore nella connessione al db " . $cid->connect_error;
		else $risultato["msg"]="errore nella connessione al db ";
		return $risultato;
	}
	
	$sql = "DELETE FROM Pullman WHERE id_pullman='" . $id_pullman . "';";	

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
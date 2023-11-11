<?php

$res=leggiSquadre($cid);
$res1=leggiPartite($cid);

if (isset($_SESSION["logged"]))
{
	if ($res["status"]=="ok" && $res1["status"]=="ok") 
	{
	  $squadre=$res["contenuto"];
	  $partite= $res1["contenuto"];
	  stampaClassifica($partite, $squadre);
	}
	else
	{
		echo $res["msg"];
		echo $res1["msg"];
		
	}
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	


?>
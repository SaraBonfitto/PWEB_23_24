<?php
session_start();

include_once("../common/setup.php");
include_once("../common/funzioni.php");

if (isset($_SESSION["logged"]))
{	 
	$ris1= leggiSquadre($cid);
	if ($ris1["status"]=="ok")
		$ris2 = scriviPartita($cid,$ris1["contenuto"],$_GET["squadra1"],$_GET["squadra2"],$_GET["ris1"],$_GET["ris2"]);


	if ($ris1["status"]=='ok' && $ris2["status"]=='ok')
		header("Location:../index.php?op=visualizzaP&status=ok&msg=". urlencode($ris1["msg"] . $ris2["msg"]));
	else
		header("Location:../index.php?status=ko&msg=". urlencode($ris1["msg"] . $ris2["msg"]));
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	



?>
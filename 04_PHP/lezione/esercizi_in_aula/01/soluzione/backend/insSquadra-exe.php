<?php
session_start();

include_once("../common/setup.php");
include_once("../common/funzioni.php");
    
if (isset($_SESSION["logged"]))
{	 		  
	$ris= scriviSquadra($cid, $_POST["sigla"], $_POST["nome"]);

	if ($ris["status"]=='ok')
		header("Location:../index.php?op=visualizza&status=ok&msg=" . urlencode($ris["msg"]));
	else
		header("Location:../index.php?status=ko&msg=". urlencode($ris["msg"]));
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	



?>
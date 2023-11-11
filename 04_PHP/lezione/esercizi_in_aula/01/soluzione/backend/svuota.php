<?php
session_start();
include_once("../common/setup.php");
include_once("../common/funzioni.php");

if (isset($_SESSION["logged"]))
{	   
	if ($_GET["file"]=="partite")
	{	
		$ris=	svuotaFile($cid, "partite");
		if ($ris["status"]=='ok')
			header("Location:../index.php?status=ok&msg=". urlencode($ris["msg"]));
		else
			header("Location:../index.php?status=ko&msg=". urlencode($ris["msg"]));
	}
	else
	{
	  $ris1=svuotaFile($cid, "squadre");
	  $ris2=svuotaFile($cid, "partite");
	  
	  if ($ris1["status"]=='ok' && $ris2["status"]=='ok')
		header("Location:../index.php?status=ok&msg=". urlencode($ris1["msg"] . " " . $ris2["msg"]));
	  else
		header("Location:../index.php?status=ko&msg=". urlencode($ris1["msg"] . " " . $ris2["msg"]));
	  
	}  
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	




?>
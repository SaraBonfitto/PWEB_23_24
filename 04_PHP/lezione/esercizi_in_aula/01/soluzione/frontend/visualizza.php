<?php 
if (isset($_SESSION["logged"]))
{
	$res=leggiSquadre($cid);

	if ($res["status"]=="ok") 
		stampaSquadre($res["contenuto"]);
	else
		echo $res["msg"];
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	

?>
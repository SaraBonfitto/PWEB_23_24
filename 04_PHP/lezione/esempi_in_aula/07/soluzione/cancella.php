<?php
include_once("common/setup.php");
include_once("common/funzioni.php");

$ris= cancellaPullman($cid, $_GET["id"]);

// print_r($ris);
// come fatto per inserisci-exe, torno alla pagina di visualizzazione dei pullman
// in caso di esito positivo
// torno invece alla pagina principale per visulizzare l'errore di cancellazione

if ($ris["status"]=='ok')
        $location="gestione";
else	
		$location="index";
header("Location:$location.php?status=$ris[status]&ris=".serialize($ris["msg"]));


?>
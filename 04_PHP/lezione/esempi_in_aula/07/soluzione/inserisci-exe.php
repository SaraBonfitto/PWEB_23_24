<?php
include_once("common/setup.php");
include_once("common/funzioni.php");

$ris= scriviPullman($cid, $_POST["marca"], $_POST["modello"],$_POST["capienza"]);

// print_r($ris);
// se l'operazione è andata a buon fine, vado a visualizzare la lista dei pullman, in cui l'utente
// troverà il nuovo pullman appena inserito
// altrimenti torno alla pagina iniziale e visualizzo l'errore riscontrato.
// Una soluzione migliore è tornare alla pagina di inserimento e riportare l'errore identificato nella casella specifica
if ($ris["status"]=='ok')
        $location="gestione";
else	
		$location="index";
header("Location:$location.php?status=$ris[status]&ris=".serialize($ris["msg"]));

	
?>
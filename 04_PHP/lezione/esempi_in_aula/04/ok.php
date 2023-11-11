<?php 

//$tipoErrore= array(
//    "1"=> "cognome non valido",
//    "2"=> "nome non valido",
//    "3"=> "data non valida",
//    "4"=> "Bisogna specificare almeno una attività",
//    "5"=> "Bisogna accettare le condizioni di utilizzo"
//);


$cognome = $_POST["cognome"];
$nome = $_POST["nome"];
$giorno = $_POST["giorno"];
$mese = $_POST["mese"];
$anno = $_POST["anno"];
$sesso = (isset($_POST["sex"]))?$_POST["sex"]:null;
$attivita = (isset($_POST["attivita"]))?$_POST["attivita"]:array();
$condizioni = (isset($_POST["condizioni"]))?$_POST["condizioni"]:null;

$errore = array();
$dati = array();
// print_r($_POST);

if (empty($nome) || strlen($nome)<3)  $errore["nome"]="2";

$dati["nome"]=$nome;

if (empty($cognome) || strlen($cognome)<3)  $errore["cognome"]="1";

$dati["cognome"]=$cognome;

if (empty($giorno) || empty($mese) || empty($anno) || !checkdate($mese,$giorno,$anno))
{
    $errore["giorno"]="3";
}
$dati["giorno"]=$giorno;
$dati["mese"]=$mese;
$dati["anno"]=$anno;

if ($sesso==null)  $errore["sex"]="6";

$dati["sex"]=$sesso;


if (count($attivita)==0)    $errore["attivita"]="4";

$dati["attivita"]=$attivita;

if (is_null($condizioni))  $errore["condizioni"]="5";

$dati["condizioni"]=$condizioni;

// ho terminato i controlli e l'assegnamento dell'errore riscontrato
// se si sono verificati degli errori devo tornare i dati, la lista degli errori e una parametro status = ko
// se invece non si sono verificati errori (per semplicità restituisco i dati e un parametro status =ok)
// in casi reali, i dati inseriti dall'utente (che sono corretti) verranno inseriti in una base di dati (vedremo più avanti)

if (count($errore)>0)
{
    header('location:datiUtente.php?status=ko&dati='. serialize($dati). 
               "&errore=". serialize($errore)); 
}
else{
    header('location:datiUtente.php?status=ok&dati='. serialize($dati)); 
}


?>
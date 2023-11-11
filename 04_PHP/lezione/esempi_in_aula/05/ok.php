<?php 
session_start();

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


// da questo punto in avanti ci sono i controlli dell'input. 
// Diverse tipologie di controlli possono essere eseguiti. La qualità e quantità di controlli
// dipendono dalle abilità del programmatore. I controlli di base, vanno però sempre fatti. 

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
	$_SESSION["dati"]=$dati;
	$_SESSION["errore"]=$errore;
	$_SESSION["status"]="ko";
    header('location:datiUtente.php'); 
}
else{
	$_SESSION["dati"]=$dati;
	$_SESSION["status"]="ok";
    header('location:datiUtente.php'); 
}


?>
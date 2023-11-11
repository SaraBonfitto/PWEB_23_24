<?php

$login= $_POST["user"];
$pwd = $_POST["pass"];

include_once("../common/setup.php");
include_once("../common/funzioni.php");

if ($cid)
{
    $result= isUser($cid,$login,$pwd);
	if ($result["status"]=="ok")
	{
	  if (isset($_POST["ricordami"]))
		  // se l'utente richiede di essere ricordato, allora setto il cookie 
		  // questo approccio è MOLTO insicuro (per cui non consento di salvare anche la password
		  // vedremo più avanti come renderlo più sicuro e salvare anche la password
		  setcookie ("user",$login,time()+43200,"/");
	   elseif (isset($_COOKIE["user"])) {
		 unset($_COOKIE['user']);
		 setcookie('user', null, -1, '/');
	   }
	   $cid->close();
	  session_start();
	  $_SESSION["utente"]=$login;
	  $_SESSION["logged"]=true;
	  header("Location:../index.php?status=ok&msg=". urlencode($result["msg"]));
	}
	else
	{
	  header("Location:../index.php?status=ko&msg=" . urlencode($result["msg"]));
	}
}
else
	header("Location:../index.php?status=ko&msg=". urlencode("errore di connessione al db"));


?>
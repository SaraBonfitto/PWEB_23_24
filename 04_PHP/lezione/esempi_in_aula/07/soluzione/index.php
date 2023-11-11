<!DOCTYPE html>
<html lang="en">
    <?php require "common/header.html"?>
<body>

<?php require "common/nav.html"?>

<div class="container-fluid bg-1 text-center">

<?php
   if (!isset($_GET["status"]))
   {
    // se non è settato status vuol dire che sto arrivando per la prima volta
    // su questa pagina e do il messaggio di benvenuto. Altrimenti, visualizzo il messaggio di errore
?>

<h3>Benvenuto al sito di gestione dei Pullman!</h3>
  <p>Attraverso questa applicazione potrai 
    visionare, cancellare e modificare le informazioni dei 
    pullman gestiti dalla nostra ditta</p>

<?php
}




elseif ($_GET["status"]=='ko')
{
  echo "<div class=\"alert alert-danger\">Si sono verificati i seguenti errori<br/>";
  echo  unserialize($_GET["ris"]) . "</div>";
}else
{
  echo "<div class=\"alert alert-success\">Operazione eseguita con successo<br/>";
  echo "<p>". unserialize($_GET["ris"]) . "</div>";
}
?>
</div>

<?php require "common/credit.html"?>


</body>
</html>

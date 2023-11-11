<!DOCTYPE html>
<html lang="en">
    <?php require "common/header.html"?>
<body>

<?php 
require "common/nav.html";
require "common/setup.php";
require "common/funzioni.php" 
?>

<div class="container-fluid bg-1 text-center">

<?php

if (isset($_GET["status"]))
{
  if ($_GET["status"]=='ko')
  {
    echo "<div class=\"alert alert-danger\">Si sono verificati i seguenti errori<br/>";
    echo  unserialize($_GET["ris"]) . "</div>";
  }else
  {
    echo "<div class=\"alert alert-success\">Operazione eseguita con successo<br/>";
    echo "<p>". unserialize($_GET["ris"]) . "</div>";
  }
}

echo "<h3>Lista dei pullman disponibili</h3>";

   $res= leggiPullman($cid);
   if ($res["status"]=="ko")
   {
    echo "<div class=\"alert alert-danger\">Si sono verificati i seguenti errori<br/>";
    echo  $res["msg"] . "</div>";
      // echo "<p>Si sono verificati i seguenti errori . " . $res["msg"] ."</p>";
   }
   else
   { // se non si sono verificati errori, visualizzo la seguente tabella
?>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>Identificatore</th>
        <th>Marca</th>
        <th>Modello</th>
        <th>Capienza</th>
        <th>Modifica</th>
        <th>Cancella</th>
      </tr>
    </thead>
    <tbody>
      <?php
          stampaRigheTabella($res["contenuto"]);      
      ?>      
    </tbody>
  </table>

  <?php
    } // con questa parentesi chiuso l'else precedente
  ?>

</div>

<?php require "common/credit.html"?>


</body>
</html>

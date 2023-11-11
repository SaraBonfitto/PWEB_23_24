<!DOCTYPE html>
<html lang="en">
    <?php require "common/header.html"?>
<body>

<?php 
require "common/nav.html";
?>

<div class="container-fluid bg-1 text-center">
<h3>Inserisci un nuovo Pullman</h3>

<form class="form-horizontal" role="form" action="inserisci-exe.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="marca">Marca:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="marca" placeholder="Inserisci modello">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="modello">Modello:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="modello" placeholder="Inserisci modello">
      </div>
    </div>
    <div class="form-group"> 
    <label class="control-label col-sm-2" for="capienza">Capienza:</label>       
      <div class="col-sm-10">
        <select  class="form-control" name="capienza"> 
            <option value="20">20 - piccolo</option> 
            <option value="40">40 - medio</option> 
            <option value="60">60 - grande</option> 
        </select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>


</div>

<?php require "common/credit.html"?>
</body>
</html>






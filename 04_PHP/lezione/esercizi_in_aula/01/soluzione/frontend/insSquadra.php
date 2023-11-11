<?php

if (isset($_SESSION["logged"]))
{
	?>
	
<form method="POST" action="backend/insSquadra-exe.php">
<div class="form-group">
      <label>Sigla squadra</label>
      <input class="form-control" type="text" name="sigla" placeholder="Sigla della squadra (2 caratteri)"/>
</div>
<div class="form-group">
      <label>Nome Squadra</label>
      <input class="form-control" type="text" name="nome" placeholder="Nome della squadra (solo caratteri)">
</div>
<input type="submit" class="btn btn-primary" value="Registra"/>
<input type="reset" class="btn btn-success" value="Annulla"/>
</form>
<?php

}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	

?>
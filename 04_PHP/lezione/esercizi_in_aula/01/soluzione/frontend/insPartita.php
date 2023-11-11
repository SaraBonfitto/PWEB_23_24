<?php

include_once("common/setup.php");
include_once("common/funzioni.php");

if (isset($_SESSION["logged"]))
{
?>
		<form   name="inserimento" action="backend/insPartita-exe.php" method="GET">
				
		<div class="row">
			<div class="form-group row">
			   <div class="col-xs-1">
			   </div>
				<div class="col-xs-3">
				<label for="ex1">Casa</label>
				
				<?php 
				
				  $ris=leggiSquadre($cid);
                  if ($ris["status"]=='ok')
				  {
					  selezionaSquadre($ris["contenuto"], "squadra1", "ex1");
				  }
                  else
                  {					  
				
				?>
				<select type="text"  class="form-control" id="ex1" name = "squadra1" >
					<option>ERRORE</option>
				</select>
				  <?php } // chiusura else 
					  ?>
				</div>
				<div class="col-xs-3">
				<label for="ex2">Ospite</label>
				<?php 
				
                  if ($ris["status"]=='ok')
				  {
					  selezionaSquadre($ris["contenuto"], "squadra2", "ex2");
				  }
                  else
                  {					  
				
				?>
				<select type="text"  class="form-control" id="ex2" name = "squadra2" >
					<option>ERRORE</option>
				</select>
				  <?php } // chiusura else 
					  ?>
				</div>
				<div class="col-xs-2">
				<label for="ex3">Goal Casa</label>
				<input type="number"  class="form-control" id="ex3" name = "ris1"  min="0" max="10" value="0"/>
				</div>
				<div class="col-xs-2">
				<label for="ex4">Goal Ospite</label>
				<input type="number" class="form-control" id="ex4" name = "ris2"  min="0" max="10" value="0"/>
				</div>
			</div>	
		</div>	
			
		<div class="row">
				<div class="col-xs-1">
			   </div>
			<input type="submit" class="btn btn-default" value = "ok" />
			<input type="reset" class="btn btn-default" value = "cancella" />
		</div>	
	</form>    

<?php
}
else
{
	header("Location:../index.php?status=ko&msg=". urlencode("Operazione riservata ad utenti registrati. Procedi con la login"));
}	

	?>
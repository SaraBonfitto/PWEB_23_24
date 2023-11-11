<?php
session_start();
include "common/setup.php";
include "common/funzioni.php";
?>


<!DOCTYPE html>
<html lang="en">
  <?php include "common/head.php";?> 
  <body>

   <?php include "common/navigation.php";?>  
   

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      
		<?php
		
		if (!isset($_SESSION["logged"]))
		{
			echo "<div class=\"well\"><h1>Benvenuto nel sistema di gestione campionato calcio</h1></div>";
		}
		else
		{
			if (isset($_GET["op"]))
			{
				echo "<div class=\"well\">";
				include "frontend/". $_GET["op"] . ".php";
				echo "</div>";
			}
			elseif (!isset($_GET["status"]))
			{
				echo "<div class=\"well\"><h1>ciao ". $_SESSION["utente"] . ". Sei connesso al sistema di gestione campionato calcio</h1></div>";
			}
		}
		?>
	
    </div> <!-- /container -->
    <div class="container">
	<?php
	
	  if (isset($_GET["status"]))
      {
		  if ($_GET["status"]=='ok')
			  echo "<div class=\"alert alert-success\"><strong>" . urldecode($_GET["msg"]) . "</strong></div>";
				  else 
			  echo "<div class=\"alert alert-danger\"><strong>Errore!</strong>" . urldecode($_GET["msg"]) . "</div>";
	  }  
			  
	
	?>
	 </div> <!-- /container -->
	 
   <?php include "common/footer.php";?>    
  </body>
</html>
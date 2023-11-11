 <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="images/logo2.png"  height="50" width="50"/>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION["logged"])) {?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Squadre <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?op=visualizza">Visualizza</a></li>
                <li><a href="index.php?op=insSquadra">Inserisci</a></li>
				<li><a href="backend/svuota.php?file=squadre">Svuota</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Partite <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?op=visualizzaP">Visualizza</a></li>
                <li><a href="index.php?op=classifica">Classifica</a></li>
                <li role="separator" class="divider"></li>
                <!-- <li class="dropdown-header">Nav header</li> -->
                <li><a href="index.php?op=insPartita">Inserisci Risultati</a></li>
				<li role="separator" class="divider"></li>
                <!-- <li class="dropdown-header">Nav header</li> -->
                <li><a href="backend/svuota.php?file=partite">Svuota</a></li>
              </ul>
            </li>
			<?php } // chiudo if su variabile di sessione logged  ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
		   <?php if (isset($_SESSION["logged"])) {?>
          
			<li><a href="backend/logout-exe.php"><span class="glyphicon glyphicon-log-out"></span> Logout
			</a></li>
			<?php } else {// chiudo if-then su variabile di sessione logged  ?>
			<li><a href="index.php?op=registrazione"><span class="glyphicon glyphicon-user"></span> Registrazione</a></li>
			<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login
			</a></li>
			<?php } // chiudo if-else su variabile di sessione logged  ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	    <!-- Di seguito viene introdotta una modal per effettuare il login. La modal è un box di dialogo modale. Cioé permette di aprire una pagina, sulla pagina corrente, con la quale instaurare una
	comunicazione con l'utente (come in questo caso che si richiede di inserire login e password).
	Maggiori informazioni a http://www.html.it/guide/img/bootstrap/ref/modal.html -->
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"  aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Accedi al tuo account</h1><br>
				  <form method="POST" action="backend/login-exe.php">
					<input type="text" name="user" placeholder="Nome utente"  value="">
					<input type="password" name="pass" placeholder="Password">
					Ricordami : <input type="checkbox" name="ricordami">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="index.php?op=registrazione">Registrazione</a> 
				  </div>
				</div>
			</div>
		  </div>
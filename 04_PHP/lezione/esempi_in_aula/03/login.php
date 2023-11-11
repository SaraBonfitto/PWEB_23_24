<html>
	<?php
	REQUIRE "header.html";
	?>
	
	<body>
	    <!-- commento -->
		<body>
		
		<p class="titolo"> Servizi riservati!<br/>
		Per accedere devi digitare username e password e quindi premere OK </p>
		
		<p class="form">
		<form action="ok.php" method="GET">
		  <table class="insert"> 
				<tr>
					<td>user name: </td><td><input type = "text" name = "nome"></td>
				</tr>
				<tr>
					<td>password: </td><td><input type = "password" name = "pwd"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type= "submit" value= "OK"/>
					    <input type = "reset" value = "Cancella"/>
						
					</td>
				</tr>
			</table>
				</form>
		</p>		
	</body>
</html>
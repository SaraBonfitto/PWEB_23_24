<?php 
function connessione($servername, $username, $password, $dbname) { 
   $conn = new mysqli($servername, $username, $password, $dbname); 
   if ($conn->connect_error) { 
       die("Errore di connessione al db $dbname: " . $conn->connect_error); 
   } 
   return $conn; 
}
?> 
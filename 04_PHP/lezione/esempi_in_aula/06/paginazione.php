<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'GenitoriFigli';

$cid = new mysqli($hostname,$username,$password,$db);

if($cid->connect_errno)
{ die('Errore connessione (' . $cid->connect_errno . ')' . $cid->connect_error); }
else { echo 'Connesso. ' . $cid->host_info . "\n";}

$res= $cid->query("SELECT COUNT(*) FROM Persone");

$page = (isset($_GET["page"]))?$_GET["page"]:1;

$Nrow = 5; 
$offset = ceil($Nrow*($page-1));

if ($records=$res->fetch_row()) {
    $paginaMax = ceil($records[0]/$Nrow);}


if ($offset!=0)
$query = "SELECT * FROM Persone LIMIT $Nrow OFFSET $offset";
else
$query = "SELECT * FROM Persone LIMIT $Nrow";

?>


<!DOCTYPE html>
<html lang="en">
<body>

<?php

// $query= "SELECT * FROM persone";

$res= $cid->query($query);
if ($res->num_rows==0){
   echo "non ci sono record";} 
else {
  echo "<table border='1'> <th>Nome</th>  
         <th>Reddito</th> <th>et&agrave;</th> <th>sesso</th>";
   while ($records=$res->fetch_row()) {
        echo "<tr>";
        echo "<td>".$records[0]."</td>";
        echo "<td>".$records[1]."</td>";
        echo "<td>".$records[2]."</td>";
        echo "<td>".$records[3]."</td>";
       echo "</tr>\n";
   } // end-while
   echo "</table>";
} // end if
?>

<table border="0">
<tr><td>
<?php if ($page!=1) { ?>
<form METHOD="GET" ACTION="paginazione.php">
<input type="hidden" name="page" value="<?php echo $page-1;?>"/> 
<input type="submit" name="prec" value="prec">
</form>
<?php } # chiusura if ?></td>
<td>&nbsp;&nbsp;&nbsp;</td> <td>
<?php if ($paginaMax != $page) { ?>
<form METHOD="GET" ACTION="paginazione.php">
<input type="hidden" name="page" value="<?php echo $page+1;?>"/> 
<input type="submit" name="succ" value="succ">
</form><?php } # chiusura if ?></td></tr>
</table>


</body>
</html>


<?php
$N=5;

?>
<html>
<head>
	<title>Tavola Pitagorica</title>
	<link rel="stylesheet" type="text/css" href="stile.css">
</head>
<body>
    <table>
    <?php
       for ($i=0; $i <= $N;$i++)
       {
         echo "<tr>";
         for ($j=0; $j <= $N;$j++)
        {
           if ($i==0 && $j==0) echo "<th>*</th>\n";
           if ($i==0 && $j!=0) echo "<th>$j</th>\n";
           if ($i!=0 && $j==0) echo "<th>$i</th>\n";
           if ($i!=0 && $j!=0) echo "<td>". $i*$j . "</td>\n";
        }
        echo "</tr>\n";
       }
    ?>
    </table>
</body>
</html>

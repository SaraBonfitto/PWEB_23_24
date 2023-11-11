<?php
  $settimana =array("lun","mar","mer","gio","ven");
  $ore=array("9:30-10:30","10:30-11:30","11:30-12:30","12:30-13:30","13:30-14:30","14:30-15:30");
  /*
    commento
  
  */
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Prova per creare un form</title>
		<link rel="stylesheet" type="text/css" href="stile.css">
	</head>
<body>
    <table>
        <?php
          for ($i=0; $i <= count($ore);$i++)
          {
            echo "<tr>";
            for ($j=0; $j <= count($settimana);$j++)
           {
              if ($i==0 && $j==0) echo "<th>*</th>\n";
              if ($i==0 && $j!=0) echo "<th>" . $settimana[$j-1] . "</th>\n";
              if ($i!=0 && $j==0) echo "<th>" . $ore[$i-1] . "</th>\n";
              if ($i!=0 && $j!=0) {
                  if (($settimana[$j-1]=="lun" &&
                       ($ore[$i-1]=="10:30-11:30" || $ore[$i-1]=="11:30-12:30" 
                  )) || ($settimana[$j-1]=="mer" &&
                  ($ore[$i-1]=="11:30-12:30" || $ore[$i-1]=="12:30-13:30")
                  ))
                    echo "<td>PWEB</td>\n";
                 else 
                 echo "<td></td>";   
              }
           }
           echo "</tr>\n";
          }
        ?>
</table>
</body>
</html>

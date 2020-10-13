<!DOCTYPE html>
<html>
<body>

<?php
$cars = array (
    [MUSICALS] => array("Oklahoma","The Music Man","South Pacific"),
    [dramas] =>  array("Lawrence of Arabia","To Kill a Mockingbird","Casablanca"),
    [mysteries] => array("The Maltese Falcon","Rear Window","North by Northwest")
  );
     
    
for ($row = 0; $row < 3; $row++) {
  echo "<p><b> $row </b></p>";
  
  for ($col = 0; $col < 3; $col++) {

    echo " ----> " .$col ." = " .$cars[$row][$col]."<br>";
  }
  
}
?>

</body>
</html>
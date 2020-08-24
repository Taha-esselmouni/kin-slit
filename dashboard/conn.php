
<?php
$host="localhost";
$user="root";
$pw="taha";
$ndb="kinetorapie";
$con=mysqli_connect($host,$user,$pw,$ndb);
 if($con){
  echo"connected";
 }else{
  echo"no connected";}

?>
<?php  // creating a database connection 

$uid = $_POST["usid"];
$t_f = $_POST["tful"];
$w_c = $_POST["wchange"];
$bmi_c = $_POST["bmichange"];

   $db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-VS4J3NS)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = orcl.168.10.10)
    )
  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "1234";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; 
		} 
   else 
      { die('Could not connect to Oracle: '); } 
  echo $t_f;
  
  $query = "update progress set targets_fulfilled = $t_f, Weight_change = $w_c, BMI_change = $bmi_c where Progress_id =".$uid;
  $query_id = oci_parse($con, $query);
  $runselect = oci_execute($query_id);
  if ($runselect)
  {
	  echo "updation Successful";
	  
  }
  else 
  {
	  echo "Record not updated<br>";
  }
    
	  
?>


<html>

<head>

<title>Plan Selection </title>
</head>
<Body> <br>  
<?php 	
	if (isset($_POST["buttonn"]) && ($_POST["dip"] != ""))	
	{
									//echo"HERO";
		//================================================================
  $db_sid = 
   "(DESCRIPTION =
	(ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-VS4J3NS)(PORT = 1521))
	(CONNECT_DATA =
	  (SERVER = DEDICATED)
	  (SERVICE_NAME = orcl.168.10.10)
	)
  )";          // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
	  
	   $db_user = "scott";   // Oracle username e.g "scott"
	   $db_pass = "1234";    // Password for user e.g "1234"

								//echo"HERE";
									$p_id = $_POST["dip"];
									$con4 = oci_connect($db_user,$db_pass,$db_sid); 
								   if($con4) 
									  { echo "Oracle Connection Successful."; 
										} 
								   else 
									  { die('Could not connect to Oracle: '); } 
								  
								 $q4 = "Select * from users";
								 $query_id4 = oci_parse($con4, $q4); 		
								 $r4 = oci_execute($query_id4);
								 $count =00000;
								
								 echo"<hr>"; 
								 while($row = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
								 { 
							
									if ($row['USER_ID']>$count)
									{
										$count=$row['USER_ID'];
									}
								 }
								
								
							   $con = oci_connect($db_user,$db_pass,$db_sid); 
							   if($con) 
								  { echo "Oracle Connection Successful."; } 
							   else 
								  { die('Could not connect to Oracle: '); } 
							   
								 // Insertion  in the emp Table
								//$q = "insert into emp values (".$empnumber.", '".$empname."' , '".$empjob."' ,".$empmanager." , TO_DATE('".$empdate."', 'yyyy/mm/dd'),".$empsalary.",".$empcommission.",".$empdeptno.")";
								$q = "UPDATE USERS SET PLAN_ID = ".$p_id." WHERE USER_ID =".$count;
								//echo $q;
								
								 $query_id = oci_parse($con, $q); 		
								 $r = oci_execute($query_id); 

								 // Selected the Inserted Record and shows on the webpage 
								 if($r)
								 {
										echo "<b>INSERTED </b>";
								 }
								 else
								 {
									 echo "Record not inserted!<br>";
									 $e = oci_error($query_id);  
									 echo $e['message'];
								 }
		
		
	}
	else{
			echo "Fill everything bro " ;
	}
		//================================================================
			
	 
			
			
			
			
			
			
			
	
	
	

?>
</body>
</html>
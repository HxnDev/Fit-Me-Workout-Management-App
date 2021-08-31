<html>

<head>
<title>EXERCISE PLAN </title>

<style>
h1 {text-align: center;}
p {text-align: center;}
h2 {text-align: center;}
.bg-image {
  /* The image used */
  background-image: url("ex1.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
 
 
  background-size: cover;
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
 
  left: 50%;
  transform: translate(-50%, -110%);

  width: 50%;
  padding: 20px;
  
}
</style>

</head>
<body>
   

<?php  // creating a database connection 
	$len = 0;
	$len1 = 0;
   $uid = $_POST["id"];
   //$uid = 10001;
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
							
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo " "; } 
   else 
      { die('Could not connect to Oracle: '); } 
      

	 $q = "select plan_id from users where user_id =".$uid;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
	 //echo"<br>"; 	 
	 //print_r($rs_arr); 
	 //echo"<hr>"; 
	 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { 
		$pid[] = $row['PLAN_ID'];
		//echo "YOUR NUTRITIONAL INTAKE SHOULD BE: ".$row['NUTRITIONAL_INTAKE']." "."<br>"; 
		$len = $len + 1;
	 }
	 
	 $con1 = oci_connect($db_user,$db_pass,$db_sid); 
	   if($con1) 
		  { echo " "; } 
	   else 
		  { die('Could not connect to Oracle: ');
	  } 
		
		for ($i = 0;$i< $len ;$i++)
		{
			 $q1 = "select * from contain where plan_id =".$pid[$i];
			 //echo $pid[$i];
			 $query_id1 = oci_parse($con1, $q1); 		
			 $r1 = oci_execute($query_id1); 
			 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
			 //echo"<br>"; 	 
			 //print_r($rs_arr); 
			 //echo"<hr>"; 
			 while($row = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS)) 
			 { 
				
								$n[]= $row['NAME'];
								$d[] = $row['DAY'];
								$len1 = $len1 +1 ;
								
							
				
			 }
		}
		
		
		$con2 = oci_connect($db_user,$db_pass,$db_sid); 
	   if($con2) 
		  { echo " "; } 
	   else 
		  { die('Could not connect to Oracle: ');
	  } 
		
		for ($i = 0;$i< $len1 ;$i++)
		{
			 $q2 = "select * from exercise where name ='".$n[$i]."'";
			 //echo $pid[$i];
			 $query_id2 = oci_parse($con2, $q2); 		
			 $r2 = oci_execute($query_id2); 
			 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
			 //echo"<br>"; 	 
			 //print_r($rs_arr); 
			 //echo"<hr>"; 
			 while($row = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS)) 
			 { 
								$m[] = $row['MUSCLE'];
								$eq[] = $row['EQUIPMENT'];
								$os[] = $row['OPTIMAL_SETS'];
								//$len1 = $len1 +1 ;
								
							
				
			 }
		}
		
		 
?>


		
	<div class="bg-image"></div>
	
	<div class="bg-text">
	
		<h2 style = "font-size:50px">YOUR EXERCISE PLAN</h2>
		
		<?php
		for ($i = 0;$i < $len1; $i++)
		{
			
			echo '
			<ul>
			<li> DAY: '."$d[$i]".
				'<ul>
					
					<li>NAME OF EXERCISE: '."$n[$i]".'</li>
						<ul>
							<li>TARGETTED MUSCLE: '."$m[$i]".'</li>
							<li>EQUIPMENT REQUIRED: '."$eq[$i]".'</li>
							<li>OPTIMAL SETS: '."$os[$i]".'</li>
							
						</ul>
					
							
				</ul>
			</li>
			
			
			
			
		</ul>
			';
		}
		?>
		
		
	
		
	</div>
</body>


</html>
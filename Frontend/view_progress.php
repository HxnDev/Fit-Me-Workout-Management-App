<html>

<head>
<title>Exercises </title>

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
  transform: translate(-50%, -150%);

  width: 50%;
  padding: 20px;
  
}
</style>

</head>
<body>
   

<?php  // creating a database connection 

	if (isset($_POST['id']))
	{
		$i = $_POST['id'];
		//echo $i;
	}
	$len = 0;
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
      

	 $q = "select * from progress where progress_id =".$i;
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
	 //echo"<br>"; 	 
	 //print_r($rs_arr); 
	 //echo"<hr>"; 
	 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { 
		$pid[] = $row['PROGRESS_ID'];
		$tf[] = $row['TARGETS_FULFILLED'];
		$wc[] = $row['WEIGHT_CHANGE'];
		$bmic[] = $row['BMI_CHANGE'];
		$len = $len=1;
		
		//echo "YOUR NUTRITIONAL INTAKE SHOULD BE: ".$row['NUTRITIONAL_INTAKE']." "."<br>"; 
	 }
	 
	 
?>


	
	

	<div class="bg-image"></div>
	
	<div class="bg-text">
	
		<h2 style = "font-size:50px">PROGRSS</h2>
		<p style = "font-size:30px">Your success is our success</p>
		<?php
		for ($i = 0;$i < $len; $i++)
		{
			
			echo '
			<ul>
			<li> PROGRESS ID: '."$pid[$i]".
				'<ul>
					
					<li>Targetts fulfilled: '."$tf[$i]".'</li>
					<li>Weight: '."$wc[$i]". 'kg</li>
					<li>BMI: '."$bmic[$i]".'</li>
							
				</ul>
			</li>
			
			
			
			
		</ul>
			';
		}
		?>
		
		
	
		
	</div>
</body>


</html>
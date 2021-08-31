

<html>

<head>
<title>Exercise </title>

<style>
h1 {text-align: center;}
p {text-align: center;}
h2 {text-align: center;}
.bg-image {
  /* The image used */
  background-image: url("us_id_bg.png");
  
  /* Add the blur effect */
  
  
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
	<div class="bg-image"></div>
		
		<div class="bg-text">
		
			<h2 style = "font-size:50px">log In</h2>
			<form method = "POST" action="login.php">
				<label for = "uid">Enter User Id:</label><br>
				<input type="text" id = "uid" name = "uid"><br>
				<input type = "submit" value= "Login">
			</form>
			
		
		</div>
</body>


<?php  // creating a database connection 

	if (isset($_POST['uid']))
	{
		$u = $_POST['uid'];
	
	
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
		  

		 $q = "select * from users where user_id = "."$u";
		 $query_id = oci_parse($con, $q); 		
		 $r = oci_execute($query_id); 
		 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
		 //echo"<br>"; 	 
		 //print_r($rs_arr); 
		 //echo"<hr>"; 
		 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
		 { 
			$val = $row['USER_ID'];
			echo "user id is ".$row['USER_ID'];
			$len = $len + 1;
			//echo "YOUR NUTRITIONAL INTAKE SHOULD BE: ".$row['NUTRITIONAL_INTAKE']." "."<br>"; 
		 }
		 
		 if ($len == 1)
		 {
			 echo "<div class=\"bg-text\"><form method = \"POST\" action=\"view_progress.php\"><input type=\"text\" name = \"id\" value =".$val." ><br><input type = \"submit\" value= \"Press Me\"></form>";
			 //echo"<div class=\"bg-text\"><a href=\"http://localhost/project/home1.html\">PRESS ME</a></div>";
			 //echo "user id does exist";
		 }
		 else 
		 {
			 echo "<div class=\"bg-text\">Invalid user id, please enter a valid user id";
		 }
	}
	else 
	{
		//echo "NOTHING SELECTED";
	}
	 
?>


	

</html>
<html>

<head>
<style>
body
{
	background-image:url("chase.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: 100% 100%;
}
</style>

</head>
<title>Database Insertion </title>
<body>
<form action="" method="post">
                <table border="4" width=100%>
                    <tr><td colspan="4">Welcome Visitor</td></tr>
                    <tr><th colspan="4" align="middle">Please provide us following information</th></tr>
					
                    <tr>
							<td>Name:</td>
							<td>
								<input type="text" name="name" value=""/>
								
								
							</td>
							
							
							
					
							<td>GENDER:</td>
							<td>
								<input  type="text" name="gender" value="M" maxlength="1"  pattern="[MF]"/>
								
								
							</td>
							
					</tr>
					
					
					
                    <tr>
					
							<td>CNIC</td>
							<td>
								<input type="text" name="cnic" value="" maxlength="13"/>
								
								
							</td>
							
							
							<td>HEIGHT:</td>
							
							<td>
								<input type="number" name="height" value="" step="0.01" /> 
								
								
							</td>
						
                    </tr>
					
					
					
					
					
					<tr>
					
							 <td>WEIGHT:</td>
							<td>
							   
								<input type="number" name="weight" value="" step="0.01" /> 
								
							</td>
							
							
							<td>BMI:</td>
							
							<td>
								<input type="number" name="bmi" value="" step="0.01" /> 
								
								
							</td>
						
                    </tr>
					
					
					
					<tr>
					
							 <td>GOAL_WEIGHT</td>
							<td>
							   
								<input type="number" name="gw" value="" step="0.01" /> 
								
							</td>
							
							
							 
						
                    </tr>
					
					
					<tr>
					
							<td>PHONE-NUMBER:</td>
							<td>
							   
								<input type="text" name="phone" value="" /> 
								
							</td>
							
							
							<td>EMAIL:</td>
							
							<td>
								<input type="text" name="mail" value="" /> 
								
								
							</td>
						
                    </tr>
					

                        </table>
						<br>
						<input type="submit" name="button" value="OK"/>
            </form>
<?php  // creating a database connection 

if (isset($_POST["button"]))
{
	//if(isset($_POST["name"]) and isset($_POST["id"]) and isset($_POST["EMG"])   and isset($_POST["job"])  and isset($_POST["date"])  and isset($_POST["salary"]) and isset($_POST["commish"])    and isset($_POST["deptnoo"]))
	if (($_POST["name"]!="") and($_POST["cnic"]!="") and ($_POST["gender"]!="")  and($_POST["height"]!="")  and($_POST["weight"]!="") and($_POST["bmi"]!="") and($_POST["gw"]!=""))
	{
		
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
							   
// for user e.g "1234"
							   
							   $bmi=$_POST["bmi"];
							   if ($bmi < 19)
							   {
								   $ni = 2000;
							   }
							   else if ($bmi >= 19 and $bmi <25)
							   {
								   $ni = 1600;
							   }
							   else if ($bmi >=25 and $bmi <30)
							   {
								   $ni = 1500;
							   }
							   else if ($bmi >=30)
							   {
								   $ni = 1300;
							   }
							   $name=$_POST["name"];
							   $cnic=$_POST["cnic"];
							   $gender=$_POST["gender"];
							   $height=$_POST["height"];
							   $weight=$_POST["weight"];
							   $bmi=$_POST["bmi"];
							   $gw=$_POST["gw"];
							   
							   $phone = $_POST["phone"];
							   $mail = $_POST["mail"];
							   //=====================================================================
							     $con3 = oci_connect($db_user,$db_pass,$db_sid); 
								   if($con3) 
									  { echo " "; 
										} 
								   else 
									  { die('Could not connect to Oracle: '); } 
								 
								 $q3 = "select * from USERS";
								 $query_id3 = oci_parse($con3, $q3); 		
								 $r3 = oci_execute($query_id3);
								 $count =00000;
								 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
								 //echo"<br>"; 	 
								 //print_r($rs_arr); 
								 echo"<hr>"; 
								 while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
								 { 
								//	echo $count;
								//	echo "Hello world!<br>";
								//	echo $row['USER_ID'];
									if ($row['USER_ID']>$count)
									{
										$count=$row['USER_ID'];
									}
								 }
							//	 echo "NEWWWWW<br>";
							//	 echo $count;
							//	 echo "Hello world!<br>";
								 
								 $count=$count+1;
							 //    echo $count;
							   
							   
							   
							   //===================================================================
								
							   $con = oci_connect($db_user,$db_pass,$db_sid); 
							   if($con) 
								  { echo " "; } 
							   else 
								  { die('Could not connect to Oracle: '); } 
							   
								 // Insertion  in the emp Table
								//$q = "insert into emp values (".$empnumber.", '".$empname."' , '".$empjob."' ,".$empmanager." , TO_DATE('".$empdate."', 'yyyy/mm/dd'),".$empsalary.",".$empcommission.",".$empdeptno.")";
								$q="insert into Users ( USER_ID , NAME , CNIC , GENDER , HEIGHT , WEIGHT , BMI , GOAL_WEIGHT , NUTRITIONAL_INTAKE) VALUES (" .$count.  ", '"  .$name."' , '".$cnic."', '".$gender."' ," .$height.",".$weight.",".$bmi."," .$gw.",'".$ni."')";
								
								//echo $q;
								
								 //$q="insert into emp values( 8214,'Ali', 'MANAGER' , 8213,TO_DATE('2004/12/31', 'yyyy/mm/dd'),2310,219,40)";
								 $query_id = oci_parse($con, $q); 		
								 $r = oci_execute($query_id); 
								 
								 
								 // Selected the Inserted Record and shows on the webpage 
								 if($r)
								 {
										//echo "<b>INSERTED </b>";
								 }
								 else
								 {
									 echo "Record not inserted!<br>";
									 //$e = oci_error($query_id);  
									 //echo $e['message'];
								 }
								 
								 $con1 = oci_connect($db_user,$db_pass,$db_sid); 
								   if($con1) 
									  { echo " "; } 
								   else 
									  { die('Could not connect to Oracle: '); } 
								   
								 $q1="insert into progress values (".$count.",0,".$weight.",".$bmi.")";
								 $query_id1 = oci_parse($con1, $q1); 		
								 $r1 = oci_execute($query_id1); 
								 if($r1)
								 {
										echo "<b>YOUR ID IS: ".$count."</b>";
								 }
								 else
								 {
									 echo "Record not inserted!<br>";
									
								 }
	
	}
	else 
	{

		echo "<b>fill everything bro </b>";

	}	
	
	
}
?>
<form action="plan.php" method="post">
	<input type="submit" value="Choose Plan" name="butto"/>
</form>
</body>
</html>

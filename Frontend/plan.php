<html>

<head>
<style>
body
{
	background-image:url("hassanmeesna.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: 100% 100%;
}
</style>

<title>Plan Selection </title>
</head>
<Body> <br>  
<form action="" method="post">
                <table border="4" width=100%>
                    <tr><td colspan="2" align="middle">Welcome Visitor</td></tr>
                    <tr><th colspan="2" align="middle">Please select Plan Type</th></tr>
                    
				     
                  
                  
                    <tr><td></td>
                    <td><form action="emp_info.php" method="post">
                        <input type="submit" value="Choose Plan" name="button"/>
                        </form></td></tr>
                        </table>
            </form>
<?php  // creating a database connection 

if (isset($_POST["button"]))
{
	//echo $count;
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
						   
	
	
	
	if (isset($_POST["button"]))
	{
		
													
													
													
													$con3 = oci_connect($db_user,$db_pass,$db_sid); 
													if($con3) 
													  { 
															echo "Oracle Connection Successful."; 
													 } 
												   else 
													  { die('Could not connect to Oracle: '); } 
												  
												 $q3 = "select plan_id ,p.plan_type, c.name , c.day from plan p JOIN contain c using (plan_id)";
												//$q3= "select * from USERS";
												//echo $q3;
												 $query_id3 = oci_parse($con3, $q3); 		
												 $r3 = oci_execute($query_id3);
												 echo"<br>";
												 echo "<TABLE>".
															 "<TR><TD><B> ID </B></TD> <TD><B> TYPE </B></TD> <TD><B> NAME </B></TD> <TD><B> DAY </B></TD></TR>";
														while($s_arr = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))
														{
															$id=$s_arr['PLAN_ID'];
															$pt=$s_arr['PLAN_TYPE'];
															$name = $s_arr['NAME'];
															$day=$s_arr['DAY'];
															
														  


														   
														  
															echo  "<TR>".
																	"<TD style = width:150px>".$id."</TD>".
																	"<TD style = width:150px>".$pt."</TD>".
																	"<TD style = width:150px>".$name."</TD>".
																	"<TD style = width:150px>".$day."</TD>".
																 "</TR>";
														   
														}
														echo "</TABLE>";
?>
				<form action="ChoosePlan.php" method="post"> 
                <table border="4" width=100%>
                    
                    <tr><th colspan="4" align="middle">ENTER THE ID FROM ABOVE</th></tr>
					
                    <tr>
							
							
							
							
							<td>ID:</td>
							<td>
								<input type="number" name="dip" value="PRESS"/>
								
								
							</td>
						
						
						
					</tr>
					
					
					
                 
                        </table>
						<br>
						<input type="submit" name="buttonn" value="OK"/>
					</form>

		
				
<?php 	
			//echo"HERO";
		//================================================================
	if (isset($_POST["buttonn"]) && ($_POST["dip"] != ""))	
		{
			echo"HERE";
				$p_id = $_POST["buttonn"];
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
		//================================================================
			
	  if($r3)
	 {
			echo "<b>These are the available plans </b>";
	 }
	 else
	 {
		 echo "Query didn't run!<br>";
		 $e = oci_error($query_id3);  
		 echo $e['message'];
	 }
			
			
			
			
			
			
			
	}
	
	
}
?>
</body>
</html>
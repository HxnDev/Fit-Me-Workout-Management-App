<html>

<head>
<title>DIET PLAN </title>

<style>
h1 {text-align: center;}
p {text-align: center;}
h2 {text-align: center;}
.bg-image {
  /* The image used */
  background-image: url("food.jpg");
  
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
  transform: translate(-50%, -100%);

  width: 50%;
  padding: 20px;
  
}
</style>

</head>
<body>
   

<?php  // creating a database connection 

	if (isset($_POST['theday']))
	{
		$day = $_POST['theday'];
	
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
		  

		 $q = "select * from users where user_id = 10001";
		 $query_id = oci_parse($con, $q); 		
		 $r = oci_execute($query_id); 
		 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
		 //echo"<br>"; 	 
		 //print_r($rs_arr); 
		 //echo"<hr>"; 
		 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
		 { 
			$ni = $row['NUTRITIONAL_INTAKE'];
			//echo "YOUR NUTRITIONAL INTAKE SHOULD BE: ".$row['NUTRITIONAL_INTAKE']." "."<br>"; 
		 }
	}
	else{
		echo "you did not select anthing";
	}
?>
	<div class="bg-image"></div>
	
	<div class="bg-text">
	
		<h2 style = "font-size:50px">Your diet plan for <?php echo $day ?></h2>
	<?php
	if ( $day  == "Monday")
	{
		echo'<ul>
			
				<ul>
					<li>Breakfast</li>
						<ul>
							<li>Green Tea</li>
							<li>Oats with mixed berries and flax seed</li>
							<li>2 boiled eggs</li>
							
						</ul>
					<li>Snack</li>
						<ul>
							<li>Fat free greek yogurt</li>
							<li>Apple</li>
							<li>Almonds</li>
							
						</ul>
					<li>Lunch</li>
						<ul>
							<li>Sweet potato</li>
							<li>Broccoli</li>
							<li>Fish fillet</li>
							
						</ul>
					<li>Dinner</li>
						<ul>
							<li>Grilled chicken</li>
							<li>Spinach salad (olive oil and apple cider vinegar)</li>
							<li>Asparagus</li>
							
						</ul>
				</ul>
			
		</ul>';
	}
	
	else if ( $day  == "Tuesday")
	{
		echo'
		<ul>
			<li>Breakfast</li>
				<ul>
					<li>Green Tea</li>
					<li>Omelet with mixed vegetables (peppers, mushrooms, onions, spinach and black olives) </li>
					<li>2 slices of brown bread</li>
					
				</ul>
			<li>Snack</li>
				<ul>
					<li>Fat free greek yogurt</li>
					<li>Protein shake with mixed berries and peanut butter</li>
					
					
				</ul>
			<li>Lunch</li>
				<ul>
					<li>Brown rice</li>
					<li>Salmon fillet</li>
				
					
				</ul>
			<li>Dinner</li>
				<ul>
					<li>Steak (lean fillet)</li>
					<li>Greek salad (romaine lettuce, tomato, cucumber, green pepper, olive oil)</li>
					<li>Broccoli</li>
					
				</ul>
		</ul>
		';
	}
	
	else if ( $day  == "Wednesday")
	{
		echo'
		<ul>
			<li>Breakfast</li>
				<ul>
					<li>Green Tea</li>
					<li>Oatmeal</li>
					<li>Skim milk</li>
					<li>Grape fruit</li>
					
				</ul>
			<li>Snack</li>
				<ul>
					<li>Fat free greek yogurt</li>
					<li>Apple</li>
					<li>Protein bar</li>
					
				</ul>
			<li>Lunch</li>
				<ul>
					<li>Vegetable salad</li>
					<li>1 banana </li>
					<li>1 toast</li>
					
				</ul>
			<li>Dinner</li>
				<ul>
					<li>Grilled chicken</li>
					<li>Vegetable salad (lettuce, cucumber with apple cider vinegar or lemon dressing)</li>
					<li>1 hard boiled egg</li>
					
				</ul>
		</ul>';
	}
	else if ( $day  == "Thursday")
	{
		echo'
		<ul>
			<li>Breakfast</li>
				<ul>
					<li>Green Tea</li>
					<li>2 toasts</li>
					<li>1 egg</li>
					
				</ul>
			<li>Snack</li>
				<ul>
					<li>Avocado sandwich</li>
					<li>Apple</li>
					
					
				</ul>
			<li>Lunch</li>
				<ul>
					<li>Kale and tuna salad</li>
					
					
				</ul>
			<li>Dinner</li>
				<ul>
					<li>Grilled chicken</li>
					<li>Lentil salad (lentils with olive oil and apple cider vinegar)</li>
					
					
				</ul>
		</ul>
		';
	}
	
	else if ( $day  == "Friday")
	{
		echo'
		<ul>
			<li>Breakfast</li>
				<ul>
					<li>Green Tea</li>
					<li>Oatmeal</li>
					<li>Skim milk</li>
					<li>Grape fruit</li>
					
				</ul>
			<li>Snack</li>
				<ul>
					<li>Vegetable salad</li>
					<li>1 banana </li>
					<li>1 toast</li>
					
				</ul>
			<li>Lunch</li>
				<ul>
					<li>Sweet potato</li>
					<li>Broccoli</li>
					<li>Fish fillet</li>
					
				</ul>
			<li>Dinner</li>
				<ul>
					<li>Grilled chicken</li>
					<li>Spinach salad (olive oil and apple cider vinegar)</li>
					<li>Asparagus</li>
					
				</ul>
		';
	}
	
	else if ( $day  == "Saturday")
	{
		echo'<ul>
				<li>Breakfast</li>
					<ul>
						<li>Green Tea</li>
						<li>Berry and chia pudding</li>
						<li>1 boiled egg</li>
						
					</ul>
				<li>Snack</li>
					<ul>
						<li>Fat free greek yogurt</li>
						<li>Unsalted nuts</li>
						
						
					</ul>
				<li>Lunch</li>
					<ul>
						<li>Pesto chicken pasta</li>
					
						
					</ul>
				<li>Dinner</li>
					<ul>
						<li>Grilled chicken</li>
					
						
					</ul>
			</ul>
				';
	}
	
	else if ( $day  == "Sunday")
	{
		echo'
		<ul>
			<li>Breakfast</li>
				<ul>
					<li>Green Tea</li>
					<li>Cinnamon oatmeal</li>
					<li>1 egg toast</li>
					
				</ul>
			<li>Snack</li>
				<ul>
					
					<li>Berries</li>
					<li>Almonds</li>
					
				</ul>
			<li>Lunch</li>
				<ul>
					<li>Chicken sandwich</li>
					<li>Fish fillet</li>
					
				</ul>
			<li>Dinner</li>
				<ul>
					<li>Red hot chicken pasta</li>
					<li>Lentil salad (lentils with olive oil and apple cider vinegar)</li>
					<li>Asparagus</li>
					
				</ul>
		</ul>
		';
	}
	
	?>
	

	
		
		
	</div>
</body>


</html>
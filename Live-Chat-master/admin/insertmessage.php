<?php 


	session_start();
	$conn=mysqli_connect('localhost','root','','live_chat');
	$name = $_SESSION['agent_user'];
	$agent_id = $_SESSION['agent_id'];	
	$cid =$_SESSION['user']; 
	$agent_message  = $_POST['message'];	

	$sql = "INSERT INTO messages(Agent_ID,Customer_ID,Name,Message,Type) VALUES ('$agent_id','$cid','$name','$agent_message','REPLY')";
	if(!mysqli_query($conn,$sql))
		echo mysqli_error($conn);
 ?>

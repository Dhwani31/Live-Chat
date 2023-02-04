<?php 
		
		session_start();
		$_SESSION['user']=$_POST['user'];
		$conn=mysqli_connect('localhost','root','','live_chat');
		$Cid=$_SESSION['user'];
		$fet = "SELECT Distinct Name from messages  where (Customer_ID='$Cid')and (Type='Query')";
		$result = mysqli_query($conn,$fet);
		while($row = mysqli_fetch_array($result)){
				echo $row['Name'];
		}




 ?>
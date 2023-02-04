<?php 

		$conn=mysqli_connect('localhost','root','','live_chat');
		$fet = "SELECT Distinct messages.Name,messages.Customer_ID,user.Status,messages.Subject
		FROM messages,user where (messages.Type='Query') and (user.User_ID=messages.Customer_ID)";

		$result = mysqli_query($conn,$fet);
		while($row = mysqli_fetch_array($result)){
					echo $row['Customer_ID'].$row['Name'];
				$Cid=$row['Customer_ID']
					echo 	$row['Subject'];
					$sql="select count(Message) from messages where (Customer_ID='127') and (Type='Query') and (Status='1')";

					}
 ?>
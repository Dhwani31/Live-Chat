<?php 

		session_start();
		$_SESSION['user']=$_POST['user'];
		$conn=mysqli_connect('localhost','root','','live_chat');
		$Cid=$_SESSION['user'];
		$fet = "SELECT * from messages  where Customer_ID='$Cid' ORDER BY Date";
		$result = mysqli_query($conn,$fet);
		while($row = mysqli_fetch_array($result)){
		if($row['Type']=='Query')
		{
			echo "<li class='you'>
				<div class='entete'>
					<span class='status green'></span>
					<h2>".$row['Name']."</h2>
					<h3>";
  			$timestamp = strtotime($row['Date']);
			$date = date('d-m-Y', $timestamp);
			$time = date('G:i A', $timestamp);
			$tdate = date('d-m-Y', time());
			if($date==$tdate){
					echo $time;
			}
			else{
				echo $date." ".$time;	
			}
			
			echo "</h3>
					</div>
				<div class='triangle'></div>
				<div class='message'>";

				echo  $row['Message'];
				echo "</div></li>";
			}
			else{
				echo "<li class='me'>
				
				<div class='entete'>
					<span class='status green'></span>
					<h2>".$row['Name']. "</h2>
					<h3>";
  			$timestamp = strtotime($row['Date']);
			$date = date('d-m-Y', $timestamp);
			$time = date('G:i A', $timestamp);
			$tdate = date('d-m-Y', time());
			if($date==$tdate){
					echo $time;
			}
			else{
				echo $date." ".$time;	
			}
			
			echo "</h3>
					</div>
				<div class='triangle'></div>
				<div class='message'>";

				echo  $row['Message'];
				echo "</div></li>";
			}
				

		}
 ?>
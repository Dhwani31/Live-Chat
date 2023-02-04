<!DOCTYPE html>
<html>
<head>
	<title>LIVE CHAT</title>
	<link rel="stylesheet" type="text/css" href="sty.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
</head>

<body>

	<div id='main'>
	<div id='chat_box'>
	
	<div id='chat_data'>
		<?php
		session_start();
		$Cid=$_SESSION['postuser'];
		$conn=mysqli_connect('localhost','root','','live_chat');
		$fet = "SELECT * from messages  where Customer_ID='$Cid' ORDER BY Date";
		$result = mysqli_query($conn,$fet);
		while( $row = mysqli_fetch_array($result)){
		
		echo "<span id='s1'>".$row['Name']."</span>";
		echo "<span id='s2'>".$row['Message']."</span>";
			$timestamp = strtotime($row['Date']);
			$date = date('d-m-Y', $timestamp);
			$time = date('G:i A', $timestamp);
			$tdate = date('d-m-Y', time());
			if($date==$tdate){
			echo "<span id='s3'>".$time."</span>";
			}
			else{
				echo "<span id='s3'>".$date." ".$time."</span>";	
			}
			echo "<br>";
			echo "<hr>";
		}
		?>
		</div>
</div>
</body>
</html>
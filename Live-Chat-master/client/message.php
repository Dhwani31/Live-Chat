<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="gb.css">
</head>
<body>
</body>
</html>
<?php 
	session_start();
		$conn=mysqli_connect('localhost','root','','live_chat');
		$Cid = $_SESSION['present_id'];
		$ptime = $_SESSION['timeout'];
		$fet = "SELECT * from messages  where Customer_ID='$Cid' ORDER BY Date";
		$result = mysqli_query($conn,$fet);
		while($row = mysqli_fetch_array($result)){
			
		if($row['Type']=='Query'){
		
		echo "<div class='msg-send'>";
		//echo "<span id='s1'>".$row['Name']."</span>";
		echo "<div id='msg-send'>".$row['Message']."</span>";
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
			echo "</div>";
			echo "<br><br>";
			echo "</div>";
				

		}
		else{
			echo "<div class='msg-receive'>";
			echo "<div id='msg-receive'><span id='s2' style='color:white'>".$row['Message']."</span>";
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
			echo "</div><br>";
			echo "</div>";
		}
	}
	$inactive = 30; 
	$session_life = time() - $_SESSION['timeout'];

	if($session_life > $inactive)
	{ 
	 $_SESSION['present_id']="";
	 $_SESSION['present_user']=""; 
	 $sql="UPDATE user SET Status = 0 WHERE User_ID = '$Cid'";
	mysqli_query($conn,$sql);
	echo "<span id='sp1' ><img src='red.png' width='150px' height = '150px'></span>"."<br>";
	echo "<span id='sp2'>SORRY You have been Disconnected</span>"."<br>";
	echo "<span id='sp3'><a href='index.html'>Click Me to Start Chatting Again</a></span>";
	echo "<script>$('textarea').hide();
	 		$('#send').hide();
	 </script>";

	}
?>

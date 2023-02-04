<?php 
	session_start();
	$name = $_POST['name'];
	$_SESSION['agent_user']=$name;
	$email = $_POST['email'];
	$conn=mysqli_connect('localhost','root','','live_chat');

//	$result =mysqli_query("SELECT 1 FROM user WHERE `Email` = '$email'");
	$sql="SELECT User_ID FROM user WHERE Email = '$email'";
	$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0)

    		{
    		$row=mysqli_fetch_array($result);
    		$id=$row['User_ID'];
    		$_SESSION['agent_id']=$id;
    		 $sql="UPDATE user SET Status = 1 WHERE User_ID = '$id'";
			mysqli_query($conn,$sql);
			}
    		
		else
    		{
    			echo '0';
    		}
		








 ?>
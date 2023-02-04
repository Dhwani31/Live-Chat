<?php 
	session_start();
	$name = $_POST['name'];
	
	if($_SESSION['present_user'] == $name){
		unset($_SESSION['present_id']);
		unset($_SESSION['present_user']);
	}

	$_SESSION['present_user']=$name;
	$message = $_POST['message'];
	$email = $_POST['email'];
	$sub = $_POST['subb'];

	$conn=mysqli_connect('localhost','root','','live_chat');
	$sql="SELECT User_ID FROM user WHERE Email = '$email'";
	$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0)

    		{
    		$row=mysqli_fetch_array($result);
    		$id=$row['User_ID'];
			$_SESSION['present_id']=$id;
			$sql="insert into messages (Customer_ID,Name,Message,Type,Subject) Values ('$id','$name','$message','Query','$sub')";
			mysqli_query($conn,$sql);
			$sql="UPDATE user SET `Status` = 1 Where User_ID='$id'";
			mysqli_query($conn,$sql);
 			$_SESSION['timeout']=time();
			}
			
    		
		else
    		{
    		$sql="insert into user (Name,Email,Type,Status) Values ('$name','$email','Customer','1')";

			mysqli_query($conn,$sql);
			$sql="SELECT User_ID FROM user WHERE Email = '$email'";
			$result = mysqli_query($conn,$sql);

    		$row=mysqli_fetch_array($result);
    		$id=$row['User_ID'];
    		$_SESSION['present_id']=$id;
			$sql="insert into messages (Customer_ID,Name,Message,Type,Subject) Values ('$id','$name','$message','Query','$sub')";
			mysqli_query($conn,$sql);		
			$_SESSION['timeout']=time();

    		}



	
    		

		

?>
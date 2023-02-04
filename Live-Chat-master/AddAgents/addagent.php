<?php  
$aname=$_POST['aname'];
$amail=$_POST['amail'];
	$conn=mysqli_connect('localhost','root','','live_chat');

	$sql="SELECT User_ID FROM user WHERE Email = '$amail'";
	$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0)
			{
    			echo '0';
    		}

    	else{
				$sql="insert into user (Name,Email,Type,Status) Values ('$aname','$amail','Agent','0')";
				if(mysqli_query($conn,$sql)){
					echo '1';
			
 				}
 			}

    


		


?>
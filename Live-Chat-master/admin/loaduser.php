<script type="text/javascript" src="loaduser.js"></script>

<?php 

		$conn=mysqli_connect('localhost','root','','live_chat');
		$fet = "SELECT Distinct messages.Name,messages.Customer_ID,user.Status,messages.Subject
		FROM messages,user where (messages.Type='Query') and (user.User_ID=messages.Customer_ID) GROUP BY messages.ID DESC";
		$result = mysqli_query($conn,$fet);
		while($row = mysqli_fetch_array($result)){
			if($row['Subject']=='Technical')
					{
						$sub='T';
					}
					else
					{
						$sub='NT';
					}
					echo "		<li id=".$row['Customer_ID'].">
				<img src='client.jpg' alt='' class='user'>
				<div>
					<h2 id='name'>".$row['Name']. "</h2>
					<h3>";
					$_SESSION['userName']=$row['Name'];
					if($row['Status']==1){
					echo 	"<span class='status green'></span>
						online "; 
					echo "</h3>";
				}
				else{
					echo "	<span class='status orange'></span>
						offline
					</h3>";
					}
				echo "</div>
			</li>";
		
		}
		?>
<!DOCTYPE html>
<html>
<head>
	<title>Agent</title>
	<link rel="stylesheet" type="text/css" href="new.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">
		window.addEventListener("beforeunload", function (e) {
	  	 $.post('logout.php',function(response){
                });
	  	});
			doRefresh();
			function doRefresh(){
       		$("#users").load("loaduser.php");
			}
    		$(function() {
        	setInterval(doRefresh, 5000);
    		});
   
</script>
</head>
<body>
<div id="container">
	<aside>
		<header>
			
			<?php  
					session_start();
				if(isset($_SESSION['agent_user']) && !empty($_SESSION['agent_user'])) {
					echo "<span id='agentt'>".$_SESSION['agent_user']."</span>";
				}
				else {
					header('Location:index.php');
				}
	?>
</header>
		<ul id="users">
		<?php 
		$conn=mysqli_connect('localhost','root','','live_chat');
		$fet = "SELECT Distinct messages.Name,messages.Customer_ID,user.Status
		FROM messages,user where (messages.Type='Query') and (messages.Name=user.Name) GROUP BY messages.ID DESC";
		$result = mysqli_query($conn,$fet);
		while($row = mysqli_fetch_array($result)){
						$_SESSION['userName']=$row['Name'];
					
						echo "<li id=".$row['Customer_ID'].">
						<img src='client.jpg' alt='' class='user'>
						<div>
						<h2 id='name'>".$row['Name']. "</h2>
						<h3>";
						$_SESSION['userName']=$row['Name'];
						if($row['Status']==1){
					
						echo 	"<span class='status green'></span>
							online
							</h3>";
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
			
		</ul>
		<form action="logout.php">
				<input type="submit" id='logout' value="Logout">
			</form>
	</aside>
	<main id="userchat">
		<header>
			<div >
				<h2 id="userName"></h2>
			</div>
		</header>
		<ul id="chat">
		</ul>
		<footer>
			<form id="foo">
			<textarea placeholder="Type your message" name="message"></textarea>
			<input type="submit" id="sub" name="submit">
			</form>
		</footer>
	</main>
</div>
<script type="text/javascript" src="newpage.js"></script>
</body>
</html>
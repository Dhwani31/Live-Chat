<html>
<head>
	<title>DISCUSSIONS</title>
	<link rel="stylesheet" type="text/css" href="main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	<div class='centerplease'>
  Discussions
</div>
<br>
<div id='menu'>
	<table border='0' cellspacing="20" cellpadding="0">
		<tr><td><a href='#tech'>Technical</a></td></tr>
		<tr><td><a href='#non'>Non-Technical</a></td></tr>
	</table>
</div>
<div class='content'>
			<h2 id='tech'>Technical</h2>
<?php
$con = mysqli_connect('localhost','root','','live_chat');
if(!$con){
	echo "ERROR-1";
}
		$sql = "select MIN(Date) as Date from messages Group By Customer_ID";
	$row = mysqli_query($con,$sql);
$arr=array();
$i=0;
	while($result = mysqli_fetch_array($row)){

	$arr[$i]=$result['Date'];
	$i++;	
	}

$sql = "SELECT Message,Customer_ID FROM messages WHERE (Date  IN('".implode("','",$arr)."')) AND (Subject='Technical')";
$row = mysqli_query($con,$sql);
	while($result = mysqli_fetch_array($row)){

	echo "<div class='plus'>+</div>
  	<li class='question' id=".$result['Customer_ID'].">";
    echo $result['Message'];
	echo   "</li>";
  }
  echo "</ul>";
	
?>



<h2 id='non'>Non-Technical</h2>
<?php
$con = mysqli_connect('localhost','root','','live_chat');
if(!$con){
	echo "ERROR-1";
}
	$sql = "select MIN(Date) as Date from messages Group By Customer_ID";
	$row = mysqli_query($con,$sql);
$arr=array();
$i=0;
	while($result = mysqli_fetch_array($row)){

	$arr[$i]=$result['Date'];
	$i++;	
	}

$sql = "SELECT Message,Customer_ID FROM messages WHERE (Date  IN('".implode("','",$arr)."')) AND (Subject='NonTechnical')";
$row = mysqli_query($con,$sql);
	while($result = mysqli_fetch_array($row)){

		echo "<div class='plus'>+</div>
  		<li class='question' id=".$result['Customer_ID'].">";
        echo $result['Message'];
		echo   "</li>";
  }
  echo "</ul>";
	
?>

</div>
<div id="chat_data">	</div>
<script src='main.js'></script>
</body>
	</html>
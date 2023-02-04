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

$sql = "SELECT Message FROM messages WHERE (Date  IN('".implode("','",$arr)."')) AND (Subject='NonTechnical')";
$row = mysqli_query($con,$sql);
	while($result = mysqli_fetch_array($row)){
		echo $result['Message'];
		echo "<br>";
}
?>


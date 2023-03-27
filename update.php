<?php 



include 'connect.php';

if(isset($_POST['updateid'])){
	$user_update  = $_POST['updateid'];

	$sql = "SELECT * FROM `crud` where id=$user_update";

	$result = mysqli_query($conn,$sql);

	$response = array();

	while($row=mysqli_fetch_assoc($result)){
		$response=$row;
	}
	echo json_encode($response);
}else{
	$response['status'] = 200;
	$response['message'] = "invalid or data not found";
}


//user update

if(isset($_POST['hiddenData'])){
	$unique_id = $_POST['hiddenData'];

	$name  = $_POST['updatename'];
	$email = $_POST['updateemail'];
	$phone = $_POST['updatephone'];
	$place = $_POST['updateplace'];

	$sql = "update `crud` set name='$name', email='$email', phone='$phone', place='$place' where id=$unique_id ";

	$result = mysqli_query($conn, $sql);
	
}



 ?>
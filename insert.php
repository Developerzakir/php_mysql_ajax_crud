<?php 

include 'connect.php';


extract($_POST);


if(isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['phoneSend'])  &&  isset($_POST['placeSend'])){


	$sql = "INSERT INTO `crud` (name,email,phone,place) VALUES('$nameSend', '$emailSend', '$phoneSend', '$placeSend') ";

	$result = mysqli_query($conn, $sql);
}




 ?>
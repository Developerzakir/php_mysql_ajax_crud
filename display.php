<?php 


include "connect.php";

if(isset($_POST['displaySend'])){
	$table = '<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Place</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>';

  $sql = "SELECT * FROM `crud` ";

  $result = mysqli_query($conn,$sql);

  $number =1;

  while($row=mysqli_fetch_assoc($result)){
  	$id = $row['id'];
  	$name = $row['name'];
  	$email = $row['email'];
  	$phone = $row['phone'];
  	$place = $row['place'];

  	$table.='<tr>
      <td scope="row">'.$number.'</td>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$phone.'</td>
      <td>'.$place.'</td>
      <td>
		 <button class="btn btn-primary" onclick="updateUser('.$id.')">Update</button>
		 <button class="btn btn-danger" onclick="deleteUser('.$id.')">Delete</button>
      </td>
    </tr>';
    $number++;
  }

  $table.= '</table>';
  echo $table;

}




 ?>

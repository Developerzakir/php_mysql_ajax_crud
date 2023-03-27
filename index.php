<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP MYSQL AJAX CRUD</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	



<!-- insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	  <div class="form-group">
			    <label for="name">Name:</label>
			    <input type="text" class="form-control" id="name"  placeholder="Enter name"> 
			  </div>

			   <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" id="email"  placeholder="Enter email"> 
			  </div>

			   <div class="form-group">
			    <label for="phone">Phone</label>
			    <input type="text" class="form-control" id="phone"  placeholder="Enter phone"> 
			  </div>


			  <div class="form-group">
			    <label for="place">Place</label>
			    <input type="text" class="form-control" id="place"  placeholder="Enter place"> 
			  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addUser()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	  <div class="form-group">
			    <label for="updatename">Name:</label>
			    <input type="text" class="form-control" id="updatename"  placeholder="Enter name"> 
			  </div>

			   <div class="form-group">
			    <label for="updateemail">Email address</label>
			    <input type="email" class="form-control" id="updateemail"  placeholder="Enter email"> 
			  </div>

			   <div class="form-group">
			    <label for="updatephone">Phone</label>
			    <input type="text" class="form-control" id="updatephone"  placeholder="Enter phone"> 
			  </div>


			  <div class="form-group">
			    <label for="updateplace">Place</label>
			    <input type="text" class="form-control" id="updateplace"  placeholder="Enter place"> 
			  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateDetails()">Update User</button>
        <input type="hidden" id="hiddenData">
      </div>
    </div>
  </div>
</div>

	<div class="container my-3">
		<h1 class="text-center">PHP MYSQL AJAX CRUD</h1>
			<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Add new users
		</button>
		<div id="displayDataTable">
			
		</div>
	</div>



<!-- 
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

	$(document).ready(function(){
		displayData();
	});

	//display data
	function displayData(){
		var displayData = "true";

		$.ajax({
			url:"display.php",
			type: "POST",
			data:{
				displaySend: displayData

			},
			success:function(data,status){
				$('#displayDataTable').html(data)

			}

		});
	}

	function addUser(){
		
		var nameAdd  = $('#name').val();
		var emailAdd = $('#email').val();
		var phoneAdd = $('#phone').val();
		var placeAdd = $('#place').val();


		$.ajax({
			url:"insert.php",
			type:"POST",
			data:{
				nameSend:nameAdd,
				emailSend:emailAdd,
				phoneSend:phoneAdd,
				placeSend:placeAdd,
			},

			success: function(data, status){
				//function to display data
				// console.log(status);
				
				displayData();
				$('#exampleModal').modal('hide');

			}
		});
	}

	//delete records

	function deleteUser(id){

		$.ajax({
			url: 'delete.php',
			type: 'POST',
			data:{
				deleteSend:id
			},

			success:function(data, status){
				displayData();
			}
		});

	}

	//edit user

	function updateUser(updateid){

		$('#hiddenData').val(updateid);

		$.post("update.php",{updateid:updateid},function(data,status){
			var userid = JSON.parse(data);

			$('#updatename').val(userid.name);
			$('#updateemail').val(userid.email);
			$('#updatephone').val(userid.phone);
			$('#updateplace').val(userid.place);

		});

	    $('#updateModal').modal('show');
	}

	//update user
	function updateDetails(){

		var updatename  = $("#updatename").val();
		var updateemail = $("#updateemail").val();
		var updatephone = $("#updatephone").val();
		var updateplace = $("#updateplace").val();

		var hiddenData  =  $('#hiddenData').val();

		$.post("update.php", {
			updatename:updatename,
			updateemail:updateemail,
			updatephone:updatephone,
			updateplace:updateplace,
			hiddenData:hiddenData

		}, function(data,status){
			$('#updateModal').modal('hide');
			displayData();

		});

	}
</script>
</body>
</html>
<?php
	session_start();
	$page_title="Welcome to DashBoard";
	include_once '../../db/DB.php';
	include_once '../../db/Query.php';
	$conn=DB::getConnection();

    if(!isset($_SESSION['user_id']))
    {
        $_SESSION['error_message']="You Have to log In first";
        header("Location: ../index.php");
    }
    $query_obj=new Query($conn);

    $rows=$query_obj->overtime_claim_data_for_admin();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <?php include '../../partials/css_files.php' ?>
    <title>Welcome to Online Claim Website | Nilai University</title>
    <style>
    *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    .bodybg{
        width: 100%;
        height: 100vh;
        background-color: #fcfcfc;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }
    .navbar{
        width: 85%;
        height: 15%;
        margin: auto;
        display: flex;
        align-items:center;
        justify-content:flex-end;
    }
    button{
        background-color: #f4511e;
        border: 2px solid #ffffff;
        border-radius: none;
        color: #fcfcfc;
        padding: 10px 25px;
        font-size: 16px;
        outline: none;
        opacity: 0.6;
        transition: 0.5s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }
    .button:hover {opacity: 1}


  </style>
</head>
<body>
    <div class="bodybg">
      <div class="navbar">
         <a href="../../index.php"> <button type="button" class="button">Home</button></a>
<!--           <button type="button" class="button">Dashboard</button>
          <button type="button" class="button">Profile</button>
          <button type="button" class="button">Logout</button> -->
      </div>

    <div class="row">
    	<div class="col">
        <h2 style="background-color:rgb(87, 205, 221); padding: 15px;"><b>Profile Dashboard</b></h2><br>
    	</div>
	</div>

	<div class="container">
             <table class="table table-striped">

                <thead>
                    <tr class="">
                        <th rowspan="2"  >Name</th>
                        <th rowspan="2" >Faculty of</th>
                        <th rowspan="2" >Emp no</th>
                        <th rowspan="2" >Department</th>
                        <th rowspan="2" >Position</th>
                        <th rowspan="2" >Semester</th>
                        <th rowspan="2" >Claimed By</th>
                        <th rowspan="2" >Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                	foreach($rows as $row)
                	{

                ?>
                <tr class="">
                  <td ><?php echo $row['name']; ?></td>
                  <td ><?php echo $row['faculty_of']; ?></td>
                  <td ><?php echo $row['emp_no']; ?></td>
                  <td ><?php echo $row['dept_name']; ?></td>
                  <td ><?php echo $row['position']; ?></td>
                  <td ><?php echo $row['semester']; ?></td>
                  <td><?php  $res=$query_obj->find_user($row['added_by']); echo $res['username']; ?></td> 
			      <td>
			      	<div class="row">
			      		<div class="col-md-6">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
							  		Delete
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel"> Confirm Action</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								       	Are You sure to Delete
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <form method="POST" action="">
				  
				 							<a href="../student/<?php echo 'delete_overtime_data.php?id='.$row["id"] ?>">
									 		<button type="button" class="btn btn-danger">Yes</button>
									 		</a>
								 		</form>
								      </div>
								    </div>
								  </div>
								</div>
			      		</div>
<!-- 			      		<div class="col-md-6">
			      			<a><button class="btn btn-sm btn-info">Details</button></a>
			      		</div> -->
			      	</div>
			      </td>
	    
                </tr>

                <?php
                	}
                ?>
                </tbody>
            </table>	
	</div>
	 <?php include '../../partials/js_files.php' ?>
</body>
</html>
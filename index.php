<?php
	
	$page_title="Welcome to Homepage";
	include_once 'db/DB.php';
	$conn=DB::getConnection();
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'partials/css_files.php' ?>
    <title>Online Claim Form Website | Nilai University</title>
    
<link rel="stylesheet" href="assets/index.css" crossorigin="anonymous">

</head>
<body>
     
    <div class="bodybg">
         <div class="navbar">
             <button type="button" class="button"><a href="pages/sign_up.php">Sign up</a></button>
             <button type="button" class="button"><a href="login.php">Login</a></button>

         </div>
         <div class="content">
             <small>Welcome to Nilai University</small>
             <h1>Online Claim Portal</h1>
             <button type="button" class="button"><b><a href="login.php">Login</a></b></button>
         </div>
    </div>
    
    <?php include 'partials/js_files.php' ?>
</body>
</html>

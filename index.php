<?php
	session_start();
	$page_title="Welcome to Homepage";
	include_once 'db/DB.php';
	$conn=DB::getConnection();

    if( isset($_SESSION['user_id']) ){

        $records = $conn->prepare('SELECT id,username FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = NULL;

        if( count($results) > 0){
            $user = $results;
        }

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to Online Claim Website | Nilai University</title>
    <?php include 'partials/css_files.php' ?>
    <link rel="stylesheet" href="assets/index.css" crossorigin="anonymous">
</head>
<body>
    <div class="bodybg">

        <div class="container">
            <div class="row">

                    <?php
                        if(isset($_SESSION['success_message']))
                        {
                           // echo "ok done";
                    ?>
                        <div class="col-md-6 offset-md-3">
                            <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION['success_message']; ?>
                            </div>
                        </div>
                    <?php
                            unset($_SESSION['success_message']);
                        }
                    ?>


            </div>
        </div>

      <div class="navbar">

            <?php if( !empty($user) ): ?>

                <button type="button" class="button"><a href=""> <?= $user['username']; ?> </a></button>
                <button type="button" class="button"><a href="pages/logout.php">Logout ?</a></button>

            <?php else: ?>

             <button type="button" class="button"><a href="pages/sign_up.php">Sign up</a></button>
             <button type="button" class="button"><a href="pages/login.php">Login</a></button>

            <?php endif; ?>
      </div>

      <div class="bodybox">
          <h1>Choose Your Option</h1>
          <a href="pages/part_time_teaching.php"><btn class="btn btn1">Part-Time Teaching Form</btn></a>
          <a href="pages/overtime_teaching.php"><btn class="btn btn1">Over-Time Teaching Form</btn></a>
          <a href="pages/expense_claim_form.php"><btn class="btn btn1">Expense Claim Form</btn></a>
          <a href="pages/question_paper_form.php"><btn class="btn btn1">Questions Paper From</btn></a>
      </div> 
    </div>
</body>
</html>
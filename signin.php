<?php

  session_start();

  require 'functions.php';

  if (isset($_SESSION["signin"])) {
    header("Location:index.php");
  }
  if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM account WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      if ($password == $row["Password"]) {
        $_SESSION["signin"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("location:index.php");
        exit;
      }
    }
    $error = true;
  }
 ?>

<html>

<head>
    <title>Kohiso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' type="text/css" href="asset/style/style.css">
</head>

<body>
    <div class="head-container">
        <div class="container-img">
            <img src="asset/img/head.png">
        </div>
        <div class='container-main'>
            <?php include "navbar.php" ?>
            <div class="head-title">
                <h1>SIGN IN</h1>
            </div>

        </div>
    </div>

    <div class="egift-container">


        <div class="container">

            <form class="egift text-center" method="post">
            	<div class="row">
            		<div class="col-3"> </div>
	                <div class="col-6">
	                	<br>
	                    <label for="username">USERNAME</label>
	                    <input class="form-control" name="username" required>
	                    <br>
	                    <label for="password">PASSWORD</label>
	                    <input type="password" class="form-control" name="password" required>
	                </div>
	                <div class="col-3"> </div>
            	</div>
            	<br>
                <button class="btn kohiso-btn egi-btn w-25" type="submit" name="submit">SIGN IN</button>
            </form>

            <?php if (isset($error)): ?>
              <p style="color:red" class="text-center">Your username and password not valid</p>
            <?php endif; ?>

        </div>

    </div>

    <?php
        require "footer.php";
    ?>

    <script src="asset/script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

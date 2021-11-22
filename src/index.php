<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

// database name
$mydatabase = 'MYSQL_DATABASE';
// check the mysql connection status

$conn = new mysqli($host, $user, $pass, $mydatabase);

// select query
$sql = 'SELECT * FROM users';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($conn,$_POST['name']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['pass']); 

    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($result);

    if($count == 1) {
        header("Location: welcome.php", false);
    }else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }


}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Form Validation using Javascript</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="wrapper">
    <div class="form">
      <div class="title">
        Login
      </div>
      <form method="post" action="">
        <div class="input_wrap">
          <label for="input_text">Username</label>
          <div class="input_field">
            <input type="text" name="name" class="input" id="input_text">
          </div>
        </div>
        <div class="input_wrap">
          <label for="input_password">Password</label>
          <div class="input_field">
            <input type="password" name="pass" class="input" id="input_password">
          </div>
        </div>
        <div class="input_wrap">
          <span class="error_msg">Incorrect username or password. Please try again</span>
          <input class=but_log type="submit" name="Login" value="Login">
        </div>
      </form>
    </div>
  </div>
  <!-- <script>
  function auth(event) {
    event.preventDefault();

    var username = document.getElementById("input_text").value;
    var password = document.getElementById("input_password").value;
    var error_msg = document.querySelector(".error_msg");

    if (username === "admin" && password === "user") {
      window.location.replace("successpage.html");
    } else {
      error_msg.style.display = "inline-block";
      return;
    }
  }
  </script> -->
</body>

</html>

<!-- <html>
<body>

<form action="" method="post">
Username: <input type="text" name="name"><br>
Password: <input type="text" name="pass"><br>
<input type="submit" name="login" value="login">
</form>

</body>
</html> -->
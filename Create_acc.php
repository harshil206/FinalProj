<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="Create_acc.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <style type="text/css">
    #padd{
      padding: 0px;
      float: right;
    }
    body{
      background-image: url("5.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
    }
    </style>
  </head>

  <body>
    <script type="text/javascript">
      function fun()
      {
          window.open("prototype.html");
      }
      function change()
      {
        var a=document.getElementById("color");
        var b=document.getElementById("change");
        if(a.value.length>8)
        {
          b.style.color="red";
        }
      }
    </script>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_user.php" class="active">Users</a></li>
      <li><a href="Create_acc.php"  class="home">Create account for user</a></li>
      <li><a href="Assigned.php">Assigned Book to user</a></li>
      <li><a href="Delete_acc.php">Delete user account</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div class="main">
      <div class="heading">
          <h1>Create Users Account!</h1>
      </div>
      <div class="form">
        <form  action="" method="post">
          Full-Name:<br><br><input class="edit" type="text" name="Name" placeholder="Enter name" required><br><br>
          Phone Number:<br><br><input class="edit" type="text" name="Number" placeholder="enter valid number" required><br><br>
          Birth Date:<br><br><input class="edit" type="date" name="Bith" placeholder="birthdate" required><br><br>
          Email:<br><br><input class="edit" type="email" name="Email" placeholder="email" required><br><br>
          Set Username:<br><br><input class="edit" type="text" name="username" placeholder="enter username" required><br><br>
          Set password:<br><br><input class="edit" id="color" type="password" name="Password" placeholder="enter Password"  oninput="change()" required><p id="change">Length of Password must be 8</p>
          <input class="button" type="submit" name="create" value="Create Account">     <input class="button" type="reset" name="" value="Reset">
        </form>
      </div>
    </div>
  </body>
</html>


<?php
  session_start();
  if(isset($_REQUEST["create"]))
  {
    $con=new mysqli("localhost","root","Harshil479","library_project");
    if($con)
    {
      echo "string";
    }
    $name=$_POST["Name"];
    $number=$_POST["Number"];
    $Date=$_POST["Bith"];
    $email=$_POST["Email"];
    $username=$_POST["username"];
    $pass=$_POST["Password"];
    echo "$name";
    $query="INSERT INTO `user_table` (`Username`, `Password`,`Name`, `Phone_number`, `Birth_date`, `Email`) VALUES  ('$username', '$pass','$name', '$number', '$Date', '$email')";
    $ins=mysqli_query($con,$query);
    if($ins)
    {
      echo "<script>
            alert('Account is created');
            </script>";
    }
  }
  if(isset($_REQUEST["logout"]))
  {
    session_unset();
    session_destroy();
    echo "<script>
           location.href='admin.html';
           </script>";
  }
?>

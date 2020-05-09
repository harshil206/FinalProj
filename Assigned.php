<?php
  session_start();

  if(isset($_REQUEST["logout"]))
  {
    session_unset();
    session_destroy();
    echo "<script>
           location.href='admin.html';
           </script>";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Assigned Book</title>
  <style type="text/css">
    body{
      background-image: url("5.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
    }
    ul{
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: black;
      position: sticky;
      opacity: 0.8;
    }
    li
    {
      float: left;
    }
    li a
    {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    #button{
      border: none;
      background-color: inherit;
      color: white;
      padding-top: 2%;
      cursor: pointer;
    }
    #padd{
      float: right;
    }
    .home{
      background-color: white;
      color: black;
    }
    #button:hover{
      background-color: white;
      color: black;
    }
    li a:hover
    {
      background-color: white;
      color: black;
    }
    .heading{
      /* background-color: grey; */
      color: #161162;
      text-align: center;
      height: 100px;
      left: 30px;
      margin-top: 2%;
      margin-bottom: 20%;
    }
    .form{
      text-align: center;
      margin-top: 8%;
      padding-top: 2%;
      margin-left: 50px;
      margin-right: 50px;
      padding-top: 15px;
      padding-right: 50px;
      padding-left: 50px;
      font-size: 18px;
      opacity: 0.8;
      filter: alpha(opacity=60);
      background-color: black;
      width:320px;
      top: 10%;
      left: 30%;
      position: absolute;
      color:white;
    }
    .edit{
      border: none;
      border-bottom: 1px solid white;
      background: transparent;
      outline: none;
    }
    .button{
      margin-top: 1%;
      background-color: #08088A;
      cursor: pointer;
      border:none;
      color: WHITE;
      width: 100px;
      height: 30px;
      margin-bottom: 2%;
    }

    ::placeholder{
       color: white;
       opacity: 0.3;
     }

     input[type=text]
     {
       color: white;
     }

  </style>
  </head>
  <body>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_user.php" class="active">Users</a></li>
      <li><a href="Create_acc.php">Create account for user</a></li>
      <li><a href="Assigned.php" class="home">Assigned Book to user</a></li>
      <li><a href="Delete_acc.php">Delete user account</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div class="main">
      <div class="heading">
          <p>A user can issue one book at a time..</p>
          <h1>Assigned Book to User</h1>
      </div>
      <div class="form">
        <form class="tab" action="" method="post">
          Username:<br><br><input class="edit" type="text" name="Name" placeholder="Enter name" required><br><br>
          Book_id:<br><br><input class="edit" type="text" name="id" placeholder="enter valid number" required><br><br>
          <input class="button" type="submit" name="assign" value="Assign Book">     <input class="button" type="reset" name="" value="Reset">
        </form>
      </div>
    </div>
  </body>
</html>


<?php
  if(isset($_REQUEST["assign"]))
  {
    $name=$_POST["Name"];
    $id=$_POST["id"];
    $con=new mysqli("localhost","root","Harshil479","library_project");
    $sql="SELECT * FROM books where `id`='$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      $row=mysqli_fetch_row($result);
      // echo "$row[5]";
      $quan=$row[5]-1;
      // echo "$quan";
      $sql1="UPDATE `books` SET `quantity` = '$quan' WHERE `books`.`id` = '$id'";
      mysqli_query($con,$sql1);
    }
    else
    {
      echo "<script>
            alert('Book is not available');
            </script>";
    }

    $sql2="UPDATE `user_table` SET `Assigned_Book_id` = '$id' WHERE `user_table`.`username` = '$name'";
    $result1=mysqli_query($con,$sql2);
    if($result1)
    {
      echo "<script>
            alert('Book is Assigned');
            </script>";
    }
    else
    {
      echo "<script>
            alert('Username is not available');
            </script>";
    }
  }
?>

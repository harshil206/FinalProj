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
    <title>Delete User's data </title>
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
      padding-left: 700px;
    }
    .heading{
      /* background-color: grey; */
      color: #161162;
      text-align: center;
      height: 100px;
      left: 30px;
      margin-top: 4%;
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

      body{
        /* background-image: url("3.jpg"); */
      }
      ul{
        font-size: 16px;
      }
      h2{
        margin-top: 20%;
        text-align: center;
        color: white;
        font-style: italic;
      }
      #padd{
        padding: 0px;
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

    </style>
  </head>
  <body>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_user.php" class="active">Users</a></li>
      <li><a href="Create_acc.php">Create account for user</a></li>
      <li><a href="Assigned.php">Assigned Book to user</a></li>
      <li><a href="Delete_acc.php" class="home">Delete user account</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div class="heading">
      <header>
        <h1>Delete Account</h1>
      </header>
    </div>
    <div class="form">
      <form class="" action="" method="post" name="insert">
        User_name <br><br><input class="edit" type="text" name="userid" placeholder="Enter user name"><br><br>
        Name <br><br><input  class="edit" type="text" name="name" placeholder="Enter name"><br><br>
        Password<br><br><input  class="edit" type="password" name="pass" placeholder="Enter Password"><br><br>
        <input  class="button" type="submit" name="delete" value="Delete">
      </form>
    </div>
  </body>
</html>


<?php
  if(isset($_REQUEST["delete"]))
  {
    $con=new mysqli("localhost","root","Harshil479","library_project");
    $uname=$_POST["userid"];
    $pass=$_POST["pass"];
    $sql="SELECT * FROM `user_table` WHERE username='$uname'";
    if($result=mysqli_query($con,$sql))
    {
      while($row=mysqli_fetch_row($result))
      {
        if($pass==$row[1])
        {
          $sql1="DELETE FROM `user_table` WHERE `user_table`.`username` = '$uname'";
          $del=mysqli_query($con,$sql1);
          if($del)
          {
            echo "<script>
                  alert('Data is Deleted from Record');
                  </script>";
          }
        }
      }
    }
  }
 ?>

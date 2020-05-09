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
    <title>List of User</title>
    <style type="text/css">
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
      left: 25px;
      margin-top: 0.5%;
      margin-bottom: 5%;
      padding-top: 2%;
      margin-left: 40%;
      margin-right: 35%;
    }
    ::placeholder{
       color: black;
       opacity: 0.3;
     }

      body{
        background-image: url("5.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
      }
      ul{
        font-size: 16px;
      }
      h2{
        text-align: center;
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
      .tab
      {
        border-collapse: collapse;
      }
      .t1{
        text-align: center;
      }
      tr{
        text-align: center;
      }
      td,th{
        margin: 2%;
        padding: 1%;
        width: 200px;
        height: 30px;
      }
      input[type=text]
      {

        border:0px;
        border-bottom: 1px solid black;
      }
    </style>
  </head>
  <body>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_user.php" class="home" class="active">Users</a></li>
      <li><a href="Create_acc.php">Create account for user</a></li>
      <li><a href="Assigned.php">Assigned Book to user</a></li>
      <li><a href="Delete_acc.php">Delete user account</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div class="heading">
      <header>
        <h2>Search User's from List</h2>
      </header>
      <form class="form1" action="" method="post">
        <input type="text" name="search" placeholder="Enter username...">
        <input type="submit" name="search1" value="Search">
      </form>
    </div>
  </body>
</html>

<?php
if(isset($_REQUEST["search1"]))
{
  echo "<h3 class='t1'>Searched Account </h3>";
  echo "<table border='1' align='center' class='tab'>";
  echo "<tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Birthdate</th>
        <th>Phone-number</th>
        <th>Assigned Book id</th>
        </tr>";
  $id=$_POST["search"];
  $con=new mysqli("localhost","root","Harshil479","library_project");
  $sql="select * from user_table where username='$id'";
  if($result=mysqli_query($con,$sql))
  {
    while($row=mysqli_fetch_row($result))
    {
      echo "<tr>
            <td>$row[0]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>$row[6]</td>
            </tr>";
    }
  }
  echo "</table>";
}
else
{
  echo "<h3 class='t1'>List of Available Books in Record</h3>";
  $con=new mysqli("localhost","root","Harshil479","library_project");
  $sql="select * from user_table";
  echo "<table border='1' align='center' class='tab'>";
  echo "<tr>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Birthdate</th>
          <th>Phone-number</th>
          <th>Assigned Book id</th>
        </tr>";
  if($result=mysqli_query($con,$sql))
  {
      while($row=mysqli_fetch_row($result))
      {
        echo "<tr>
              <td>$row[0]</td>
              <td>$row[2]</td>
              <td>$row[3]</td>
              <td>$row[4]</td>
              <td>$row[5]</td>
              <td>$row[6]</td>
              </tr>";
      }
  }
  echo "</table>";
}
?>

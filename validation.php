<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
  </head>
  <body>
    <style type="text/css">
    ul{
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: grey;
      position: sticky;
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
    li a:hover
    {
      background-color: red;
    }
    .home{
      background-color: red;
    }
    </style>
    <ul>
      <li><a href="prototype.html" class="home">Home</a></li>
      <li><a href="#bookavailable" class="active">List Of Books</a></li>
      <li><a href="#transferbook">Transfer Book</a></li>
      <li><a href="#pay">Pay Fees</a></li>
      <li><a href="signup.html"class="not">Don't have account!!!</a></li>
    </ul>
  </body>
</html>
<?php
  $flag=0;
  $username=$_POST["user"];
  $pass=$_POST["password"];
  $con=new mysqli("localhost","root","Harshil479","library_project");
  $sql="select * from user_table";
  if($result=mysqli_query($con,$sql))
  {
    while($row=mysqli_fetch_row($result))
    {
      if(($username==$row[0]) &&($pass==$row[1]))
      {
        $flag=1;
        break;
      }
      else
      {
        $falg=0;
      }
    }
    if($flag==1)
    {
      echo "<h3>Email and Password is Correct...</h3>";
        // echo "<h1>Hello $row[3]</h1><br>
        //        <h4>you are logined!!!!!</h4>";
    }
    else
    {
      echo "<h3>Check your email or password...</h3>";
    }
    mysqli_free_result($result);
    mysqli_close($con);
  }
?>

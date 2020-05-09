<?php
 session_start();
   if(isset($_REQUEST["logout"]))
   {
     session_unset();
     session_destroy();
     echo "<script>
            location.href='prototype.html';
            </script>";
   }
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
       body{
         background-color: #C0C0C0	;
       }
      table{
        margin-top: 90px;
        border-radius: 10%;
        background-color: darkgrey;
      }
      tr,td{
        padding-right:1%;
        text-align: center;
      }
      td:hover{
        background-color: white;
        text-decoration: none;
      }
      a{
        color:black ;
      }
      #contact{
        margin-top: 100px;
      }
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
        color: white;
        text-decoration: none;
        background-color: red;
      }
      .home{
        background-color: red;
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
    </style>
  </head>
  <body class="container">
    <ul>
      <li><a href="admin.php" class="home">Home</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <?php echo "<h1 align=center>Hello "; echo  $_SESSION['name']; echo " !</h1>"; ?>
    <h3 class="container"><p class="page-header"><br>You can handle book database and users database..<br> From below links.</p></h3>
    <table align="center" class="jumbotron">
    <tr>
      <td id="one"><h3><a href="Search_book.php">Manage Books</a></h3></td>
      <td><h3><a href="Search_user.php">Manage Users</a></h3></td>
    </tr>
  </table>
</body>
</html>

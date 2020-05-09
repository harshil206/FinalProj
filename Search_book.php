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
    <title>List of Books</title>
    <link rel="stylesheet" href="Search_book.css">
    <style type="text/css">
      body{
        background-image: url("1.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
      }
      .tab
      {
        border-collapse: collapse;
      }
      .t1{
        margin-top: 1%;
        text-align: center;
      }
      tr{
        text-align: center;
      }
      td,th{
        margin: 2%;
        padding: 1%;
        width: 150px;
        height: 30px;
      }
      #padd{
        padding: 00px;
        float: right;
      }
      </style>
  </head>
  <body>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_book.php" class="home">Find a Book</a></li>
      <li><a href="Update_book.php">Update Book's record</a></li>
      <li><a href="Insert_book.php" >Add Book in record</a></li>
      <li><a href="Delete_book.php">Delete book from record</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div class="heading">
      <header>
        <h2>Search a Book from Record..</h2>
      </header>
      <form class="" action="" method="post">
        <input type="text" name="search" placeholder="Enter a Book Id...">
        <input type="submit" name="search1" value="Search">
      </form>
    </div>
  </body>
</html>


<?php
  if(isset($_REQUEST["search1"]))
  {
    echo "<h3 class='t1'>Searched Book</h3>";
    echo "<table border='1' align='center' class='tab'>";
    echo "<tr>
          <th>Book Id</th>
          <th>Book Name</th>
          <th>Author Name</th>
          <th>Publisher</th>
          <th>Cost</th>
          <th>Quantity</th>
          </tr>";
    $id=$_POST["search"];
    // $name=$_POST["bookname"];
    // $Aname=$_POST["authorname"];
    // $price=$_POST["price"];
    $con=new mysqli("localhost","root","Harshil479","library_project");
    $sql="select * from books where id='$id'";
    if($result=mysqli_query($con,$sql))
    {
      while($row=mysqli_fetch_row($result))
      {
        echo "<tr>
              <td>$row[0]</td>
              <td>$row[1]</td>
              <td>$row[2]</td>
              <td>$row[3]</td>
              <td>$row[4]</td>
              <td>$row[5]</td>
              </tr>";
      }
    }
    echo "</table>";
  }
  else
  {
    echo "<h3 class='t1'>List of Available Books in Record</h3>";
    $con=new mysqli("localhost","root","Harshil479","library_project");
    $sql="select * from books";
    echo "<table border='1' align='center' class='tab'>";
    echo "<tr>
          <th>Book Id</th>
          <th>Book Name</th>
          <th>Author Name</th>
          <th>Publisher</th>
          <th>Cost</th>
          <th>Quantity</th>
          </tr>";
    if($result=mysqli_query($con,$sql))
    {
        while($row=mysqli_fetch_row($result))
        {
          echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
                </tr>";
        }
    }
    echo "</table>";
  }
?>

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
    <title>Delete record</title>
    <link rel="stylesheet" href="Delete_book.css">
    <style type="text/css">
    body{
      background-image: url("1.jpg");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 100vh;
    }
    #padd{
      padding: 0px;
      float: right;
    }
  </style>
  </head>
  <body>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_book.php" class="active">Find a Book</a></li>
      <li><a href="Update_book.php" >Update Book's record</a></li>
      <li><a href="Insert_book.php">Add Book in record</a></li>
      <li><a href="Delete_book.php" class="home">Delete book from record</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div class="heading">
        <h1>Remove Book from Records</h1>
    </div>
    <div class="form">
      <form class="" action="" method="post" name="insert">
        Book_id <br><br><input class="edit" type="text" name="bookid" placeholder="Enter book id"><br><br>
        Book_name <br><br><input  class="edit" type="text" name="bookname" placeholder="Enter book name"><br><br>
        Author_name <br><br><input  class="edit" type="text" name="authorname" placeholder="Enter Author name"><br><br>
        Price <br><br><input  class="edit" type="text" name="price" placeholder="Enter price"><br><br>
        <input  class="button" type="submit" name="delete" value="Delete">
      </form>
    </div>
  </body>
</html>


<?php
if(isset($_REQUEST["delete"]))
{
  $id=$_POST["bookid"];
  $name=$_POST["bookname"];
  $Aname=$_POST["authorname"];
  $price=$_POST["price"];
  $con=new mysqli("localhost","root","Harshil479","library_project");
  $sql="DELETE FROM `books` WHERE `id` = '$id'";
  $ins=mysqli_query($con,$sql);
  if($ins)
  {
    echo "<script>
          alert('Data is Deleted from Record');
          </script>";
  }
}
?>

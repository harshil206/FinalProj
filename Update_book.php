<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update record of books</title>
    <link rel="stylesheet" href="Update_book.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
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
      .form{
        margin-right: 55px;
      }
    </style>
  </head>
  <body>
    <ul>
      <li><a href="Home.php">Home</a></li>
      <li><a href="Search_book.php" class="active">Find a Book</a></li>
      <li><a href="Update_book.php" class="home">Update Book's record</a></li>
      <li><a href="Insert_book.php" >Add Book in record</a></li>
      <li><a href="Delete_book.php">Delete book from record</a></li>
      <li id="padd">  <form class="" action="" method="post">
          <a href=""><input id="button" type="submit" name="logout" value="Logout"></a>
        </form></li>
    </ul>
    <div>
      <div class="heading">
        <header>
          <h1>Update Records</h1>
        </header>
      </div>
      <div class="form">
        <form class="" action="" method="post">
          Book_id <br><br><input class="edit" type="text" name="bookid" placeholder="Enter book id"><br><br>
          Book_name <br><br><input  class="edit" type="text" name="bookname" placeholder="Enter book name"><br><br>
          Author_name <br><br><input  class="edit" type="text" name="authorname" placeholder="Enter Author name"><br><br>
          Publisher <br><br><input  class="edit" type="text" name="pubname" placeholder="Enter Publisher name"><br><br>
          Quantity <br><br><input  class="edit" type="text" name="quan" placeholder="Enter Quantity"><br><br>
          Price <br><br><input  class="edit" type="text" name="price" placeholder="Enter price"><br><br>
          <input  class="button" type="submit" name="update" value="Update">
        </div>
        </form>
    </div>
  </body>
</html>

<?php
  if(isset($_REQUEST["update"]))
  {
    $id=$_POST["bookid"];
    $name=$_POST["bookname"];
    $Aname=$_POST["authorname"];
    $pub=$_POST["pubname"];
    $quan=$_POST["quan"];
    $price=$_POST["price"];
    $con=new mysqli("localhost","root","Harshil479","library_project");
    $sql="UPDATE `books` SET `name` = '$name',`author`='$Aname',`publisher`='$pub',`cost`='$price',`quantity`='$quan' WHERE `books`.`id` = '$id'";
    $ins=mysqli_query($con,$sql);
    if($ins)
    {
      echo "<script>
            alert('Data is Updated in Record');
            </script>";
    }
  }
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

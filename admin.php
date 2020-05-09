<?php
  session_start();
  if(isset($_REQUEST["Login"]))
  {
    $user=$_POST["user"];
    $pass=$_POST["password"];
    $flag=0;
    $con=new mysqli("localhost","root","Harshil479","library_project");
    $query="select * from admin";
    if($sql=mysqli_query($con,$query))
    {
      while($result=mysqli_fetch_row($sql))
      {
        if($user==$result[1] && $pass==$result[2])
        {
          $flag=1;
          break;
        }
        else {
          $falg=0;
        }
      }
      $_SESSION['name']=$result[0];
      // echo $_SESSION['name'];
      if($flag===1)
      {
        echo "<script type=text/javascript>
         location.href='Home.php';
          </script>";
      }
      else {
        echo "<script>
        alert('Incorrect Password or User_ID');
        location.href='admin.html';
        </script>";
      }
    }
  }
?>


 

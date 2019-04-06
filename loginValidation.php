<?php 
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['uname'];
    $password=$_POST['upass'];
    $conn=mysqli_connect('localhost','root','emophheg','codeavenue');
    if(!$conn){
        die('Connection Failed: '.mysqli_connect_error);
    }else{
        $sql_query = "SELECT * FROM `registration` WHERE `userid` = '$username'";
        $result = $conn->query($sql_query);
        if($result->num_rows > 0){
        while($rows=$result->fetch_assoc()){
          $hash=$rows['passwordhash'];
          if(password_verify($password,$hash)){
              $conn->close();
              
              $_SESSION['uname']=$username;
              $_SESSION['utype']=$rows['usertype'];
              $_SESSION['fname']=$rows['fullname'];
              $_SESSION['regno']=$rows['regno'];
              $_SESSION['emailid']=$rows['emailid'];
              $_SESSION['sem']=$rows['semester'];

              echo '<h1 style="margin-left:40%; margin-top:20% ">Login Successful!</h1>';
              if($rows['usertype']=='teacher'){
              echo '<script type="text/javascript">setTimeout(function(){window.location.href="teacher_main.php"},3000) </script>';
              }else{
                echo '<script type="text/javascript">setTimeout(function(){window.location.href="studentpremain.php"},3000) </script>';
              }
              break;
          }else{
            $conn->close();
            echo '<h1 style="margin-left:40%; margin-top:20% ">Incorrect Password</h1>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="index.php"},3000) </script>';
          }
        }
    }else{
        $conn->close();
        echo '<h1 style="margin-left:40%; margin-top:20% ">Please Register</h1>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href="index.php"},3000) </script>';
    }
    }
}
?>

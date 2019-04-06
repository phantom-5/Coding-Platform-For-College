<?php
session_start();
if(isset($_POST['refreshbtn']) || isset($_POST['finalbtn'])){
  $control=0;
  if(isset($_POST['finalbtn'])){$control=1;}
  $regno=$_POST['regno'];
  $fname=$_POST['fname'];
  $score=$_POST['score'];
  $teacherid=$_SESSION['uname'];
  $sem=$_SESSION['sem'];
  $today=date("Y/m/d");
  $conn=mysqli_connect('localhost','root','emophheg','codeavenue');
  if(!$conn){
      die("Connection Failed: ".mysqli_connect_error);
  }else{
      for($i=0;$i<count($regno);$i++){
          $regno_t=(int)$regno[$i];
          $score_t=(float)$score[$i];
          $sql_query="SELECT score FROM `recordofscore` WHERE `regno` = $regno_t";
          $result=$conn->query($sql_query);
          if($result->num_rows > 0){
              $rows=$result->fetch_assoc();
              $cscore=(float)$rows['score'];
              if($score_t > $cscore){
                  $sql_query_inner="UPDATE `recordofscore` SET `score` = $score_t WHERE `regno` = $regno_t";
                  $result_inner=$conn->query($sql_query_inner);
              }else{/*do nothing*/}
          }else{
               $sql_query_inner="INSERT INTO recordofscore(today,teacherid,fullname,regno,score,semester) VALUES ('$today','$teacherid','$fname[$i]',$regno_t,$score_t,$sem)";
               $result_inner=$conn->query($sql_query_inner);
          }
      }
      $conn->close();
      echo '<H1 CLASS="font-weight-bold" align="center" style="margin:auto">Posted Successfully</H1>
            <H2 CLASS="font-weight-bolder" align="center "style="margin:auto">Redirecting You in Three Seconds</H2>';
            if($control==0){
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="teachersview.php"},3000) </script>';
        }else{
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="index.php"},3000) </script>';
        }
            
  }
}
?>

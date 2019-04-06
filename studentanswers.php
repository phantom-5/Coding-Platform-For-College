<?php
session_start();
if(isset($_POST['submit'])){
    $today_date=date("Y/m/d");
    #echo $today_date;
    $answers=$_POST['answer'];
    $testcase=$_POST['test_case'];
    $output=$_POST['output'];
    $teacherid=$_SESSION['teachername'];
    $comments=$_POST['comment'];
    $conn = mysqli_connect('localhost','root','emophheg','codeavenue');
    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error);
    }else{

        $sql_query="SELECT today FROM `studentanswerstb`";
        $result=$conn->query($sql_query);
        if($result->num_rows > 0){
            while($rows=$result->fetch_assoc()){
                $stored_date=strtotime($rows['today']);
                if($stored_date < strtotime(date("Y/m/d"))){
                    $sql_query="TRUNCATE TABLE studentanswerstb";
                    $result=$conn->query($sql_query);
                    break;
                }
            }
        }

        for($i=0;$i<count($answers);$i++){
            if($answers[$i]!=""){
                #echo $questions[$i]." ".$testcase[$i]." ".$output[$i]."<br />";
                #echo $teacherid." ".$today_date."<br />";
                $regno=$_SESSION['regno'];
                $teachername=$_SESSION['teachername'];
                $userid=$_SESSION['uname'];
                $fname=$_SESSION['fname'];
                $sem=$_SESSION['sem'];

                $sql_query="INSERT INTO studentanswerstb(today,regno,userid,fullname,teacherid,codetext,testcase,ouputcase,commenttext,semester) VALUES ('$today_date',$regno,'$userid','$fname','$teachername','$answers[$i]','$testcase[$i]','$output[$i]','$comments[$i]',$sem)";
                $result=$conn->query($sql_query);
                
            }
        }
        echo '<H1 CLASS="font-weight-bold" align="center" style="margin:auto">Posted Successfully</H1>
            <H2 CLASS="font-weight-bolder" align="center "style="margin:auto">Redirecting You in Three Seconds</H2>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="studentsview.php"},3000) </script>';
        $conn->close();
}
}
?>
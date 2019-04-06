<?php
session_start();
if(isset($_POST['delete'])){
    $conn = mysqli_connect('localhost','root','emophheg','codeavenue');
    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error);
    }else{
        $teachername=$_SESSION['uname'];
        $sql_query="DELETE FROM `questionstb` WHERE `teacherid`='$teachername'";
        $result=$conn->query($sql_query);
        echo '<H1 CLASS="font-weight-bold" align="center" style="margin:auto">Records Deleted Successfully</H1>
        <H2 CLASS="font-weight-bolder" align="center "style="margin:auto">Redirecting You in Three Seconds</H2>';
}
}
if(isset($_POST['submit'])){
    $today_date=date("Y/m/d");
    #echo $today_date;
    $questions=$_POST['question'];
    $testcase=$_POST['test_case'];
    $output=$_POST['output'];
    $teacherid=$_SESSION['uname'];
    $_SESSION['sem']=$_POST['sem'];
    $sem=$_SESSION['sem'];

    $conn = mysqli_connect('localhost','root','emophheg','codeavenue');
    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error);
    }else{

        $sql_query="SELECT today FROM `questionstb`";
        $result=$conn->query($sql_query);
        if($result->num_rows > 0){
            while($rows=$result->fetch_assoc()){
                $stored_date=strtotime($rows['today']);
                if($stored_date < strtotime(date("Y/m/d"))){
                    $sql_query="TRUNCATE TABLE questionstb";
                    $result=$conn->query($sql_query);
                    break;
                }
            }
        }

        for($i=0;$i<count($questions);$i++){
            if($questions[$i]!=""){
                #echo $questions[$i]." ".$testcase[$i]." ".$output[$i]."<br />";
                #echo $teacherid." ".$today_date."<br />";
                $sql_query="INSERT INTO questionstb(today,teacherid,questions,testcase,ouputcase,semester) VALUES ('$today_date','$teacherid','$questions[$i]','$testcase[$i]','$output[$i]',$sem)";
                $result=$conn->query($sql_query);
                
            }
        }
        echo '<H1 CLASS="font-weight-bold" align="center" style="margin:auto">Posted Successfully</H1>
            <H2 CLASS="font-weight-bolder" align="center "style="margin:auto">Redirecting You in Three Seconds</H2>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="teachersview.php"},3000) </script>';
        $conn->close();
}
}
?>
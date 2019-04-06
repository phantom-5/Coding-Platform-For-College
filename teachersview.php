<?php
include 'navbarlogintrue.php';
?>
<html>
<body>
<form class='form-control bg-transparent w-80 p-4' action='finalSubmisson.php' method="POST">
<?php
$conn=mysqli_connect('localhost','root','emophheg','codeavenue');
if(!$conn){
    die('Connection Failed: '.mysqli_connect_error);
}else{
    $teachername=$_SESSION['uname'];
    $sem=$_SESSION['sem'];
    $sql_query_outer="SELECT COUNT(teacherid) FROM `questionstb` WHERE `teacherid`='$teachername' AND `semester`='$sem'";
    $result_outer=$conn->query($sql_query_outer);
    $count_max=0;
    $count=0;
    if($result_outer->num_rows > 0){while($rows=$result_outer->fetch_assoc()){$count_max=(int)$rows['COUNT(teacherid)'];}}
        $sql_query="SELECT regno,userid,fullname,codetext,testcase,ouputcase,commenttext from `studentanswerstb` WHERE `teacherid` = '$teachername' AND `semester` = $sem  ORDER BY `regno`";
        $result=$conn->query($sql_query);
        if($result->num_rows > 0){
            $temp="";
            while($rows=$result->fetch_assoc()){
                    if($rows['userid']!=$temp){
                        $temp=$rows['userid'];
                        echo "<!-- use studentanswerstb table -->
                        <!-- if different user -->
                        <div class='row'>
                        <div class='col'><label class='form-control bg-info text-white'>".$rows['regno']."</label></div>
                        <input type='hidden' name='regno[]' id='regno' value='".$rows['regno']."'><input type='hidden' name='fname[]' id='fname' value='".$rows['fullname']."'>
                        <div class='col'><label class='form-control bg-info text-white'>".$rows['fullname']."</label></div>";
                        
                        $today_date=date("Y/m/d");
                        $regno=$rows['regno'];
                        $sql_query_inner="SELECT score FROM `recordofscore` WHERE `today`='$today_date' AND `regno`= '$regno' AND `semester`=$sem";
                        $result_inner=$conn->query($sql_query_inner);
                        if($result_inner->num_rows > 0){
                        while($rows_inner=$result_inner->fetch_assoc()){
                          echo "<div class='col'><label class='form-control'>Current Score - ".$rows_inner['score']."</label></div>
                            <div class='col'><input type='number'step='0.01' name='score[]' class='form-control' placeholder='Score'></div>"; 
                        }
                        }else{
                          echo "<div class='col'><input type='number'step='0.01' name='score[]'class='form-control' placeholder='Score'></div>";
                        }
                        echo "</div>";
                        $codetext=$rows['codetext'];
                        $testcase=$rows['testcase'];
                        $ouputcase=$rows['ouputcase'];
                        $commenttext=$rows['commenttext'];
                        echo "<!-- use studentanswerstb table -->
                        <!-- else if same user -->
                        <div class='row'>
                        <div class='col'><label class='form-control'><code><pre>".$codetext."</pre></code></label></div></div>
                        <div class='form-group'>
                        <div class='row'>
                        <div class='col'><label class='form-control'><pre><b>Input</b>: ".$testcase."</pre></label></div>
                        <div class='col'><label class='form-control'><pre><b>Output</b>: ".$ouputcase."</pre></div>
                        <div class='col'><label class='form-control'><b>Comment</b>: ".$commenttext."</label></div>
                        </div>
                        </div>";

                    }else{
                        $codetext=$rows['codetext'];
                        $testcase=$rows['testcase'];
                        $ouputcase=$rows['ouputcase'];
                        $commenttext=$rows['commenttext'];
                        echo "<!-- use studentanswerstb table -->
                        <!-- else if same user -->
                        <div class='row'>
                        <div class='col'><label class='form-control'><code><pre>".$codetext."</pre></code></label></div></div>
                        <div class='form-group'>
                        <div class='row'>
                        <div class='col'><label class='form-control'><pre><b>Input</b>: ".$testcase."</pre></label></div>
                        <div class='col'><label class='form-control'><pre><b>Output</b>: ".$ouputcase."</pre></div>
                        <div class='col'><label class='form-control'><b>Comment</b>: ".$commenttext."</label></div>
                        </div>
                        </div>";
                        
                    }
            }
        
    }
}
?>

<!-- out of loops -->
<div class='form-group'>
<div class='row'>
<div class='col'><button name='refreshbtn' value='refreshbtn' class='form-control btn-warning text-white'>Submit & Refresh</button></div>
<div class='col'><button name='finalbtn' value='finalbtn' class='form-control btn-success text-white'>Final Submission</button></div>
</div>
</div>
</form>
</body>
</html>

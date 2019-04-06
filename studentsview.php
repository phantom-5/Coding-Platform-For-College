<?php
include 'navbarlogintrue.php';
?>
<html>
<body>
<form class='form-control bg-transparent w-80 p-4' action='index.php'>
<?php
$conn=mysqli_connect('localhost','root','emophheg','codeavenue');
if(!$conn){
    die('Connection Failed: '.mysqli_connect_error);
}else{
    $teachername=$_SESSION['teachername'];
    $sem=$_SESSION['sem'];
    $userid=$_SESSION['uname'];

        $sql_query="SELECT regno,userid,fullname,codetext,testcase,ouputcase,commenttext from `studentanswerstb` WHERE `teacherid` = '$teachername' AND `semester` = $sem AND `userid`='$userid'";
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
<div class='col'><button name='exit' value='exit' class='form-control btn-danger text-white'>Exit</button></div>
</div>
</div>
</form>
</body>
</html>
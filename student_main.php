<?php
include 'navbarlogintrue.php';
if(isset($_POST['submit'])){
    $_SESSION['teachername']=$_POST['tid'];
}
?>
<html>
<body> 
<div class="row">
<div class="col">
<iframe src="https://ideone.com/sphere-engine-widget" class="sticky-top" id="if" height="700px" width="900px"></iframe> 
</div>
<div class="col">
<form class='form-control bg-transparent w-80 p-4 sticky-top' action='studentanswers.php' method="POST">
<div class='row'>
<div class='col'><label class='badge badge-danger'>Questions</label></div></div>
<?php
$conn = mysqli_connect('localhost','root','emophheg','codeavenue');
if(!$conn){
    die("Connnection Failed: ".mysqli_connect_error);
}else{
    $teachername=$_SESSION['teachername'];
    $sem=(int)$_SESSION['sem'];
    $sql_query="SELECT * FROM `questionstb` WHERE `teacherid` = '$teachername' AND `semester` = $sem";
    $result=$conn->query($sql_query);
    if($result->num_rows > 0){
        $num=0;
        while($rows=$result->fetch_assoc()){
            $num++;
           echo "<div class='row'><div class='col'>
           <label class='form-control bg-warning'><b>Question ".$num."</b></label></div></div>
           <div class='row'><div class='col'>
           <label class='form-control'>".$rows['questions']."</label></div></div>
           <div class='form-group'>
           <div class='row'>
           <div class='col'><label class='form-control'><b>Test Case</b>: <pre>".$rows['testcase']."</pre></label></div>
           <div class='col'><label class='form-control'><b>Output</b>: <pre>".$rows['ouputcase']."</pre></label></div>
           </div></div>
           <div class='row form-group'><div class='col'> <div class='form-group'><label for='answer' class='text-dark'>Answer</label><textarea type='text' name='answer[]' id='answer' class='form-control' required></textarea></div></div><div class='col'><div class='form-group'><label for='test_case' class='text-dark'>Test Case</label><textarea type='text' name='test_case[]' id='test_case' class='form-control'></textarea></div></div><div class='col'><div class='form-group'><label for='output' class='text-dark'>Output</label><textarea type='text' name='output[]' id='output' class='form-control' ></textarea></div></div><div class='col'><div class='form-group'><label for='comment' class='text-dark'>Comment</label><textarea type='text' name='comment[]' id='comment' class='form-control'></textarea></div></div></div>";
           
        }
    }
    $conn->close();
}
?>
<button type="submit" name="submit" value="submit" class="form-control btn-block btn-success" ><font color="white">Post Answers</font></button>
</form>
</div>
</body>
</html>


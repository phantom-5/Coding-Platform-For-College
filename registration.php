<?php
include "navbarloginfalse.php";
?>
<!DOCTYPE HTML>
<HTML>
</BODY>
<?php
if(isset($_POST['submit'])){
$username=$_POST['uname'];
$password=$_POST['upass'];
$repassword=$_POST['rupass'];
$fullname=$_POST['fname'];
$registration_no=$_POST['regno'];
$email_id=$_POST['emailid'];
$semester_no=$_POST['sem'];
$usertype=$_POST['usertype'];

$no_issue=1;
#echo $no_issue."<br />from initial value";

$conn = mysqli_connect('localhost','root','emophheg','codeavenue');

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error);
}
else{
    $sql_query = "SELECT regno,userid,emailid FROM registration";
    $result = $conn->query($sql_query);
    if(($result->num_rows) > 0){
        while($rows=$result->fetch_assoc()){
            #echo "row fetched<br/>".$no_issue;
            if($rows["regno"]==$registration_no){$no_issue=0;}
            if($rows["userid"]==$username){$no_issue=0;}
            if($rows["emailid"]==$email_id){$no_issue=0;}
        }
    }

    if($no_issue==1){
        #echo $no_issue."<br />checked its 1";

        if(!filter_var($email_id,FILTER_VALIDATE_EMAIL)){
            $conn->close();
            echo '<H1 CLASS="font-weight-bold" align="center" style="position:absolute; top:45%; left:37%; color:red">Please Enter Valid Mail-ID</H1>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="index.php"},3000) </script>';
            
        }else if($password != $repassword){
            $conn->close();
            echo '<H1 CLASS="font-weight-bold" align="center" style="position:absolute; top:45%; left:37%; color:red">Passwords Didn\'t Match</H1>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href="index.php"},3000) </script>';
        }
        else{
                $password=password_hash($password,PASSWORD_DEFAULT);
                $sql_query = "INSERT INTO registration(regno,userid,passwordhash,fullname,usertype,emailid,semester) VALUES ($registration_no,'$username','$password','$fullname','$usertype','$email_id',$semester_no)";
                $result = $conn->query($sql_query);
                $conn->close();
        
                echo '<H1 CLASS="font-weight-bold" align="center" style="position:absolute; top:45%; left:37%">Registration Successful</H1>
                <H2 CLASS="font-weight-bolder" align="center "style="position:absolute; top:52%; left:30%">Please LogIn with Username and Password</H2>';
        
        }
    }
    else{
        $conn->close();
        echo '<H1 CLASS="font-weight-bold" align="center" style="position:absolute; top:45%; left:20%; color:red">Duplicate RegNo/UserID/Email-ID Can\'t Be Used</H1>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href="index.php"},3000) </script>';
    }

    
}
}
?>
<BODY>
</HTML>
<?php
include "navbarloginfalse.php";
?>
<!DOCTYPE HTML>
<html>
<body>
   <div class="row" style="margin:auto">
<div class="col">
    <div class="container" style="position:relative; top:45%; left:20%; width:800px">
    <h1 class="font-weight-bold">College of Engineering and Technology</h1>
    <h2 class="font-weight-bolder">Department of Information Technology</h2>
</div>
</div>
<div class="col" style="margin:auto">
    <br />
    <form method= "POST" action="registration.php" class="form-control bg-light w-75 p-3 float-right">
        <div class="form-group">
        <label for="uname"class="font-weight-bold" >Username</label>
        <input type="text" name="uname" id="uname" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="upass" class="font-weight-bold">Password</label>
        <input type="password" name="upass" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="rupass" class="font-weight-bold">Retype Password</label>
        <input type="password" name="rupass" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="regno" class="font-weight-bold">Registration Number</label>
        <input type="number" name="regno" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="Full Name" class="font-weight-bold">Full Name</label>
        <input type="text" name="fname" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="emailid" class="font-weight-bold">E-Mail</label>
        <input type="text" name="emailid" class="form-control" required>
        </div>
        <div class="form-group">
        <div class="row">
        <div class="col">
        <select class="form-control" name="sem">
        <option value="0">All</option>
        <option value="1">First</option>
        <option value="2">Second</option>
        <option value="3">Third</option>
        <option value="4">Fourth</option>
        <option value="5">Fifth</option>
        <option value="6">Sixth</option>
        <option value="7">Seventh</option>
        <option value="8">Eighth</option>
        </select>
        </div>
        <div class="col">
        <label for="sem" class="font-weight-bold">&emsp;&emsp;&emsp;Semester</label>
        </div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
        <div class="col">
        <select class="form-control" name="usertype">
        <option value="teacher">Faculty</option>
        <option value="student">Student</option>
        </select>
        </div>
        <div class="col">
        <label for="fac-stu" class="font-weight-bold">&emsp;&emsp;&emsp;User Type</label>
        </div>
        </div>
        </div>
        <button type="submit" name="submit" value="submit" class="form-control btn-block btn-success" ><font color="white">REGISTER</font></button>
    </form>
</div>
</body>
</html>
<?php
include "navbarloginfalse.php";
?>
<html>
<body>
<form action="loginValidation.php" method="POST" class="form-control bg-info w-50 p-3 sticky-top" style="margin:auto; margin-top:10%">
<div class="form-group">
    <label for="uname" class="text-white">UserID</label>
    <input type="text" name="uname" id="uname" class="form-control" required>
</div>
<div class="form-group">
    <label for="upass" class="text-white">Password</label>
    <input type="password" name="upass" id="upass" class="form-control" required>
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="form-control btn-block btn-success" ><font color="white">Ready To Code</font></button>
<a href="forgotpassword.php" class="text-white">Forgot Password</a>
</div>
</form>
</body>
</html>

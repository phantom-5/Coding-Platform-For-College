<?php
include 'navbarlogintrue.php'
?>
<html>
<body>
<form action="student_main.php" method="POST" class="form-control bg-info w-50 p-3 sticky-top" style="margin:auto; margin-top:10%">
<div class="form-group">
    <label for="tid" class="text-white">Teacher ID</label>
    <input type="text" name="tid" id="tid" class="form-control" required>
</div>
<button type="submit" name="submit" value="submit" class="form-control btn-block btn-success" ><font color="white">Go To Coding Screen</font></button>
</div>
</form>
</body>
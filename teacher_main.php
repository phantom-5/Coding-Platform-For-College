<?php
include 'navbarlogintrue.php'
?>
<html>
<head>
<script type="text/javascript">
function addNew(){
    $num=$('.row').length;
    $num=$num+1;
    $('.row:last').after("<div class='row'><div class='col'> <div class='form-group'><label for='question' class='text-white'>Question "+$num+"</label><textarea type='text' name='question[]' id='question' class='form-control' required></textarea></div></div><div class='col'><div class='form-group'><label for='test_case' class='text-white'>Test Case</label><textarea type='text' name='test_case[]' id='test_case' class='form-control' required></textarea></div></div><div class='col'><div class='form-group'><label for='output' class='text-white'>Output</label><textarea type='text' name='output[]' id='output' class='form-control' required></textarea></div></div><div class='col'><div class='form-group'><label for='output' class='text-white'>&emsp;</label><button type='addmore' name='addmore' value='addmore' class='form-control btn-block btn-warning' style='height:1.6cm' onClick='addNew()'><font color='white'>Add</font></button></div></div></div>");
}
</script>
</head>
<body>
<form method="POST" action="postQuestions.php" class="form-control bg-info w-75 p-3 sticky-top" style="margin:auto; margin-top:2%">
<div class="row" id="r1">

<div class="col">
<div class="form-group">
    <label for="question" class="text-white">Question 1</label>
    <textarea type="text" name="question[]" id="question" class="form-control" required></textarea>
</div></div>

<div class="col">
<div class="form-group">
    <label for="test_case" class="text-white">Test Case</label>
    <textarea type="text" name="test_case[]" id="test_case" class="form-control" required></textarea>
</div></div>

<div class="col">
<div class="form-group">
    <label for="output" class="text-white">Output</label>
    <textarea type="text" name="output[]" id="output" class="form-control" required></textarea>
</div></div>

<div class="col">
<div class="form-group">
<label for="output" class="text-white">&emsp;</label>
<button type="addmore" name="addmore" value="addmore" onClick="addNew()" class="form-control btn-block btn-warning" style="height:1.6cm" ><font color="white">Add</font></button>
</div></div>
</div>

<div class='form-group'>
<input type='number' class='form-control'name='sem' placeholder="Semester" required></div>
<button type="delete" name="delete" value="delete" class="form-control btn-block btn-danger" ><font color="white">Delete My Previous Records</font></button>
<button type="submit" name="submit" value="submit" class="form-control btn-block btn-success" ><font color="white">Post Questions</font></button>
</form>
</body>
</html>

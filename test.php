<?php
include 'navbarlogintrue.php';
?>
<html>
<body>
<form class='form-control bg-transparent w-80 p-4'>

<!-- use studentanswerstb table -->
<!-- if different user -->
<div class='row'>
<div class='col'><label class='form-control'>1601106117</label></div>
<div class='col'><label class='form-control'>Rudra Madhav Biswal</label></div>
    <!-- use recordofscore table -->
    <!-- if hasn't been scored
    <div class='col'><input type="number" name='score'class='form-control' placeholder='Score'></div> -->
    <!-- if has been scored
    <div class='col'><label class='form-control'>Current Score - 5</label></div>
    <div class='col'><input type="number" name='score'class='form-control' placeholder='Score'></div> -->
</div>




<!-- use studentanswerstb table -->
<!-- else if same user -->
<div class='row'>
<div class='col'><label class='form-control'><code><pre>public class Quadratic {

public static void main(String[] args) {

    double a = 2.3, b = 4, c = 5.6;
    double root1, root2;

    double determinant = b * b - 4 * a * c;

    // condition for real and different roots
    if(determinant > 0) {
        root1 = (-b + Math.sqrt(determinant)) / (2 * a);
        root2 = (-b - Math.sqrt(determinant)) / (2 * a);

        System.out.format("root1 = %.2f and root2 = %.2f", root1 , root2);
    }
    // Condition for real and equal roots
    else if(determinant == 0) {
        root1 = root2 = -b / (2 * a);

        System.out.format("root1 = root2 = %.2f;", root1);
    }
    // If roots are not real
    else {
        double realPart = -b / (2 *a);
        double imaginaryPart = Math.sqrt(-determinant) / (2 * a);

        System.out.format("root1 = %.2f+%.2fi and root2 = %.2f-%.2fi", realPart, imaginaryPart, realPart, imaginaryPart);
    }
}
}</pre></code></label></div></div>
<div class='form-group'>
<div class='row'>
<div class='col'><label class='form-control'><pre><b>Input</b>: x^2+5x+16=0</pre></label></div>
<div class='col'><label class='form-control'><pre><b>Output</b>: 
*
**
***
****</pre></div>
<div class='col'><label class='form-control'><b>Comment</b>: Great Question</label></div>
</div>
</div>







<!-- out of loops -->
<div class='form-group'>
<div class='row'>
<div class='col'><button name='refreshbtn' value='refreshbtn' class='form-control btn-warning text-white'>Submit & Refresh</button></div>
<div class='col'><button name='finalbtn' value='finalbtn' class='form-control btn-success text-white'>Final Submission</button></div>
</div>
</div>
</form>
<?php
$string = '"hdsugkldhgk"';
$string = str_replace('"',"'",$string);
echo $string; ?>
</body>
</html>
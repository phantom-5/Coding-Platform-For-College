<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <header>

    </header>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-success">

        <span class="navbar-text"><a href="test.php" style="text-decoration:none"><b>Code</b>Avenue</a></span>

            <ul class="navbar-nav" >
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">LogOut</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tutorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feedback</a>
                </li>
                <?php $username=$_SESSION['uname']; echo '<li class="nav-item">
                    <a class="nav-link text-warning" href="#"> Welcome <b>'.$username.'</b></a>
                </li>' ?>
            </ul>
        </nav>
            
    </body>
</html>
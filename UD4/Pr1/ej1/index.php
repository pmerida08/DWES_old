<?php
/**
 * 
 * @author Pablo Merida
 * 
 * 
 * 
 */

 $user = "";
 $passwd = "";

 if (isset($_COOKIE["user"])){
    $user = $_COOKIE["user"];
    $passwd = $_COOKIE["passwd"];
 }

 if (isset($_POST["submit"])){
    if (isset($_POST["remindMe"])) {
        setcookie("user", $_POST["user"], time() + 3600);
        setcookie("passwd", $_POST["passwd"], time() + 3600);

        $user = $_POST["user"];
        $passwd = $_POST["passwd"];
    } 
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericicio 1</title>
</head>
<body>
    <form method="post" action="">
        <label>User: </label>
        <input type="text" name="user" value="<?php echo $user ?>"><br>
        <label>Password: </label>
        <input type="password" name="passwd" value="<?php echo $passwd ?>"><br>
        <input type="checkbox" name="remindMe" id="remindMe">
        <label>Remind me</label><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php

$user_name = 'Ahmed Mohamed';
$user_email = 'ahmed123@gmail.com';
$user_password = "Ahmed12345";
$message = '';
$error = '';

if ($user_name == $_COOKIE["user"] && $user_email == $_COOKIE["email"] && $user_password == $_COOKIE["pass"]) {
    # code...
    $message = "Welcome ". $_COOKIE["user"]. "<br />";
} else {
    # code...
    $error = 'This Data Is Error Please Login Another';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>.error {color: #FF0000;}
            .btn {background-color: black;
            color:#fff;
            padding:5px;
            text-decoration:none;}
    </style>
</head>
<body>

<div><h1><?= $message?>  </h1></div>
<div class='error'><h1><?= $error?>  </h1>
<?php if ($error) { ?>
    
<a href='index.php' class="btn"> GoToLogIn</a><?php }?>
</div>

</body>
</html>

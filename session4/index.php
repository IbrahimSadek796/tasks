<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>.error {color: #FF0000;}</style>
</head>
<body>

<?php

function test_data($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "welcom";
$error = false;
$name = $email = "";
$nameErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $error = true;
      } else {
        $name = test_data($_POST["name"]);
        
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error = true;
          $nameErr = "Only letters and white space allowed";
        }
      }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        $error = true;

        }else {
            $email = test_data($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $error = true;
            }
    }

    

    if ($error == false) {
        $myfile = fopen("file.txt", "a");
    fwrite($myfile, $name."\n");
    fwrite($myfile, $email."\n");
    fclose($myfile);
    header("Location:welcome.php?name=$name");
    exit;
    }
    
}

?>

<form action="" method="post">
Name: <input type="text" name="name" value ="<?= $name ?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email"  value ="<?= $email ?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
<input type="submit">
</form>


</body>
</html>
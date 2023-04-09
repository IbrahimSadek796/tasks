<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="./assets/style/all.min.css">
    <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style/index.css">
    <style>.erro {color: #FF0000;}</style>
</head>
<body>

<?php 

function test_data($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// define variables and set to empty values
$error = false;

$name = '';
$email = '';
$password = '';

$nameErr =  $emailErr = $passErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $error = true;
      } else {
        $name = test_data($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $error = true;
          }
           
        }
        
        }
      

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        $error = true;

        }else {
            
            $email = test_data($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "This email is invalid";
                $error = true;
            }
    }

    if (empty($_POST['password'])) {

        $passErr = "Password is required";
        $error = true;
    }else{
        // Validate password strength
        $password = test_data($_POST['password']);
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        // $specialchars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            $passErr = 'Password is Error';
            $error = true;
          
        } 
      }

      if ($error == false ) {

        $cookie_name = "user";
        setcookie($cookie_name, $name, time() + (86400 * 30), "/"); // 86400 = 1 day

        $cookie_email = "email";
        setcookie($cookie_email, $email, time() + (86400 * 30), "/");

        $cookie_pass = "pass";
        setcookie($cookie_pass, $password, time() + (86400 * 30), "/");

        header("Location:home.php");
        exit();
      }


?>


<div class="lay" id="lay">
        <div class="container">
            <div class="items d-flex justify-content-center align-items-center vh-100">
                <form class="form w-50 m-auto p-2 text-center rounded shadow"  action="" method="post">
                    <div class="color-danger" id="error">
                    <span class="erro">* <?php echo $nameErr;?></span>
                    <span class="erro">* <?php echo $emailErr;?></span>
                    <span class="erro">* <?php echo $passErr;?></span>
                    </div>
                    
                        <input type="text" name="name" class="form-control my-5" value="" placeholder="Enter your Name....." id="nameInput">
                        <!-- <br><br> -->
                        
                        <input type="email" name="email" class="form-control my-5" placeholder="Enter your Email" id="emailInput">
                        <!-- <br><br> -->
                        
                        <input type="password" name="password" class="form-control my-5" placeholder="Enter Your Passsword" id="passInput">
                        <!-- <br><br> -->
                        
                            <input class="btn btn-ouline-danger bg-danger" id="btnLogin" type="submit" name="submit" value="Login"></input>
                    
                    </div>
                </form>
        </div>
    </div>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>



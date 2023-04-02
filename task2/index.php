<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
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

$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";
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

    if (!empty($_POST['website'])) {

        $website = test_data($_POST['website']);

        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL";
            $error = true;
        }
    }

    if (!empty($_POST['comment'])) {

        $comment = test_data($_POST['comment']);
    }

    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required";
        $error = true;
        }else {
            $gender = test_data($_POST['gender']);
            if (!in_array($gender , ['female' , 'male' , 'other'])) {
                $genderErr = "Gender not found";
                $error = true;
            }
    }

    if ($error == false) {
        header("Location:information.php");
    }

}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value ="<?= $name ?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email"  value ="<?= $email ?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website"  value ="<?= $website ?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"> <?= $comment ?></textarea>
  <br><br>
  Gender:
  <input type="radio" <?= $gender == 'female' ? 'checked' : '' ?> name="gender" value="female">Female
  <input type="radio" <?= $gender == 'male' ? 'checked' : '' ?> name="gender" value="male">Male
  <input type="radio" <?= $gender == 'other' ? 'checked' : '' ?> name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>
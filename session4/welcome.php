<?php
// echo "welcom <br>";
// echo $_GET['name'];
// $myfile = fopen("file.txt", "r") or die("Unable to open file!");
// // Output one line until end-of-file
// while(!feof($myfile)) {
//   echo fgets($myfile) . "<br>";
// }
// fclose($myfile);

// $handle = fopen("file.txt", "r");
// if ($handle) {
//     while (($line = fgets($handle)) !== false) {
//         echo $line[1].'<br/>';
//     }

//     fclose($handle);
// } else {
//     // error opening the file.
// } 

$myFile = "file.txt";
$lines = file($myFile);//file in to an array
echo $lines[0]; //line 2
$length = count($lines);
echo $length;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}</style>
</head>
<body>
    
<table>
  <tehead>
    <tr>
        <th>Name</th>
        <th>E-mail</th>
    </tr>
    </tehead>
    <tbody>

    <?php for ($i=0; $i < $length; $i++) { ?>
    <tr>
    
    <td><?php echo $lines[$i]; ?></td>
    <?php $i++; ?>
    <td><?php echo $lines[$i]; ?></td>
    
        
  </tr>
  <?php } ?>
    </tbody>
</table>


</body>
</html>
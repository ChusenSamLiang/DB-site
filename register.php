
<!doctype html>

<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
?>

<html>
<head>
	<title> </title>
</head>

<body>


<?php 

alert("works");
echo("cooool");


$con=mysqli_connect('localhost','root','root','bakery');

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else {
	//echo "Did not fail......";
}

$result = mysqli_query($con,"SELECT cakename, pricepaid, ordertime, pickuptime FROM customer natural join bakery.order natural join cake; ");



while($row = mysqli_fetch_array($result))
  {
  echo"<tr>";
  echo "<br>";
  $row['ID'] = $row['cakename'];
  echo $row['cakename'];
  echo '<a style="font-size:16px;font-weight:bold;" href="php2.php?ID=' .$row['ID'].'"> View Details </a';
  echo "<br>";
  }

define('DB_HOST', 'localhost'); 
define('DB_NAME', 'practice'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

function NewUser() { $fullname = $_POST['name']; $userName = $_POST['user']; $email = $_POST['email']; $password = $_POST['pass']; $query = "INSERT INTO websiteusers (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')"; $data = mysql_query ($query)or die(mysql_error()); if($data) { echo "YOUR REGISTRATION IS COMPLETED..."; } } 

function SignUp() { if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text { $query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); if(!$row = mysql_fetch_array($query) or die(mysql_error())) { newuser(); } else { echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; } } } if(isset($_POST['submit'])) { SignUp(); } ?>

</body>
</html>
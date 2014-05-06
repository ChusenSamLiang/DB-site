

<?php
if(isset($_POST['upload'])) {

$allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
$max_filesize = 10485760;
$upload_path = 'images/';
$description = $_POST['imgdesc'];

$filename = $_FILES['userfile']['name'];
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

if(!in_array($ext,$allowed_filetypes))
  die('The file you attempted to upload is not allowed.');

if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
  die('The file you attempted to upload is too large.');

if(!is_writable($upload_path))
  die('You cannot upload to the specified directory, please CHMOD it to 777.');

if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
   $query = "INSERT INTO uploads (name, description) VALUES ($filename, $description)"; 
   mysql_query($query);

echo 'Your file upload was successful!';


} 
else {
     echo 'There was an error during the file upload.  Please try again.';
}

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
		<?php include 'layout.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Places and Activities</h1>
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
          	
          	<form action="upload.php" method="post" enctype="multipart/form-data">
          		<input type="file" name="userfile" id="userfile">
          		<button name="upload" id="upload" type="submit">Upload</button>
          	</form>
          	
          </div>
        </div>
  </body>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>

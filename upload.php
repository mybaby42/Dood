<?php
  if(!empty($_FILES)){

  $tempfile = $_FILES["file"]["tmp_name"];                          //Temporary file location on server
  $fname = $_POST["fname"];                                        //Custom File name input
  $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);  //File extention
  $name = $fname . '.' . $type;                                  //Complete file name with extention to be used in API

  require('doodstream.php');  //Path to the library should be correct!
  $ds = new DoodstreamAPI();
  $key = "173150wcm7cv20trgzwqf0";
  $ds->Setup($key);
  $result = $ds->Upload($tempfile, $type, $name);
  print_r($result);
	$uploads = $ds->List("1", "100");  //Lists the first page of the recent uploads(100 per page as defined)
  print_r($uploads);
  }
  else{
    die('No file uploaded');
  }


?>
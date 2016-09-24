<?php

 $targetfolder = "uploads/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

 echo "File Upload Redirecting in 4 sec";
 header('Refresh: 4; URL=blog.php');
 }

 else {

 echo "Problem uploading file ";
 echo "Redirecting in 4 sec";
 header('Refresh: 4; URL=blog.php');

 }

 ?>
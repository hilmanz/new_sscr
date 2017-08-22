<?php
$DOMAINADMIN = "http://".$_SERVER['HTTP_HOST']."/new_sscr/public_html/uploads/";

$file = "img/". basename($_FILES['uploadfile']['name']); 
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  echo "success"; 
} else {
	echo "error";
}
?>
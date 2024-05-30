<?php


$upload_dir =  wp_upload_dir()['basedir'] ) . 'evaluation-uploads';
wp_mkdir_p( $upload_dir );

$filename = $_FILES['file']['name'];
$location =  "upload/".$filename;

if(move_uploaded_file($_FILES['file']['tmp_name'], $location) ){
  echo "sucess";
} else {
  echo "failure";
}
?>


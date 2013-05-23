<?php

if($_POST[Submit]){
 set_time_limit(3000);
  //set up basic connection
 $ftp_server = “filmier.com”;
 $ftp_user_name = “filmier“;
 $ftp_user_pass = “filmierfilmier”;
 $destination_file = $_FILES['file']['name'];
 $source_file = $_FILES['file']['tmp_name'];
 $size_file=$_FILES['file']['size'];
 $conn_id = ftp_connect($ftp_server);
  
/*
จากตรงนี้ $conn_id = ftp_connect($ftp_server); สามารถ เซ้ต port ของ ftp ได้ ถ้าไม่ใส่จะมีค่า เท่ากับ 21 แต่ถ้า ftp ใช้ port อื่น ในการเข้า สามารถเซต เป็น port อื่นได้
เช่น
$conn_id = ftp_connect($ftp_server,33);
*/

 // login with username and password
 $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

//change the directory to somedir
 ftp_chdir($conn_id,”htdocs/upload/store_file”);
 
 // check connection  
 if ((!$conn_id) || (!$login_result)) {
     echo 'FTP connection has failed!';
     echo 'Attempted to connect to $ftp_server for user $ftp_user_name';
     exit;
 } else {
     echo 'Connected to $ftp_server, for user $ftp_user_name<br/>';   
  }      
// upload the file  
 $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);    
// check upload status  
 if (!$upload) {
     echo 'FTP upload has failed!';
  }    
// close the FTP stream  
ftp_close($conn_id);
 
?>
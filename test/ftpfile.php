<?php
	$ftp_server = '192.168.99.5';
	$ftp_user_name = 'mm';
	$ftp_user_pass = 'l[kpfu';

	// open some file for reading
	$name = 'ProductionCNT.csv';
	$file = 'C:\ProductionCNT\ProductionCNT.csv';
	$fp = fopen($file, 'r');

	// set up basic connection
	$conn_id = ftp_connect($ftp_server);

	// login with username and password
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

	// check connection
	if ((!$conn_id) || (!$login_result)) {
		die("FTP connection has failed !");
	}

	echo "Current directory: " . ftp_pwd($conn_id) . "\n";

	// try to change the directory to somedir
	if (ftp_chdir($conn_id, "public_html/csv")) {
		echo "Current directory is now: " . ftp_pwd($conn_id) . "\n";
	} else {
		echo "Couldn't change directory\n";
	}

	//change the directory to somedir
	ftp_chdir($conn_id, ”csv”); // try to upload $file
	//ftp_put ( resource $ftp_stream , string $remote_file , string $local_file , int $mode [, int $startpos = 0 ] )
	if (ftp_fput($conn_id, $name, $fp, FTP_ASCII)) {
		echo "&quot;Successfully uploaded $filen&quot;";
	} else {
		echo "&quot;There was a problem while uploading $filen&quot;";
	}

	// close the connection and the file handler

	ftp_close($conn_id);
	fclose($fp);

?>
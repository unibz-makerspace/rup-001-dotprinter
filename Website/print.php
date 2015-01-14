<?php
$ip   = 'banglaitalia.unibz.it';
$user = 'pi';
$pswd = 'bangla';

$connection = ssh2_connect($ip, 22);

ssh2_auth_password($connection, $user, $pswd);

include 'sql_details.php';

$result = mysql_query("SELECT active FROM dot_matrix_printer WHERE id = '1'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

$status = $row[0]; //print the status 


	
 if ($status == 0)
	 {
		//$stream = ssh2_exec($connection, './print.sh');	
		//$stream = ssh2_exec($connection, 'echo $PWD');	
		
		$stream = ssh2_exec($connection, './print.sh');
		stream_set_blocking($stream, true);
		$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
		//echo stream_get_contents($stream_out);
		
		echo "printing";
		mysql_query("UPDATE dot_matrix_printer SET active = 1 WHERE id = 1");

	}
else 
	{
		echo "Failed printing";
	}
	
// fclose($stream);




?>

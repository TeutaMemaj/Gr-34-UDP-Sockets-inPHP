
while(1)
{
	echo "Waiting for data ... \n";
	
	//Receive some data
	$r = socket_recvfrom($sock, $buf, 512, 0, $remote_ip, $remote_port);
	echo "$remote_ip : $remote_port -- " . $buf;
	
	//Send back the data to the client
	socket_sendto($sock, "OK " . $buf , 100 , 0 , $remote_ip , $remote_port);
}

socket_close($sock);
?>
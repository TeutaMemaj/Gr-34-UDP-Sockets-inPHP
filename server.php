<?php 

error_reporting(~E_WARNING);
 
 if(!($sock=socket_create(AF_INET,SOCK_DGRAM, 0)))
 {


$ERRORCODE = socket_last_error();
$errormsg = socket_strerror($errorcode;)
 }

die("Couldn't create socket: [$errorcode] $errormsg \n");

}

echo "Socket created \n";


if( !socket_bind($sock, "0.0.0.0" , 9999))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);


    die("Could not bind socket : [$errorcode] $errormsg \n");
    
}

while(1)
{
	echo "Waiting for data ... \n";
	
	//Prano disa informata 
	$r = socket_recvfrom($sock, $buf, 512, 0, $remote_ip, $remote_port);
	echo "$remote_ip : $remote_port -- " . $buf;
	
	//Send back the data to the client
	socket_sendto($sock, "OK " . $buf , 100 , 0 , $remote_ip , $remote_port);
}

socket_close($sock);
?>

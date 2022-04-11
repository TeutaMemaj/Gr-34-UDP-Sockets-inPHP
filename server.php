<?php

//Zvogelo gabimet
error_reporting(~E_WARNING);

//Krijo nje UDP socket
if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";

// Lidhni adresën e burimit
if( !socket_bind($sock, "0.0.0.0" , 9999) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Could not bind socket : [$errorcode] $errormsg \n");
}

echo "Socket bind OK \n";

//Do some communication, this loop can handle multiple clients
while(1)
{
    echo "Waiting for data ... \n";

    //Prano disa te dhena
    $r = socket_recvfrom($sock, $buf, 512, 0, $remote_ip, $remote_port);
    echo "$remote_ip : $remote_port -- " . $buf;

    //Dërgojini të dhënat klientit
    socket_sendto($sock, "OK " . $buf , 100 , 0 , $remote_ip , $remote_port);
}

socket_close($sock);
?>
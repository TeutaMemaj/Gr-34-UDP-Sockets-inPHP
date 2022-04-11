# Gr-34-UDP-Sockets-inPHP
<?php 

error_reporting(~E_WARNING);
 
 if(!($sock=socket_create(AF_INET,SOCK_DGRAM, 0)))
 {


$ERRORCODE = socket_last_error();
$errormsg = socket_strerror($errorcode;)
 }

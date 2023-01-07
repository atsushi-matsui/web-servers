<?php
function msleep($milliseconds) {
    return usleep($milliseconds * 1000); 
}
$var = 500; 
msleep(1000 + (rand(0, $var)-$var/2));

echo 'OK';

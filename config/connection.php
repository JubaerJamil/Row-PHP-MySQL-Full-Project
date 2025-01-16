<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME",  "new_portfolio");

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if($connection){
    echo "";
}else{
    echo "connection Failed";
}
<?php

namespace Connections;
require_once ("vendor/autoload.php");
use PDO;

class Connection{

    function connect(){

        $host = "localhost";
        $dbName = "IndividualApi";
        $user = "postgres";
        $password = "1324";
        $port = "5432";

        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbName", $user, $password);

        return $pdo;
    }


}
?>
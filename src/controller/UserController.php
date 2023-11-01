<?php 

// atribui o namespace (apelido), chama o autoload para poder chamar classes de outros arquivos
// chama o arquivo UserModel com a classe UserModel

namespace Controllers;
require_once ("vendor/autoload.php");

use Connections\Connection;
use PDO;


Class UserController {

    

    function getData(){
        $connection = new Connection();
        $sql = $connection -> connect () -> query ("SELECT * FROM datas");
        $sql = $sql -> fetchAll (PDO::FETCH_ASSOC);
        return $sql;
    }

    
}

?>
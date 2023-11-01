<?php 


header('Content-Type: application/json');

require ("vendor/autoload.php");

use Controllers\UserController;


$requestMethod = $_SERVER ["REQUEST_METHOD"];



if($requestMethod == "GET"){
            
    $Conteudos = new UserController();
    $listaConteudos = $Conteudos->getData(); 

    $data = array();

    foreach ($listaConteudos as $item) {
        $id = $item['id'];
        $conteudo = $item['conteudo'];

        $data[] = array(
            "ID" => $id,
            "Conteudo" => $conteudo
        );
    }

    echo json_encode($data);

}
else{
        
    $data = [
        "status" => 405,
        "message" => "Metodo $requestMethod Nao Permitido"
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
    }
        
        

?>
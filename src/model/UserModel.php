<?php 




namespace Models;
require_once ("vendor/autoload.php");
use Connections\Connection;
use PDO;


Class UserModel {

    function cadastrarInformacao($input) {
        $pdo = new Connection();
        $pdo = $pdo->connect();
        
        
        
        $sql = "INSERT INTO datas(conteudo) VALUES (:conteudo)";
        $resultado = $pdo->prepare($sql);

        
        $resultado->bindParam(':conteudo', $input);
        
        if ($resultado->execute()) {
            $data = [
                "status" => 201,
                "message" => "Registro adicionado com sucesso"
            ];
            header("HTTP/1.0 201 Created");
            echo json_encode($data);
        } else {
            $data = [
                "status" => 500,
                "message" => "Erro interno"
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }
    }
    
}
?>
<?php 

header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json'); 
header('Access-Control-Allow-Method: POST'); 
header('Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With');

require ("vendor/autoload.php");

use Models\UserModel;

$requestMethod = $_SERVER ["REQUEST_METHOD"];

if ($requestMethod == 'POST'){

    $inputData = json_decode(file_get_contents("php://input"), true);
    $model = new UserModel();

    if(empty($inputData)){
        
        $conteudoGuardado = $model->cadastrarInformacao($_POST['conteudo']);
    }
    else{
       
        $conteudoGuardado = $model->cadastrarInformacao($inputData['conteudo']);
        
    }
    



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
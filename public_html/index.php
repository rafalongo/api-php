<?php
    header("Content-Type: application/json");
    
    require_once '../vendor/autoload.php';

    if($_GET['url']){
        $url = explode('/', $_GET['url']);

        if($url[0] === 'api'){
            array_Shift($url);
            
            $service = 'App\Controller\\'.ucfirst($url[0]).'Controller';
            
            array_Shift($url);

            $method = strtolower($_SERVER['REQUEST_METHOD']);

            try {
                $response = call_user_func_array(array(new $service, $method), $url);

                echo json_encode(array("status" => "success", "data" => $response));
            } catch (\Exception $e) {
                echo json_encode(array("status" => "error", "data" => $e->getMessage()));
            }
        }
    }

?>
<?php 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Anime {

    public function index(){
        global $db;

        // if request method is not post 
        if( empty($_POST) ){
            // let the user know that the request method is not allowed
            die('Request method not allowed on this endpoint | should be POST instead of ' . $_SERVER['REQUEST_METHOD']);
            return;
        }
        
        try {
            $decoded = JWT::decode($_POST['token'], new Key(SECRET_KEY, 'HS256'));

            // check user aleready in the database {$decoded->name}
            $db->query("SELECT * FROM users WHERE `name` = '{$decoded->name}'");
            $user = $db->resultset();

            // next, if user found
            if( $user !== null ){
                // get all anime
                $db->query("SELECT * FROM anime");
                $anime = $db->resultset();
                $anime = [
                    'status' => 'success',
                    'data' => $anime
                ];
                echo json_encode($anime);
                return true;
            }
            
            // header status forbidden
            header("HTTP/1.1 403 Forbidden");
            return false;
            die("403 Forbidden");
            exit;

        }catch(Exception $e) {
            $msg = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            echo json_encode($msg);

            // header status forbidden
            header("HTTP/1.1 403 Forbidden");
            return false;
            die("403 Forbidden");
            exit;
        }
            
    }

    // function to add a new anime
    public function create(){
        global $db;

        // if request method is not post 
        if( empty($_POST) ){
            // let the user know that the request method is not allowed
            die('Request method not allowed on this endpoint | should be POST instead of ' . $_SERVER['REQUEST_METHOD']);
            return;
        }
        
        try {
            $decoded = JWT::decode($_POST['token'], new Key(SECRET_KEY, 'HS256'));

            // check user aleready in the database {$decoded->name}
            $db->query("SELECT * FROM users WHERE `name` = '{$decoded->name}'");
            $user = $db->resultset();

            // next, if user found
            if( $user !== null ){
                // add new anime
                $title = $_POST['title'];
                $description = $_POST['description'];
                $image = $_POST['image'];
                $db->query("INSERT INTO anime (id, title, description, image) VALUES (NULL, '$title', '$description', '$image')");
                $db->execute();
                $anime = [
                    'status' => 'success',
                    'message' => 'Anime added successfully'
                ];
                echo json_encode($anime);
                return true;
            }
            
            // header status forbidden
            header("HTTP/1.1 403 Forbidden");
            return false;
            die("403 Forbidden");
            exit;

        }catch(Exception $e) {
            $msg = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            echo json_encode($msg);

            // header status forbidden
            header("HTTP/1.1 403 Forbidden");
            return false;
            die("403 Forbidden");
            exit;
        }
            
    }


    // public function getToken(){
    //     $key = SECRET_KEY;
    //     $payload = [
    //         'name' => 'baharcenah',
    //     ];

    //     $jwt = JWT::encode($payload, $key, 'HS256');
    //     var_dump($jwt);
    // }
    
}
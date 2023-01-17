<?php

    namespace App\Controller;

    use App\Model\Login;

    class LoginController
    {
        private $y;

        // public function __construct(){
            // $this->y = $_COOKIE;
        // }

        public function get(){
            // session_start();
            // return false;
            // if( isset($_COOKIE['login']) ){
                // $x = ($this->y);
                // if($x->user_id){
                    // return Login::select();
                // }
            // } else {
                // session_destroy();
                throw new \Exception("Usuário não logado!");
            // }
        }

        public function post(){
            $pp = json_decode($_POST['json']);
            $post = [];
            $post['email'] = $pp->email;
            $post['senha'] = $pp->senha;

            return Login::check($post);
            
            // if(isset($result['user_id'])){
                // setcookie( "login", json_encode($result), strtotime( '+30 days' ), "/" );
                // session_set_cookie_params(2000, '/', 'localhost');
                // session_start();
                // $_SESSION['user_id'] = '1';
                // $_COOKIE['login'] = $result;
                // session_start();
            // }

            // return $result;
        }

        public function update(){}

        public function delete(){}
    }

?>
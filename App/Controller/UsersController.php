<?php

    namespace App\Controller;

    use App\Model\Users;

    class UsersController
    {
        public function get($id = null){
            if($id){
                return Users::select($id);
            } else {
                return Users::selectAll();
            }
        }

        public function post(){
            $post = [];
            $post['nome'] = $_POST['nome'];
            $post['email'] = $_POST['email'];
            $post['senha'] = md5($_POST['senha']);
            
            return Users::record($post);
        }

        public function update(){}

        public function delete(){}
    }

?>
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

        public function post(){}

        public function update(){}

        public function delete(){}
    }

?>
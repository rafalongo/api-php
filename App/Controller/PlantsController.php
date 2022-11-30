<?php

    namespace App\Controller;

    use App\Model\Plants;

    class PlantsController
    {
        public function get($id = null){
            if($id){
                return Plants::select($id);
            } else {
                return Plants::selectAll();
            }
        }

        public function post(){}

        public function update(){}

        public function delete(){}
    }

?>
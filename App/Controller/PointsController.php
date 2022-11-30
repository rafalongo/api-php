<?php

    namespace App\Controller;

    use App\Model\Points;

    class PointsController
    {
        public function get($id = null){
            if($id){
                return Points::select($id);
            } else {
                return Points::selectAll();
            }
        }

        public function post(){}

        public function update(){}

        public function delete(){}
    }

?>
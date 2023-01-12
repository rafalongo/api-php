<?php

    namespace App\Controller;

    use App\Model\Plants;

    class PlantsController
    {
        public function get($growthId = null, $plantId = 0){
            if($growthId){
                return Plants::select($growthId, $plantId);
            } else {
                return Plants::selectAll();
            }
        }

        public function post(){}

        public function update(){}

        public function delete(){}
    }

?>
<?php

    namespace App\Controller;

    use App\Model\Growths;

    class GrowthsController
    {
        public function get($id = null){
            if($id){
                return Growths::select($id);
            } else {
                return Growths::selectAll();
            }
        }

        public function post(){}

        public function update(){}

        public function delete(){}
    }

?>
<?php

    namespace App\Model;

    class Plants
    {
        private static $table = 'cd_plants';
        // private static $growthId = 10;

        public static function select(int $growthId, int $plantId){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE growth_id = :growthId';
            if($plantId > 0){
                $sql = 'SELECT * FROM '.self::$table.' WHERE growth_id = :growthId AND plant_id = :id';
            }
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':growthId', $growthId);
            if($plantId > 0){
                $stmt->bindValue(':id', $plantId);
            }
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhuma planta encontrada com o id: '".$plantId."'");
            }
        }

        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhuma planta encontrada");
            }
        }
    }

?>
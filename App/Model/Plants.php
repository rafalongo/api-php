<?php

    namespace App\Model;

    class Plants
    {
        private static $table = 'cd_plants';
        private static $growthId = 10;

        public static function select(int $id){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE growth_id = :growthId AND plant_id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':growthId', self::$growthId);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhuma planta encontrada com o id: '".$id."'");
            }
        }

        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE growth_id = :growthId';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':growthId', self::$growthId);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhuma planta encontrada");
            }
        }
    }

?>
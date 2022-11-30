<?php

    namespace App\Model;

    class Points
    {
        private static $table = 'cd_points';
        private static $plantId = 26;

        public static function select(int $id){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE plant_id = :plantId AND point_id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':plantId', self::$plantId);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhuma observação encontrada com o id: '".$id."'");
            }
        }

        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE plant_id = :plantId';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':plantId', self::$plantId);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhuma observação encontrada");
            }
        }
    }

?>
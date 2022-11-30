<?php

    namespace App\Model;

    class Growths
    {
        private static $table = 'cd_growths';
        private static $userId = 1;

        public static function select(int $id){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE user_id = :userId AND growth_id = :id AND growth_status = 1';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':userId', self::$userId);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhum culltivo encontrado com o id: '".$id."'");
            }
        }

        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE user_id = :userId AND growth_status = 1';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':userId', self::$userId);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhum usuário encontrado");
            }
        }
    }

?>
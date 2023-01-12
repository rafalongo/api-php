<?php

    namespace App\Model;

    class Users
    {
        private static $table = 'cd_users';

        public static function select(int $id){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE user_status = 1 AND user_id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhum usuário encontrado com o id: '".$id."'");
            }
        }

        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE user_status = 1';
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nunhum usuário encontrado");
            }
        }

        public static function record($post){
            // if($post['status'] == 'success'){
                $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
            
                $sql = 'INSERT INTO '.self::$table.' (user_name, user_email, user_pass, user_status) VALUES ("'.$post["nome"].'", "'.$post["email"].'", "'.$post["senha"].'", 1)';
                
                $stmt = $connPdo->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    return "Usuário '".$post['nome']."' inserido com sucesso";
                    // return $stmt->fetchRow(\PDO::FETCH_ASSOC);
                } else {
                    throw new \Exception("Nunhum usuário gravado");
                }
            // }
        }
    }

?>
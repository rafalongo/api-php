<?php

    namespace App\Model;

    class Login
    {
        private static $table = 'cd_users';

        public static function check($post){
            $connPdo = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
        
            $sql = 'SELECT user_id, user_name, user_email FROM '.self::$table.' WHERE user_status = 1 AND user_email = :email AND user_pass = :password';
            
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':email', $post['email']);
            $stmt->bindValue(':password', md5($post['senha']));
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("E-mail ou senha incorreto");
            }
        }
    }

?>
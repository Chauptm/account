<?php
    class Database{

        const HOST ='localhost';
        const USERNAME ='root';
        const PASSWORD ='12345678';
        const DATABASE = 'accounts';

        public function getConnection(){
            $connect= mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);
            mysqli_set_charset($connect, "utf-8");
            if (mysqli_connect_errno()===0){
                // echo "ok";
                return $connect;
            }
            return false;
        }

        public function close($connect){
            mysqli_close($connect);
        }

    }
?>
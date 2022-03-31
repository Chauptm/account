<?php

    class BaseModel extends Database{
        protected $connect;

        public function __construct(){
            $this->connect= $this->getConnection();
        }


        public function _query($sql){
            return mysqli_query($this->connect,$sql);
        }

        public function find($table, $email, $password){
            $sql = "select * from {$table} where email = '{$email}' and password= '{$password}'";
            $query = $this->_query($sql);
            return mysqli_fetch_assoc($query);
        }

        public function update($table, $first_name, $last_name, $job_title, $company_name, $avatar, $id){
            $sql = "update {$table} set first_name= '{$first_name}',last_name = '{$last_name}', job_title = '{$job_title}',company_name = '{$company_name}', avatar= '{$avatar}' where id='{$id}'";
            return $this->_query($sql);
        }

        public function findById($table, $id){
            $sql = "select * from {$table} where id = '{$id}'";
            $query = $this->_query($sql);
            return mysqli_fetch_assoc($query);
        }


        public function insertUser($table, $email, $username, $first_name, $last_name, $avatar, $job_title, $company_name, $password, $verification_code){
            $sql ="insert into {$table} (email, username, first_name, last_name, avatar, job_title, company_name, password,created_at, verification_code) values ('{$email}','{$username}','{$first_name}','{$last_name}','{$avatar}','{$job_title}','{$company_name}','{$password}',NULL, '{$verification_code}')";
            return $this->_query($sql);
            
        }

        public function findByMail($email){
            $sql= "select * from SignUp where email ='{$email}'";
            $query = $this->_query($sql);
            return mysqli_num_rows($query);
        }

        public function findByUserName( $username){
            $sql= "select * from SignUp where username ='{$username}'";
            $query = $this->_query($sql);
            return mysqli_num_rows($query);
        }

        public function updateUser($table, $email, $verification_code){
            $sql= "update {$table} set created_at= NOW() where email= '{$email}' and verification_code= '{$verification_code}'";
            $query= $this->_query($sql);
            return mysqli_affected_rows($this->connect);
        }

        public function updatePassword($table, $email, $password){
            $sql= "update $table set password= '{$password}' where email = '{$email}'";
            $query= $this->_query($sql);
            return mysqli_affected_rows($this->connect);
        }

        public function updateVerificationCode($table, $email, $verification_code){
            $sql= "update $table set verification_code= '{$verification_code}' where email = '{$email}'";
            $query= $this->_query($sql);
            return mysqli_affected_rows($this->connect);
        }
    }
?>
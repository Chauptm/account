<?php
    require('BaseModel.php');
    class UserModel extends BaseModel{
        const TABLE='signup';
        public function login($email, $password){
            return $this->find(self::TABLE, $email, $password);
        }
        public function edit($first_name, $last_name, $job_title, $company_name, $avatar, $id){
            return $this->update(self::TABLE,$first_name, $last_name, $job_title, $company_name, $avatar, $id);
        }

        public function getData($id){
            return $this->findById(self::TABLE, $id);
        }

        public function signup($email, $username, $first_name, $last_name, $avatar, $job_title, $company_name, $password, $verification_code){
            return $this->insertUser(self::TABLE, $email, $username, $first_name, $last_name, $avatar, $job_title, $company_name, $password, $verification_code);
        }

        public function checkVerification($email, $verification_code){
            return $this->updateUser(self::TABLE, $email, $verification_code);
        }

        public function updateUserPassword($email, $password){
            return $this->updatePassword(self::TABLE, $email, $password);
        }
        public function updateUserVerification($email, $verification_code){
            return $this->updateVerificationCode(self::TABLE, $email, $verification_code);
        }
    }
?>
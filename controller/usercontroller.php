<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class User extends BaseController{
        private $user_model;
        private $mail;

        public function __construct(){
            $this->createModel('UserModel');
            $this->user_model= new UserModel;
            $this->mail= new Mail;
        }

        public function signupUser(){
            $error= array();
            $error['sendmail']=$error['gui_anh']= $error['check']= $error['insert']= NULL;
            if( isset($_POST['signup_user'])){
                $email= $_POST['email'];
                $num1= $this->user_model->findByMail($email);
                $username= $_POST['username'];
                $num2= $this->user_model->findByUserName($username);
                if ($num1==0 && $num2==0){
                    $first_name= $_POST['firstname'];
                    $last_name= $_POST['lastname'];

                    if (isset($_FILES['avatar'])){
                        $file_name = $_FILES['avatar']['name'];
                        $file = $_FILES['avatar']['tmp_name'];
                        $path = "Public/image/".$_FILES['avatar']['name'];
                        if(move_uploaded_file($file, $path)){
                            
                        }else{
                            $error['gui_anh']="Loi anh";
                            // echo "<script>alert('Send fail picture.')</script>";
                        }
                    }else {
                        $file_name='';
                    }
                    

                    $job= isset($_POST['job'])? $_POST['job'] : '';
                    $company= isset($_POST['company'])? $_POST['company'] : '';
                    $password= md5($_POST['password']);

                    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                    $subject = 'Email verification';
                    $body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                    $c= $this->mail->sendMail($email, $username,$subject,$body);

                    if($c) {
                        $query= $this->user_model->signup($email, $username, $first_name, $last_name, $file_name, $job, $company, $password, $verification_code);
                        if($query){
                            redirectEmail('user','verification', $email);  
                        }else {
                            $error['insert']="Khong them duoc user";
                            echo "<script>alert('No add user')</script>"; 
                        }
                    } else {
                        $error['sendmail']="Loi gui mail";
                        // echo "<script>alert('Send fail mail.')</script>";
                    }
                }else {
                    $error['check']="username or email already exists";
                    echo "<script>alert('Username or email already exists.')</script>"; 
                }
                
            }
            $this->createView('user','signup', $error);
        }

        public function verificationUser(){
            $error= array();
            $error['check_verification']=NULL;
            if(isset($_POST['verification_user'])){
                $email= $_POST['email'];
                $verification_code= $_POST['verification'];
                // echo $email;
                $rows= $this->user_model->checkVerification($email, $verification_code);

                if ($rows==0){
                    $error['check_verification']="Sai";
                    echo '<script>alert("Valid verification. Please try again.")</script>';
                }else {
                    // echo '<script>alert("Dang ky thanh cong")</script>';
                    redirect('user', 'login');
                }
            }
            $this->createView('user', 'verification', $error);
        }

        public function loginUser(){

            $error= array();
            $error['check']= $error['insert']= NULL;

            if(isset($_COOKIE['id'])){
                redirect('user','profile');
            }elseif (isset($_POST['login_user'])){
                $email= addslashes($_POST['email']);
                $password_post = addslashes($_POST['password']);
                $password=md5($password_post);
                $data= $this->user_model->login($email, $password);

                if (empty($data)){
                    echo "<script>alert('Email and password doesnt match.')</script>"; 
                }else if($data['created_at']== NULL){

                    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                    $subject = 'Email verification';
                    $body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                    $username= 'Reciver';
                    $c= $this->mail->sendMail($email, $username,$subject,$body);
                    if($c) {
                        $rows= $this->user_model->updateUserVerification($email, $verification_code);
                        if($rows>0){
                            redirectEmail('user','verification', $email);  
                        }else {
                            $error['insert']="Khong them duoc user";
                            echo "<script>alert('No update verification')</script>"; 
                        }
                    } else {
                        $error['sendmail']="Loi gui mail";
                        // echo "<script>alert('Send fail mail.')</script>";
                    }
                }else{
                    if (isset($_POST['logged'])){
                        setcookie('id', $data['id'], time()+ 86400*7);
                    }
                    session_set('id', $data['id']);
                    session_set('username', $data['username']);
                    session_set('email', $email);
                    session_set('first_name', $data['first_name']);
                    session_set('last_name', $data['last_name']);
                    session_set('avatar', $data['avatar']);
                    session_set('job_title', $data['job_title']);
                    session_set('company_name', $data['company_name']);
                    redirect('user','profile');  
                }
            }
            $this->createView('user','login', $error);
        }

        public function forgetpasswordUser(){
            $error=array();
            $error['checkemail']=$error['checksendmail']= NULL;
            if(isset($_POST['forgetpassword_user'])){
                // $inputcaptcha= isset($_POST['inputcaptcha'])? $_POST['inputcaptcha'] : '';
                // if ($inputcaptcha!= $_SESSION['captcha']){
                //     echo "<script>alert('Captcha fail')</script>"; 
                // }else {
                    $email= $_POST['email'];
                    $num= $this->user_model->findByMail($email);
                    if ($num!=0){
                        
                        $link= "<a href='".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?controller=user&action=accountpassword&email=".$email."'>Reset Password</a>";
                        $subject = 'Email reset password';
                        $body = 'Nhan vao link sau '.$link.'';
                        $username= 'Reciver';
                        $c= $this->mail->sendMail($email, $username,$subject,$body);
                        if($c) {
                            $error['checksendmail']="Gui mail thanh cong";
                            echo "<script>alert('Check mail')</script>"; 
                        } else {
                            $error['checksendmail']="Gui mail khong thanh cong";
                            echo "<script>alert('Fail')</script>"; 
                        }
                    }else{
                        redirect('user','signup');
                        echo "<script>alert('Email isn't exits')</script>"; 
                    }
                // }
                
                
            }
            $this->createView('user','forgetpassword',$error);
        }

        public function accountpasswordUser(){
            $error=array();
            $error['check']=NULL;
            if (isset($_POST['accountpassword_user'])){
                $password= md5($_POST['password']);
                $email= $_POST['email'];
                $rows= $this->user_model->updateUserPassword($email, $password);
                if ($rows>0){
                    redirect('user', 'login');
                }else {
                    $error['check']='Loi';
                }
            }
            $this->createView('user', 'accountpassword', $error);
        }
        public function profileUser(){
            $error= array();
            if(isset($_SESSION['id'])){
                if(isset($_POST['logout'])){
                    if(isset($_COOKIE['id'])){
                        setcookie('id', $_COOKIE['id'], time()-1);
                    }
                    session_delete();
                    redirect('user','login');
    
                }else if(isset($_POST['edit'])) {
                    if (isset($_FILES['avatar'])){
                        $file_name = $_FILES['avatar']['name'];
                        $file = $_FILES['avatar']['tmp_name'];
                        $path = "Public/image/".$_FILES['avatar']['name'];
                        if(move_uploaded_file($file, $path)){
                            session_set('avatar', $file_name);
                        }else{
                            echo '<script>alert("Edit that bai)</script>';
                        }
                    }else {
                        $file_name = $_SESSION['avatar'];
                    }
                    $query= $this->user_model->edit($_POST['first_name'],$_POST['last_name'],$_POST['job_title'],$_POST['company_name'],$file_name, $_SESSION['id']);
                    if ($query){
                        $data= $this->user_model->getData($_SESSION['id']);
                        session_set('first_name', $data['first_name']);
                        session_set('last_name', $data['last_name']);
                        session_set('job_title', $data['job_title']);
                        session_set('company_name', $data['company_name']);
                        redirect('user','profile');
                    }else {
                        echo '<script>alert("Edit that bai)</script>';
                    }
                } 
                $this->createView('user','profile',$error);
            }else {
                redirect('user','login');
            }
        }
    }
?>
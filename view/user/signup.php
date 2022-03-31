<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/user/login/style.css" >
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function(){

            $('#error_email').hide();
            var validate_email= true;
            $('#email').keyup(function(){
                validateEmail();
            });
            function validateEmail(){
                var regex= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var email= $('#email').val().trim();
                if(!email || !regex.test(email)){
                    $('#error_email').show();
                    validate_email=false;
                    return false;
                }else {
                    validate_email= true;
                    $('#error_email').hide();
                }
            };
            $('#error_username').hide();
            $('#username').keyup(function(){
                validateUserName();
            });
            var validate_username= true;
            function validateUserName(){
                var username= $('#username').val().trim();
                if(username.trim()==0){
                    $('#error_username').show();
                    validate_username=false;
                    return false;
                }else {
                    validate_username= true;
                    $('#error_username').hide();
                }
            }

            $('#error_firstname').hide();
            $('#firstname').keyup(function(){
                validateFirstName();
            });
            var validate_firstname= true;
            function validateFirstName(){
                var firstname= $('#firstname').val().trim();
                if(firstname.trim()==0){
                    $('#error_firstname').show();
                    validate_firstname=false;
                    return false;
                }else {
                    validate_firstname= true;
                    $('#error_firstname').hide();
                }
            }

            $('#error_lastname').hide();
            $('#lastname').keyup(function(){
                validateLastName();
            });
            var validate_lastname= true;
            function validateLastName(){
                var lastname= $('#lastname').val().trim();
                if (!lastname.trim()){
                    $('#error_lastname').show();
                    validate_lastname=false;
                    return false;
                }else {
                    validate_lastname= true;
                    $('#error_lastname').hide();
                }
            }

            $('#error_password').hide();
            $('#password').keyup(function(){
                validatePassword();
            });
            var validate_password= true;
            function validatePassword(){
                var password= $('#password').val();
                if (!password){
                    $('#error_password').text('Invalid password. Please try again.');
                    $('#error_password').show();
                    validate_password=false;
                    return false;
                }else if (password.length <3 || password.length >10){
                    $('#error_password').text('Length of username must be between 3 and 10');
                    $('#error_password').show();
                    validate_password=false;
                    return false;
                } else {
                    validate_password= true;
                    $('#error_password').hide();
                }
            }

            $('#error_cpassword').hide();
            $('#cpassword').keyup(function(){
                validateCPassword();
            });
            var validate_cpassword=true;
            function validateCPassword(){
                var password= $('#password').val();
                var cpassword= $('#cpassword').val();

                if (cpassword!=password){ 
                    $('#error_cpassword').show();
                    validate_cpassword=false;
                    return false;
                }else {
                    validate_cpassword=true;
                    $('#error_cpassword').hide();
                }
            };

            $('#submitsignup').click(function(e){
                validateEmail();
                validateUserName();
                validateFirstName();
                validateLastName();
                validatePassword();
                validateCPassword();
                if (validate_email == true && validate_username== true && validate_firstname== true && validate_lastname== true && validate_password== true && validate_cpassword== true){
                    return true;
                }else 
                    return false;
            });
        });

        function redirectHref(u){
            window.location=window.location.pathname+''+u;
            
         }
    </script>



</head>
<body>
    <div id="master" class="wf">
        <div id="page">
            <div id="auth" class="auth">
                <div class="box-wrap">
                    <div class="auth-logo">
                        <a href="https://base.vn/" target="_blank"><img src="Public/image/logo.full.png" alt="logo"></a>
                    
                    </div>

                    <div class="box">
                        <h1>Sign Up</h1>
                        <p class= "title">Welcome back. Sign Up to start working.</p>
                        <div class= "form">
                            <form action="" method="POST" id="form-1" enctype='multipart/form-data' >
                                <div class="row">
                                    <div class="label">Email</div>
                                    <div class="input">
                                        <input type="text" id="email" onfocus="this.value=''" name="email" placeholder="Your email" sytle="color=#FFF00" id="email" >
                                        <div id="error_email">Invalid or empty email. Please try again.</div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">Username</div>
                                    <div class="input">
                                        <input type="text" id="username" onfocus="this.value=''" name="username" placeholder="Your username" sytle="color=#FFF00" id="username">
                                        <div id="error_username">Invalid or empty username. Please try again.</div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">First Name</div>
                                    <div class="input">
                                        <input type="text" id="firstname" onfocus="this.value=''" name="firstname" placeholder="Your first name" sytle="color=#FFF00" id="firstname">
                                        <div id="error_firstname">Invalid or empty firstname. Please try again.</div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">Last Name</div>
                                    <div class="input">
                                        <input type="text" id="lastname" onfocus="this.value=''" name="lastname" placeholder="Your last name" sytle="color=#FFF00" id="lastname">
                                        <div id="error_lastname">Invalid or empty lastname. Please try again.</div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">Avatar</div>
                                    <div class="input">
                                        <input type="file" name="avatar" id="">
                                        <div id="error_email"></div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">Job</div>
                                    <div class="input">
                                        <input type="text" id="job" onfocus="this.value=''" name="job" placeholder="Your job" sytle="color=#FFF00" id="job">
                                        <div id="error_job"></div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">Company</div>
                                    <div class="input">
                                        <input type="text" id="company" onfocus="this.value=''" name="company" placeholder="Your company" sytle="color=#FFF00" id="company">
                                        <div id="error_company"></div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label">Password</div>
                                    <div class="input">
                                        <input type="password" id="password" onfocus="this.value=''" name="password" placeholder="Your password" id="password" autocomplete="on">
                                        <div id="error_password">Invalid password. Please try again.</div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="label">Confirm Password</div>
                                    <div class="input">
                                        <input type="password" id="cpassword" onfocus="this.value=''" name="cpassword" placeholder="Your confirm password" id="cpassword" autocomplete="on">
                                        <div id="error_cpassword">Password didn't match. Please try again.</div>
                                    </div>
                                    
                                </div> 

                                <div class= "row relative xo">
                                    <!-- <div class="checkbox">
                                        <input type="checkbox" id= "logged" name="logged" value="logged">&nbsp; Keep me logged in
                                    </div> -->
                                    <div class="label"><span class= "a right normal url" onclick="redirectHref('?controller=user&action=login')">Login</span></div>
                                    <div class="submit">
                                        <input type="submit" value="Sign up to start working" name="signup_user" id="submitsignup" >
                                    </div>
                                    <div>
                                        <?php 
                                            if (isset($error['check'])){
                                                echo $error['check'];
                                            }
                                        ?>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        
    ?>
</body>
</html>
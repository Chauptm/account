<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/user/login/style.css">
    <title>Login</title>
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

            $('#submit').click(function(e){
                validateEmail();
                validatePassword();
                if (validate_email == true && validate_password== true){
                    return true;
                }else 
                    return false;
            });
        })
         
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
                        <h1>Login</h1>
                        <p class= "title">Welcome back. Login to start working.</p>
                        <div class= "form">
                            <form action="" method="POST" id="form-1" onsubmit ="return validateForm();" >
                                <div class="row">
                                    <div class="label">Email</div>
                                    <div class="input">
                                        <input type="text" id="email" onfocus="this.value=''" name="email" placeholder="Your email" sytle="color=#FFF00" id="email">
                                        <div id="error_email">Invalid or empty email. Please try again.</div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="label"><span class= "a right normal url" onclick="redirectHref('?controller=user&action=forgetpassword')">Forget your password?</span>Password</div>
                                    <div class="input">
                                        <input type="password" id="password" onfocus="this.value=''" name="password" placeholder="Your password" id="password" autocomplete="on">
                                        <div id="error_password">Invalid password. Please try again.</div>
                                    </div>
                                    
                                </div> 

                                <div class= "row relative xo">
                                    <div class="checkbox">
                                        <input type="checkbox" id= "logged" name="logged" value="logged">&nbsp; Keep me logged in
                                    </div>
                                    <div class="label"><span class= "a right normal url" onclick="redirectHref('?controller=user&action=signup')">Create account?</span></div>
                                    <div class="submit">
                                        <input type="submit" value="Login to start working" name="login_user" id="submit">

                                    </div>
                

                                    <div class="oauth">
                                        <div class="label"><span>Or, login via single sign-on</span></div>
                                
                                        <a  class="aa a-left" href="http://" >Login with Google</a>
                                        <a class="aa a-left" href="http://">Login with Microsoft</a>
                                        <div class="aa a-left" >Login with SAML</div>
                                    </div>    
                                </div>
                            </form>
                        </div>
                        <div class="extra to">
                            <div class="simple">
                                <a href="http://"> Login with Guest/Client access?</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/user/login/style.css">
    <title>Forget Password</title>
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

            var checkcaptcha= true;
            function checkCaptcha(){
                var captcha= $('#captcha').val();
                var inputcaptcha = $('#inputcaptcha').val();
                if (captcha!= inputcaptcha){
                    checkcaptcha= false;
                    alert('Captcha fail');
                }else {
                    checkcaptcha= true;
                }
            }
            
            $('#submit').click(function(e){
                    validateEmail();
                    checkCaptcha();
                    if (validate_email == true && checkcaptcha== true){
                        return true;
                    }else
                        return false;
            });
        })
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
                        <h1>Password Recovery</h1>
                        <p class= "title">Please enter your information. A password recovery hint will be sent to your email.</p>
                        <div class= "form">
                            <form action="" method="POST" id="form-1" >
                                <div class="row">
                                    <div class="label">Email</div>
                                    <div class="input">
                                        <input type="text" id="email" onfocus="this.value=''" name="email" placeholder="Your email" sytle="color=#FFF00">
                                        <div id="error_email">Invalid or empty email. Please try again.</div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="label">Captcha</div>
                                    <div class="input">
                                        <!-- <button>haha</button> -->
                                        <input type="text" id="captcha"  sytle="color=#FFF00"  value= "<?php echo $_SESSION['captcha']?>" readonly>
                                        <input type="text" id="inputcaptcha" onfocus="this.value=''" name="inputcaptcha" placeholder="Your captcha" sytle="color=#FFF00" >
                                        <!-- <img src="lib/captcha.php"> -->
                                    </div>
                                   
                                </div>
                                

                                <div class= "row relative xo">
                                    <div class="submit">
                                        <input type="submit" value="Recover password" name="forgetpassword_user" id="submit">
                                    </div>
                
                                </div>
                            </form>
                        </div>
                        <div class="extra to">
                            <div class="simple">
                                <a herf=""> Login now if your company was already on Base Account</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
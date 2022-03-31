<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/user/login/style.css">
    <title>Reser password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
            $('#error_password').hide();
            $('#password').keyup(function(){
                validatePassword();
            });
            var validate_password= true;
            function validatePassword(){
                var password= $('#password').val();
                if (password==0){
                    $('#error_password').show();
                    validate_password=false;
                    return false;
                }else {
                    validate_password= true;
                    $('#error_password').hide();
                }
            }
            $('#submit').click(function(e){
                    validatePassword();
                    if (validate_password == true ){
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
                        <h1>Account password recovery</h1>
                        <p class= "title"></p>
                        <div class= "form">
                            <form action="" method="POST" id="form-1" onsubmit ="return validateForm();" >
                                <div class="row">
                                    <div class="label">New password</div>
                                    <div class="input">
                                        <input type="password" id="password" onfocus="this.value=''" name="password" placeholder="Your new password" sytle="color=#FFF00" id="password">
                                        <div id="error_password">Invalid password. Please try again.</div>
                                        <input type="hidden" name='email' value= <?php echo $_GET['email']?>>
                                    </div>
                                   
                                </div>
                                

                                <div class= "row relative xo">
                                    <div class="submit">
                                        <input type="submit" value="Reset password" name="accountpassword_user" id="submit">
                                    </div>
                
                                </div>
                            </form>
                        </div>
                        <div class="extra to">
                            <div class="simple">
                                <a href="http://"> Login now if your company was already on Base Account</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
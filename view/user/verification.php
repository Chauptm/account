<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/user/login/style.css" >
    <title>Verification</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
            $('#error_verification').hide();
            var validate_verification= true;
            $('#verification').keyup(function(){
                validateVerification();
            });
            function validateVerification(){
                var verification= $('#verification').val().trim();
                if(!verification){
                    $('#error_verification').show();
                    validate_verification=false;
                    return false;
                }else {
                    validate_verification= true;
                    $('#error_verification').hide();
                }
            };
            
            $('#submitverification').click(function(e){
                    validateVerification();
                    if (validate_verification == true ){
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
                        <h1>Verification</h1>
                        <p class= "title">Welcome back. Verification to start working.</p>
                        <div class= "form">
                            <form action="" method="POST" id="form-1" >
                                <div class="row">
                                    <div class="label">Verification-code</div>
                                    <div class="input">
                                        <input type="text" id="verification" onfocus="this.value=''" name="verification" placeholder="Your verification" sytle="color=#FFF00" id="verification">
                                        <div id="error_verification">Empty verification. Please try again.</div>
                                        <input type="hidden" name='email' value= <?php echo $_GET['email']?>>
                                    </div>
                                   
                                </div>
                                
                                <div class= "row relative xo">
                                    <!-- <div class="checkbox">
                                        <input type="checkbox" id= "logged" name="logged" value="logged">&nbsp; Keep me logged in
                                    </div> -->
  
                                    <div class="submit">
                                        <input type="submit" value="Verification to start working" name="verification_user" id="submitverification">
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
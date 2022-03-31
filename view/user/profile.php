<?php if (!defined('IN_SITE')) die('The request not found'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/user/profile/style.css" >
    <title>Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#error_firstname').hide();
            $('#first_name').keyup(function(){
                validateFirstName();
            });
            var validate_firstname= true;
            function validateFirstName(){
                var firstname= $('#first_name').val().trim();
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
            $('#last_name').keyup(function(){
                validateLastName();
            });
            var validate_lastname= true;
            function validateLastName(){
                var lastname= $('#last_name').val().trim();
                if (!lastname.trim()){
                    $('#error_lastname').show();
                    validate_lastname=false;
                    return false;
                }else {
                    validate_lastname= true;
                    $('#error_lastname').hide();
                }
            }

            $('#error_job').hide();
            $('#job_title').keyup(function(){
                validateJob();
            });
            var validate_job= true;
            function validateJob(){
                var job= $('#job_title').val().trim();
                if (!job.trim()){
                    $('#error_job').show();
                    validate_job=false;
                    return false;
                }else {
                    validate_job= true;
                    $('#error_job').hide();
                }
            }

            $('#error_company').hide();
            $('#company_name').keyup(function(){
                validateCompany();
            });
            var validate_company= true;
            function validateCompany(){
                var company= $('#company_name').val().trim();
                if (!company.trim()){
                    $('#error_company').show();
                    validate_company=false;
                    return false;
                }else {
                    validate_company= true;
                    $('#error_company').hide();
                }
            }

            $('#edit').submit(function(e){
                validateFirstName();
                validateLastName();
                validateJob();
                validateCompany();
                if ( validate_firstname== true && validate_lastname== true && validate_job== true && validate_company== true){
                    return true;
                }else 
                    return false;
            });
        });
    </script>
</head>
<body>
    <div id='page'>
        <div id='base-panel' class='ext -more'>
            <div class="footer">
                <div class="item">
                    <form action="" method="post">
                        <input onclick="return confirm('Ban co muon dang xuat khong?')" type="submit" value="Dang xuat" name="logout" id='logout'>
                    </form>
                </div>
            </div>
        </div>
        <div id='document'>
            <div id='master'>
                <!-- <div id="menuw">
                    <div id= 'menu'>
                    
                    </div>
                </div> -->
                <div  id="page-main">
                    <div class= "apptitle">
                        <div class="cta url" onclick="openForm()">
                            <span class="-ap"></span> &nbsp; Chinh sua tai khoan
                        </div>

                        <div class="back url">
                            <div class="label">Tai khoan</div>
                            <div class="title"><?php echo $_SESSION['last_name'].' '. $_SESSION['first_name']?></div>
                        </div>
                    </div>
                    <div id="profile">
                        <div class="main">
                            <div class="image uploadable">
                                <?php
                                    if ($_SESSION['avatar']==""){
                                        echo '<img src="public\image\images.png" alt="">';
                                    }else {
                                        echo '<img src="public/image/'.$_SESSION['avatar'].'" alt="">';
                                    }
                                ?>
                            </div>
                            <div class="text">
                                <div class="title"><?php echo $_SESSION['last_name'].' '. $_SESSION['first_name']?></div>
                                <div class="subtitle"><?php echo $_SESSION['job_title']?></div>
                                <div class="info">
                                    <b>Dia chi email</b> <?php echo $_SESSION['email']?>
                                </div>
                                <div class="info">
                                    <b>Username</b> <?php echo $_SESSION['username']?>
                                </div>
                            </div>
                        </div>
                        <div class="list">
                            <div class="title">Thong tin lien he</div>
                        </div>
                        <div class="list">
                            <div class="contact-info">
                                <b>Cong viec</b>
                                <span class="v"> <?php echo $_SESSION['job_title']?></span>
                            </div>
                        
                        </div>
                        <div class="list">
                            <div class="contact-info">
                                <b>Cong ty</b>
                                <span class="v"><?php echo $_SESSION['company_name']?></span>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="form-popup" id="myForm">
        <form action="" class="form-container" method="post"enctype='multipart/form-data'>
            <h1>Edit profile</h1>
            <div class="form-rows">
                <div class="row-index">
                    <div class="label">First Name</div>
                    <input type="text" class="text-label" name="first_name" id="first_name" value="<?php echo $_SESSION['first_name']?>">
                    <div id="error_firstname">Empty firstname. Please try again.</div>
                </div>
                <div class="row-index">
                    <div class="label">Last Name</div>
                    <input type="text" class="text-label" name="last_name" id="last_name" value="<?php echo $_SESSION['last_name']?>">
                    <div id="error_lastname">Empty lastname. Please try again.</div>
                </div>
                <div class="row-index">
                    <div class="label">Username</div>
                    <input type="text" class="text-label" name="username" id="username" value="<?php echo $_SESSION['username']?>" disabled>
                </div>
                <div class="row-index">
                    <div class="label">Avatar</div>
                    <input type="file" class="text-label" name="avatar" id="avatar" value="<?php echo $_SESSION['avatar']?>" >
                </div>
                <div class="row-index">
                    <div class="label">Email</div>
                    <input type="text" class="text-label" name="email" id="email" value="<?php echo $_SESSION['email']?>"disabled >
                </div>
                <div class="row-index">
                    <div class="label">Cong viec</div>
                    <input type="text" class="text-label" name="job_title" id="job_title" value="<?php echo $_SESSION['job_title']?>">
                    <div id="error_job">Empty job. Please try again.</div>
                </div>
                <div class="row-index">
                    <div class="label">Cong ty</div>
                    <input type="text" class="text-label" name="company_name" id="company_name" value="<?php echo $_SESSION['company_name']?>">
                    <div id="error_company">Empty company. Please try again.</div>
                </div>
            </div>
            <div class="form-button">
                <button type="submit" class="btn" id="edit" name= "edit">Edit</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </div>
        </form>
    </div>
    <script>
        function openForm() {
            document.getElementById("page").style.opacity=0.2;
            document.getElementById("myForm").style.display = "block";

        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("page").style.opacity=1;
        }
    </script> 
</body>
</html>
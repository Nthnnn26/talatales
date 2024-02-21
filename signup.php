<?php 
include'config.php';
if(!empty($_SESSION['user_id'])) {
    header("location: user/home.php");
}

if(isset($_POST['signup_btn'])) {
    $email = mysqli_real_escape_string($dbcon, $_POST['EmailAddress']);
  	$password = ($_POST['PassWord']);
    $avatar = '';
    $name = '';
    $code = 0;
    $check_email = mysqli_query($dbcon, "SELECT * FROM `tbl_user` WHERE EmailAddress = '$email'");

    if(mysqli_num_rows($check_email) > 0){
        $error = 'Email already exist';  
    } else {
        $insert = mysqli_query($dbcon,"INSERT INTO `tbl_user` (EmailAddress, PassWord, Avatar, Name, code) VALUES ('$email', '$password', '$avatar', '$name', '$code')");
    
        if($insert) {
            $_SESSION['info'] = "Created account successfully";
            header('location: login.php');
            exit(); 
        }
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TalaTales Sign-up</title>
        <!---CSS LINK--->
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <style>
           p {
                font-size: 80px;
                color: #6C628D;
           }
           .custom-btn {
                width: 150px;
                background-color: #6C628D;
                color: whitesmoke;
           }
           .custom-btn:hover {
                background-color: #6C628D;
                color: whitesmoke;
                transform: scale(1.1); 
                transition: transform 0.3s ease;
            }
            form {
                width: 100%;

            }
            .text-color {
                color: #6C628D;
            }
            @media (max-width: 576px) {
                .custom-btn {
                    width: 100px;
                    height: auto;                
                    padding: 5px;
                    margin-right: 15px;
                }
                form {
                    max-width: 100%; /* Remove the maximum width on smaller screens */
                }
            }
        
        </style>
    </head>

    <body class="bg-primary-subtle">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row vh-100">
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="row align-items-center">
                        <strong><p>TalaTales</p></strong>
                    </div>
                    <form action="" method="post";>
                        <?php if(isset($msg)):?>
                            <div class="alert alert-success text-center"><h6><?php echo $msg;?></h6></div>
                        <?php endif;?>
                        <?php if(isset($error)):?>
                            <div class="alert alert-danger text-center"><h6><?php echo $error;?></h6></div>
                        <?php endif;?>
                        <div class="input-group mb-3">
                            <input type="email" name="EmailAddress" class="form-control form-control-lg bg-light"" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="PassWord" class="form-control form-control-lg bg-light" placeholder="Password" required>
                        </div>
                        <div class="row mb-3">
                        <a href="login.php" class="text-color">Already have an account?</a>
                        </div>
                        <div class="row">
                            <button type="submit" name="signup_btn" class="btn btn-lg ms-auto custom-btn">Sign up</button>
                        </div>
                    
                    </form>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column right-box mt-auto">
                    <div class="featured-image">
                        <img class="img-fluid" src="img/Tala.svg" alt="SVG Image">
                    </div>
                                   
                </div>
            </div>
        </div>
    </body>
    
</html>
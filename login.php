<?php 
include'config.php';
if(!empty($_SESSION['user_id'])) {
    header("location: user/home.php");
}

if(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($dbcon, $_POST['EmailAddress']);
  	$password = ($_POST['PassWord']);
    $check_account = "SELECT * FROM tbl_user WHERE EmailAddress = '$email' AND PassWord = '$password'";
    $res = mysqli_query($dbcon, $check_account);

    if(mysqli_num_rows($res) > 0){
        $userData = mysqli_fetch_assoc($res);

        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['email'] = $userData['EmailAddress'];
        $_SESSION['avatar'] = $userData['Avatar'];
        $_SESSION['name'] = $userData['Name'];
        if ($_SESSION['avatar'] == "") {
            header("location: choose-avatar.php");
            exit;
        } elseif ($_SESSION['name'] == "") {
            header("location: choose-avatar.php");
            exit;
        } else {
            header("location: user/home.php");
            exit;
        }
    } else {
        $msg = 'Email or Password does not matched'; 
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log-in</title>
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
                        <form action="" method="post">
                            <?php if(isset($msg)):?>
                                <div class="alert alert-danger text-center"><h6><?php echo $msg; ?></h6></div>
                            <?php elseif (isset($_SESSION['info'])): ?>
                                <div class="alert alert-success text-center"><h6><?php echo $_SESSION['info']; unset($_SESSION['info']);?></h6></div>
                            <?php endif;?>
                            <div class="input-group mb-3">
                                <input type="email" name="EmailAddress" class="form-control form-control-lg bg-light"" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="PassWord" class="form-control form-control-lg bg-light" placeholder="Password" required>
                            </div>
                            <div class="row">
                            <a href="forgotpassword.php" class="text-color">Forgot password?</a>
                            </div>
                            <div class="row mb-3">
                            <a href="signup.php" class="text-color">Don't have an account?</a>
                            </div>
                            <div class="row">
                                <button type="submit" name="login_btn" class="btn btn-lg ms-auto custom-btn">Log In</button>
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
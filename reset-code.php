<?php
include'config.php';
if(!empty($_SESSION['user_id'])) {
    header("location: user/home.php");
}

if(isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($dbcon, $_POST['otp']);
    $check_code = "SELECT * FROM tbl_user WHERE code = $otp_code";
    $code_res = mysqli_query($dbcon, $check_code);

    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['EmailAddress'];
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['info'] = "Create your new password.";
        header('location: new-password.php');
        exit();
    } else {
        $error = "You've entered incorrect code!";
    }
}

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Verification</title>
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
                        <?php if(isset($error)):?>
                            <div class="alert alert-danger text-center"><h6><?php echo $error; ?></h6></div>
                        <?php elseif (isset($_SESSION['info'])): ?>
                            <div class="alert alert-success text-center"><h6><?php echo $_SESSION['info'];?></h6></div>
                        <?php endif;?>
                        
                        <div class="input-group mb-3">
                            <input type="number" name="otp" class="form-control form-control-lg bg-light"" placeholder="Enter your verification code" required>
                        </div>
                        <div class="row mb-3">
                        <a href="login.php" class="text-color">Log in account?</a>
                        </div>
                        <div class="row">
                            <button type="submit" name="check-reset-otp" class="btn btn-lg ms-auto custom-btn">Submit</button>
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
<?php
include'config.php';
if(!empty($_SESSION['user_id'])) {
    header("location: user/home.php");
}

if(isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    $cpassword = mysqli_real_escape_string($dbcon, $_POST['cpassword']);

    if($password !== $cpassword){
        $error = "Confirm password not matched!";
    } else{
        $code = 0;
        $email = $_SESSION['EmailAddress'];
        $encpass = ($password);
        $update_pass = "UPDATE tbl_user SET code = $code, PassWord = '$encpass' WHERE EmailAddress = '$email'";
        $run_query = mysqli_query($dbcon, $update_pass);
        if($run_query){
            $_SESSION['info'] = "Your password changed. Now you can login with your new password.";
            header('Location: login.php');
            exit();
        } else{
            $error = "Failed to change your password!";
        }
    }
}

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New password</title>
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
                            <input type="password" name="password" class="form-control form-control-lg bg-light"" placeholder="Create new password" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="cpassword" class="form-control form-control-lg bg-light"" placeholder="Confirm your password" required>
                        </div>
                        <div class="row mb-3">
                        <a href="login.php" class="text-color">Log in account?</a>
                        </div>
                        <div class="row">
                            <button type="submit" name="change-password" class="btn btn-lg ms-auto custom-btn">Submit</button>
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
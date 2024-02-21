<?php 
include'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



if(isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($dbcon, $_POST['EmailAddress']);
    $check_email = "SELECT * FROM tbl_user WHERE EmailAddress='$email'";
    $result = mysqli_query($dbcon, $check_email);

    if(mysqli_num_rows($result) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE tbl_user SET code = $code WHERE EmailAddress = '$email'";
        $_SESSION['session_code'] = $code;
        $run_query =  mysqli_query($dbcon, $insert_code);
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'SMTP.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'talatales.website@gmail.com';
        $mail->Password = 'dgfr wlfk blna pnuo';

        $mail->setFrom('talatales.website@gmail.com', 'TalaTales');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'TalaTales verification code';
        $mail->Body = "<p>Your password verification code is:</p><h1>$code</h1>\n
        Please do not share this code with anyone.<br>
        <br>
        If this wasn't you, please ignore this email!";

        if ($mail->send()) {
            $_SESSION['info'] = "We've sent a verification code to your email - $email.";
            $_SESSION['email'] = $email;
            header('location: reset-code.php');
            exit();
        } else {
            $error = 'Something went wrong!'; 
        }
 
    } else {     
        $error = 'This email address does not exist!';       
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forgot-password</title>
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
                            <div class="alert alert-danger text-center"><h6><?php echo $error;?></h6></div>
                        <?php endif;?>
                        <div class="input-group mb-3">
                            <input type="email" name="EmailAddress" class="form-control form-control-lg bg-light"" placeholder="Email" required>
                        </div>
                        <div class="row mb-3">
                        <a href="login.php" class="text-color">Log in account?</a>
                        </div>
                        <div class="row">
                            <button type="submit" name="check-email" class="btn btn-lg ms-auto custom-btn">Submit</button>
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
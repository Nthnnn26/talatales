<?php 
include'config.php';
if(empty($_SESSION['user_id'])){
    header("Location: ./index.php");
    exit;
}

$email = $_SESSION['email'];
$check_account = "SELECT * FROM tbl_user WHERE EmailAddress = '$email'";
$res = mysqli_query($dbcon, $check_account);

    if(mysqli_num_rows($res) > 0){
        $userData = mysqli_fetch_assoc($res);

        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['email'] = $userData['EmailAddress'];
        $_SESSION['avatar'] = $userData['Avatar'];
        $_SESSION['name'] = $userData['Name'];
        
    }
    
    $avatar = $_SESSION['avatar'];

if(isset($_POST['submit'])) {
    $name = ($_POST['nickname']);

    $update = "UPDATE tbl_user SET Name = '$name' WHERE EmailAddress = '$email'";
    $run_query = mysqli_query($dbcon, $update);
    if($run_query) {
        $check_account = "SELECT * FROM tbl_user WHERE EmailAddress = '$email'";
        $res = mysqli_query($dbcon, $check_account);
        $userData = mysqli_fetch_assoc($res);
        $_SESSION['name'] = $userData['Name'];
        header('Location: greetings.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TalaTales</title>
        <!---CSS LINK--->
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .text-color input::placeholder {
            color: #1A3057; 
            text-align: center;   
                    
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
    </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-transparent fixed-top">
            <div class="container">
                <img class="img-fluid" style="width: 150px" src="img/Logo(Multicolor).svg" alt="SVG Image">              
            </div>
        </nav>
        <div class="container d-flex justify-content-center align-items-center vh-100" style="max-width: 400px;">
            <div class="row justify-content-center align-items-center">
                <div class="text-center">
                    <img src="<?php echo $avatar; ?>" class="img-fluid" alt="SVG Image">  
                </div>  
                <form action="" method="post">         
                <div class="row mb-3 text-color">
                    <input type="name" name="nickname" class="form-control form-control-lg" style="background-color: #DEE0F3;" placeholder="Write your nickname" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-info btn-lg custom-btn">Submit</button>
                </div>
                </form>  
            </div>
        </div>
    </body>
</html>
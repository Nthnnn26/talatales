<?php 
include'config.php';
if(empty($_SESSION['user_id'])){
    header("Location: ./index.php");
    exit;
}

if(isset($_POST['lets_go'])) {
    $_SESSION['new_user'] = 'new';
    header("location: user/home.php");
    exit();
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
            .custom-btn {
                width: 200px;
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
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row vh-100">
                <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                    <div class="row align-items-center">
                        <strong><h1 style="color: #1A3057;">Hello! <?php echo $_SESSION['name']; ?>.</h1></strong>
                    </div>
                    <div class="row align-items-center">
                        <strong><h4 style="color: #1A3057;">We are excited to be your reading friend, Before we can start, I will tour you around the website.</h4></strong>
                    </div>
                    <div class="row text-center">
                        <img src="<?php echo $_SESSION['avatar']; ?>" class="img-fluid" alt="SVG Image"> 
                    </div>
                    <form action="" method="post">
                        <div class="row text-center">
                            <button type="submit" name="lets_go" class="btn btn-lg custom-btn">Sure! Let's go</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
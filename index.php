<?php
include'config.php';
if(!empty($_SESSION['user_id'])) {
    header("location: user/");
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
        .customBtn {
                font-size: 3em;
            }
        .nav-link {
            font-size: 24px;
            color: lightblue;
            outline-color: black;
            margin-left: 20px;
        }
        .nav-link:focus, .nav-link:hover {
            border-bottom: 2px solid #1A3057;
            color:#1A3057;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 2833, 2833, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")
        }
        @media (max-width: 576px) {
            .customBtn {
                font-size: 2em;
            }
            .sidebar {
                background-color: rgb(255, 255, 255, 0.15);
                backdrop-filter: blur(16px);    
            }
            .logo {
                font-size: 40px;              
            }
        }
    </style>
    </head>

    <body class="index vh-100 overflow-hidden">  
        <div class="d-flex justify-content-center align-items-center text-center fixed-bottom mb-5">
        <a href="./user/home.php" class="btn btn-outline-info bg-light btn-block btn-lg customBtn" style="color: #1A3057;">
            CLICK TO READ
        </a>
        </div>
      
        <nav class="navbar navbar-expand-lg bg-transparent fixed-top">
            <div class="container">
                <h1 class="logo">TalaTales</h1>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header text-lighblue border-bottom">
                        <h1 class="logo" id="offcanvasNavbarLabel">TalaTales</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
       
    </body>
</html>
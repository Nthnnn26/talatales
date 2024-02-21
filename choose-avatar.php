<?php
include'config.php';
if(empty($_SESSION['user_id'])){
    header("Location: ./index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Choose Avatar</title>
        <!---CSS LINK--->
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .img-fluid:hover {
            transform: scale(1.1); 
            transition: transform 0.3s ease;
            cursor: pointer;
        }
    </style>
    </head>

    <body>
        <header class="text-center mt-3">
            <h1 style="color: #1A3057;">Choose Your Avatar</h1>
        </header>
        <div class="container d-flex flex-md-column flex-sm-row justify-content-center align-items-center h-100">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="img/Bird.svg" class="img-fluid profile-image" alt="Bird" onclick="insertImage('img/Bird.svg')">
                </div>
                <div class="col-md-4 text-center">
                    <img src="img/Cat.svg" class="img-fluid profile-image" alt="Cat" onclick="insertImage('img/Cat.svg')">
                </div>
                <div class="col-md-4 text-center">
                    <img src="img/Dog.svg" class="img-fluid profile-image" alt="Dog" onclick="insertImage('img/Dog.svg')">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="img/Fox.svg" class="img-fluid profile-image" alt="Fox" onclick="insertImage('img/Fox.svg')">
                </div>
                <div class="col-md-4 text-center">
                    <img src="img/Koala.svg" class="img-fluid profile-image" alt="Koala" onclick="insertImage('img/Koala.svg')">
                </div>
                <div class="col-md-4 text-center">
                    <img src="img/Rabbit.svg" class="img-fluid profile-image" alt="Rabbit" onclick="insertImage('img/Rabbit.svg')">
                </div>
            </div>
    </div>
    <script>
    function insertImage(imagePath) {
        $.ajax({
            type: 'POST',
            url: 'function.php', // Update the path to your PHP script
            data: { imagePath: imagePath },
            success: function(response) {
                // Handle the response from the server if needed
                console.log(response);
                window.location.href = 'setup-name.php';
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>
</body>
</html>
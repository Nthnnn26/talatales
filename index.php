<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TalaTales</title>
        <!---CSS LINK--->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <style>
            header {
                position: fixed;
                right: 0;
                top: 0;
                z-index: 1000;
                width: 100vw;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 2%;
                background: transparent;
            }

            .logo {
                font-size: 30px;
                font-weight: 700;
                color: white;
            }

            .navlist {
                display: flex;
            }

            .navlist a {
                color: lightblue;
                text-shadow: black;
                margin-left: 60px;
                font-size: 20px;
                font-weight: 600;
                border-bottom: 2px solid transparent;
                transition: all .55s ease;
            }

            .navlist a:hover {
                border-bottom: 2px solid white;
            }

            #menu-icon {
                color: white;
                font-size: 35px;                                                                        
                padding: 5px;
                z-index: 10001;
                cursor: pointer;
                display: none;
            }

            @media only screen and (max-width: 767px) {
                #menu-icon {
                    display: block;
                    cursor: pointer;   
                }
                .logo {
                    margin-left: 10px;
                }
                .navlist {
                    position: absolute;
                    width: 300px;
                    height: auto;
                    padding: 5px;
                    top: 100%;
                    right: -100%;                                                                                                                      
                    display: flex;
                    text-align: center;
                    flex-direction: column;
                    backdrop-filter: blur(32px);
                    transition: all .6s ease-in-out;
                }
                .navlist a {
                    display: block;
                    padding: 0;
                    margin: 0px 0px 24px 0px;
                }
                .navlist.open {
                    right: 0;
                }
            }

            .hero {
                position: relative;
                height: 100vh;
                overflow: hidden;
            }

            .hero img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                position: absolute;
                top: 0;
                left: 0;
            }

            .button {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
            }


            .button img {
                width: 500px;
                height: auto;
            
            }
        </style>

    </head>

    <body>
        <section class="hero">
            <img src="img/Landing Page BG.svg" alt="SVG Image">
        </section>
        <header>
            <a href="#" class="logo">TalaTales</a>
            <ul class="navlist">
                <li><a href="#">HOME</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="#">Sign Up</a></li>
            </ul>
            <div class="bx bx-menu" id="menu-icon"></div>
            <script>
                $(document).ready(function() {
                $("#menu-icon").click(function() {
                $(".navlist").toggleClass("open");
                });
            });
            </script>           
        </header>

    
    </body>

    <div class="button">
            <a href="login.php">
                <img src="img/Click to read.svg" alt="SVG Image">
            </a>
        </div>

</html>
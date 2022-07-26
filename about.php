<?php 
include("path.php");
?>

<?php include('C:\xampp\htdocs\Projects\Blog Post\app/controllers/posts.php'); 

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$popular_post = selectAll('posts', ['published' => 1]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Candal|Lora" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>BlogPost</title>
</head>

<style>
        .column {
        float: left;
        width: 25%;
        margin-bottom: 16px;
        padding: 0 8px;
        }

        .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: 8px;
        }

        .container {
        padding: 0 16px;
        }

        .container::after, .row::after {
        content: "";
        clear: both;
        display: table;
        }

        .title {
        color: grey;
        }

        @media screen and (max-width: 650px) {
        .column {
            width: 100%;
            display: block;
        }
        }
</style>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php") ?>

    <!-- Page Wrapper -->
        <div class="about-section">
            <br><h1 style="text-align:center">Our Team</h1><br>
            <div class="row">
            <div class="column">
                <div class="card">
                <img src="assets/images/me.jpg" alt="brajesh" style="width:100%">
                <div class="container">
                    <h2>Brajesh Jha</h2>
                    <p class="title">Team Leader</p>
                </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <img src="assets/images/Israt.jpg" alt="israt" style="width:100%">
                <div class="container">
                    <h2>Israt Parveen</h2>
                    <p class="title">Team Member</p>
                </div>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <img src="assets/images/Aryan.JPG" alt="aryan" style="width:100%">
                <div class="container">
                    <h2>Aryan Kumar</h2>
                    <p class="title">Team Member</p>
                </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <img src="assets/images/arya.jfif" alt="arya" style="width:100%">
                <div class="container">
                    <h2>Arya Ray</h2>
                    <p class="title">Team Member</p>
                </div>
                </div>
            </div>
        </div>
    <!-- Page Wrapper ends -->


    <?php include(ROOT_PATH . "/app/includes/footer.php") ?>





    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>

</body>

</html>
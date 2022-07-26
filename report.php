<?php include("path.php"); ?>
<?php include('C:\xampp\htdocs\Projects\Blog Post\app/controllers/posts.php'); 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Candal|Lora" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Report | BlogPost</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php") ?>

    <!-- Page Wrapper -->

        <div class="content clearfix">
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h2 class="post-title"> <span style="color: red; text-decoration: underline">Report Page</span>
                    <p style="font-size: 1.3rem;">Blog Name - <?php echo $post['title']; ?></p></h2>
                    
                    <form action="report.php" method="GET">
                        <p style="font-size: 1.3rem">Please select any option: </p>
                        <input type="radio"> Hate Speech <br><br>
                        <input type="radio"> Misleading <br><br>
                        <input type="radio"> Copyright Content <br><br>
                        <button type="submit" name="report" class="btn">Report</button>

                    </form>
                    
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
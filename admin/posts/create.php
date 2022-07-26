<?php include("../../path.php") ?>
<?php include("../../app/controllers/posts.php"); 
adminOnly();
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

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin Section - Add Post</title>
</head>

<body>

<!-- Header -->
<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php'; ?>">
        <h1 class="logo-text"><span>Blog</span>Post</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">

        <?php if (isset($_SESSION['username'])): ?>

            <li>
                <a href="#">
                    <i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul style="left: 0px;">
                    <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a></li>
                </ul>
            </li>

        <?php endif; ?>

    </ul>
</header>
<!-- Header ends -->

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <ul>
                <li><a href="<?php echo BASE_URL . '/admin/posts/index.php'; ?>">Manage Posts</a></li>
                <li><a href="<?php echo BASE_URL . '/admin/users/index.php'; ?>">Manage Users</a></li>
                <li><a href="<?php echo BASE_URL . '/admin/topics/index.php'; ?>">Manage Topics</a></li>
            </ul>
        </div>
        <!-- Left Sidebar ends -->

        <!-- Admin Content -->
        
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Post</a>
                <a href="index.php" class="btn btn-big">Manage Post</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Post</h2>

                <?php include('C:\xampp\htdocs\Projects\Blog Post\app/helpers/formErrors.php'); ?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                    </div>

                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body"><?php echo $body ?></textarea>
                    </div>

                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>

                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>

                            <?php foreach ($topics as $key => $topic): ?>

                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                                    <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>                                  
                                    <?php else: ?>
                                        <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                <?php endif; ?>

                            <?php endforeach; ?>


                        </select>
                    </div>

                    <div>
                        <?php if(empty($published)): ?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                        <?php else: ?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Publish
                            </label>
                        <?php endif; ?>

                    </div>

                    <div>
                        <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                    </div>
                </form>
            </div>

        </div>

        <!-- Admin Content ends -->

    </div>
    <!-- Admin Page Wrapper ends -->







    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

</body>

</html>
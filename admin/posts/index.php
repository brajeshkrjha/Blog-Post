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

    <title>Admin Section - Manage Posts</title>
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
                <h2 class="page-title">Manage Post</h2>

                <?php include('C:\xampp\htdocs\Projects\Blog Post\/app/includes/messages.php') ?>

                <table>

                    <head>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </head>

                    <tbody>

                        <?php foreach ($posts as $key => $post): ?>

                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post['title'] ?></td>
                                <td><?php echo $post['username']; ?></td>
                                <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a></td>
                                <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">Delete</a></td>

                                <?php if ($post['published']): ?>
                                    <td><a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">Unpublish</a></td>
                                <?php else: ?>    
                                    <td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">Publish</a></td>
                                <?php endif; ?>
                            </tr>

                        <?php endforeach; ?>


                    </tbody>
                </table>
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
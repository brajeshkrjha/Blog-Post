<?php 
include("path.php");
include('C:\xampp\htdocs\Projects\Blog Post\app/controllers/topics.php');

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
}

else if (isset($_POST['search-term'])) {
    $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
}
else {
    $posts = getPublishedPosts();
}



// Like & Unlike

if (isset($_POST['liked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
    $post = mysqli_fetch_array($result);
    $n = $post['likes'];

    mysqli_query($conn, "INSERT INTO likes (userid, postid) VALUES (1, $postid)");
    mysqli_query($conn, "UPDATE posts SET likes=$n+1 WHERE id=$postid");

    echo $n+1;
    exit();
}
if (isset($_POST['unliked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
    $post = mysqli_fetch_array($result);
    $n = $post['likes'];

    mysqli_query($conn, "DELETE FROM likes WHERE postid=$postid AND userid=1");
    mysqli_query($conn, "UPDATE posts SET likes=$n-1 WHERE id=$postid");
    
    echo $n-1;
    exit();
}


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

    <title>BlogPost</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php") ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php") ?>


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Post Slider -->
        <div class="post-slider">
            <h1 class="slider-title">Trending Blogs</h1>
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>

            <div class="post-wrapper">

                <?php foreach ($posts as $post): ?>

                    <div class="post">
                        <a href="single.php?id=<?php echo $post['id']; ?>"><img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image"></a>
                        <div class="post-info">
                            <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4><br>
                            <i class="fas fa-user">&nbsp;  <?php echo $post['username']; ?>  </i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fas fa-calendar">&nbsp; <?php echo date('F j, Y', strtotime($post['created_at'])); ?> </i><br><br>


                            <!-- Like feature -->

                            <?php 
					        $results = mysqli_query($conn, "SELECT * FROM likes WHERE userid=1 AND postid=".$post['id'].""); ?>

                            <?php if (isset($_SESSION['id'])) : ?>

                                <?php if (mysqli_num_rows($results) == 1 ): ?>
                                <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $post['id']; ?>"></span> &nbsp;

                                <span class="unlike fa fa-thumbs-up" data-id="<?php echo $post['id']; ?>"></span> &nbsp;
                                <?php else: ?>
                                <span class="like fa fa-thumbs-o-up" data-id="<?php echo $post['id']; ?>"></span> &nbsp;

                                <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $post['id']; ?>"></span> &nbsp;
                                <?php endif ?>

                                <span class="likes_count"><?php echo $post['likes']; ?> likes</span>

                                <style>
                                    .like, .unlike {
                                        color: green;
                                        cursor: pointer;
                                    }
                                    .hide {
                                        display: none;
                                    }
                                    .fa-thumbs-up, .fa-thumbs-o-up {
                                        transform: rotateY(-180deg);
                                        font-size: 1.3em;
                                    }
                                </style>

                            <?php else: ?>
                                
                                <span class="like fa fa-thumbs-o-up" "></span> &nbsp;
                                <span class="unlike hide fa fa-thumbs-up" "></span> &nbsp;

                                <span class="likes_count"><?php echo $post['likes']; ?> likes</span>

                                <style>
                                    .like, .unlike {
                                        color: green;
                                        cursor: pointer;
                                    }
                                    .hide {
                                        display: none;
                                    }
                                    .fa-thumbs-up, .fa-thumbs-o-up {
                                        transform: rotateY(-180deg);
                                        font-size: 1.3em;
                                    }
                                </style>

                            <?php endif; ?>
                            

                        </div>
                        
                    </div>

                <?php endforeach;  ?>

            </div>
        </div>
        <!-- Post Slider ends -->

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content -->
            <div class="main-content">
                <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

                <?php foreach ($posts as $post): ?>

                <div class="post clearfix">
                    <a href="single.php?id=<?php echo $post['id']; ?>"><img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image"></a>
                    <div class="post-preview">
                        <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2><br>
                        <i class="fas fa-user">&nbsp; <?php echo $post['username']; ?> </i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fas fa-calendar">&nbsp; <?php echo date('F j, Y', strtotime($post['created_at'])); ?> </i>
                        <p class="preview-text">
                            <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                        </p>
                        <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                    </div>
                </div>

                <?php endforeach;  ?>

            </div>
            <!-- Main Content ends -->

            <div class="sidebar">

                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search">
                    </form>
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>

                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"> <?php echo $topic['name']; ?> </a></li>
                    <?php endforeach; ?>

                    </ul>
                </div>

            </div>

        </div>
        <!-- Content ends -->

    </div>
    <!-- Page Wrapper ends -->


    <?php include(ROOT_PATH . "/app/includes/footer.php") ?>





    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>


    <script>

    <?php if (isset($_SESSION['id'])) : ?>

        $(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			    var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});

    <?php else: ?>
        <?php echo 'You have to login first' ?>
    <?php endif; ?>        

    </script>


</body>

</html>
<?php include("path.php"); ?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Candal|Lora" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <title><?php echo $post['title']; ?> | BlogPost</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php") ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">



        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content Wrapper -->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title"> <?php echo $post['title']; ?> </h1>
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                    <div class="post-content">
                    <?php echo html_entity_decode($post['body']); ?>
                    </div><br>


                    <!-- Like and Unlike -->
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

                                <span class="likes_count"><?php echo $post['likes']; ?> likes</span><br><br>

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
                                        font-size: 1.8em;
                                    }
                                </style>

                            <?php else: ?>
                                
                                <span class="like fa fa-thumbs-o-up" "></span> &nbsp;
                                <span class="unlike hide fa fa-thumbs-up" "></span> &nbsp;

                                <span class="likes_count"><?php echo $post['likes']; ?> likes</span><br><br>

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
                                        font-size: 1.8em;
                                    }
                                </style>

                    <?php endif; ?>
                    
                    <!-- Like and Unlike ends -->

                    <!-- Reoprt -->

                        <p style="font-family:cursive">This content is neither created nor endorsed by us. <a href="report.php?id=<?php echo $post['id']; ?>" style="color: blue; text-decoration: underline;">Report here</a></p>

                    <!-- Reoprt ends -->

                </div>

            </div>
            <!-- Main Content ends -->

            <!-- Sidebar -->
            <div class="sidebar single">

                <div class="section popular">
                    <h2 class="section-title">Popular</h2>

                    <?php foreach ($popular_post as $p): ?>

                    <div class="post clearfix">
                        <a href="single.php?id=<?php echo $p['id']; ?>"><img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt=""></a>
                        <a href="single.php?id=<?php echo $p['id']; ?>" class="title">
                            <h4> <?php echo $p['title']; ?> </h4>
                        </a>
                    </div>

                    <?php endforeach; ?>

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
            <!-- Sidebar ends -->

        </div>
        <!-- Content ends -->

    </div>
    <!-- Page Wrapper ends -->


    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


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
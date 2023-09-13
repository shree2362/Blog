<?php include("path.php"); 
include(ROOT_PATH . "/app/controllers/topics.php");

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics'); 
$posts = getPublishedPosts();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b4bccc0b37.js" crossorigin="anonymous"></script>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&family=Monoton&family=Pacifico&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- CUstume Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Single Post</title>
</head>
<body>
    <!--Facebook Page -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
     src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="DGqxYTZW">
    </script>

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!--Content-->
        <div class="content clearfix">
            <!-- Main Content Wrapper -->
            <div class="main-content-wrapper"></div>
            <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>
            <div class="post-content">
                <?php echo html_entity_decode($post['body']); ?>
            </div>
        </div>
            <!-- //Main Content -->

            <!--Sidebar-->
            <div class="sidebar single">
                <div class="fb-page" data-href="https://www.facebook.com/tiny.blogger19/"
                  data-tabs="" data-width="" data-height="" data-small-header="false"
                  data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <blockquote cite="https://www.facebook.com/tiny.blogger19/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/tiny.blogger19/">Tiny Blogger</a>  
                  </blockquote>
                </div>

                <div class="section popular">
                    <h2 class="section-title">Latest</h2>
                    <?php 
                    $i = 0;
                    foreach ($posts as $post) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>">
                            <a class="title" href="single.php?id=<?php echo $post['id']; ?>">
                                <h4><?php echo $post['title'] ?></h4>
                            </a>
                        </div>
                        <?php if ($i++ > 1) break; ?>
                    <?php endforeach; ?>
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] .'&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!--//Sidebar-->
        </div>
        <!-- //Content -->
    </div>
    <!-- //Page Wrapper -->

    <!--footer-->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!--//footer-->
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!--Slick Carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>
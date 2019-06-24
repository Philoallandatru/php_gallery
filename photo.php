<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<!--  这个页面实现一张照片的单独页面 -->

<?php
require_once("admin/includes/init.php");
$is_admin = User::is_admin_id($session->user_id);

if (empty($_GET['id'])) {
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);

# 处理评论的提交
if (isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);
    $user_id = $session->user_id;

    $new_comment = Comment::create_comment($photo->id, $author, $body, $user_id);
    if ($new_comment && $new_comment->save()) {
        redirect("photo.php?id={$photo->id}");
    } else {
        $message = "There was some problems saving.";
    }
} else {
    $author = "";
    $body = "";
}

# 找出所有的评论，用于显示在照片的底下
$comments = Comment::find_the_comments($photo->id);

?>


<!-- Navigation -->
<?php include("./includes/navigation.php"); ?>

<!-- Page Content -->
<div class="container">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

<!--      这里显示照片的种种信息          -->
                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo "author"; ?></a>

                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on June 26th, 2019 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
<!--          这是评论提交的表格      -->
                <div class="well">
                    <h4>留下评论:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>作者名</label>
                            <input name="author" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>评论</label>
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

<!--         这里显示所有的评论       -->
                <!-- Comment -->
                <?php foreach ($comments as $comment): ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>July 29th, 2019 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>

                    </div>
                </div>
                <?php endforeach; ?>

            </div>


    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <?php include("includes/sidebar.php"); ?>

    </div>
    <!-- /.row -->

<?php include("includes/footer.php"); ?>

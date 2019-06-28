<!--  这是这个项目的主页  -->


<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
$is_admin = User::is_admin_id($session->user_id); # 检查是不是管理员，据此显示是不是要显示管理界面的入口
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 8;
$items_total_count = Photo::count_all();
$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}"; # 从偏移开始显示固定数量的照片
$photos = Photo::find_by_query($sql);

?>

<!-- Navigation -->
    <?php include("./includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <div class="thumbnail row">

<!--       这里显示照片，要显示哪些已经是哪个sql语句选出来了             -->
                    <?php foreach ($photos as $photo) : ?>
                        <div class="col=xs-6 col-md-3">
                            <a class="thumbnail" href="photo.php?id=<?php echo $photo->id ?>">
                                <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>
               </div>
                <!--        pager here         -->
<!--   这里是分页的链接   -->
                <div class="row">
                    <ul class="pager">
                        <?php
                        if ($paginate->page_total() > 1) { # 如果总页数多于一页则要分页显示
                            if ($paginate->has_previous()) { # 有上一页则要显示上一页的这个链接
                                echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>上一页</a></li>";
                            }

                            # 这里显示1，2 3。。。
                            for ($i=1; $i <= $paginate->page_total(); $i++) {
                                if ($i == $paginate->current_page) {
                                    echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if ($paginate->has_next()) {
                                echo "<li class='next'><a href='index.php?page={$paginate->next()}'>下一页</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                 <?php include("includes/sidebar.php"); ?>
            </div>

        <!-- /.row -->
        <?php include("includes/footer.php"); ?>
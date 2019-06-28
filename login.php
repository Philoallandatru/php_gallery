<?php

require_once("includes/header.php");

if ($session->is_signed_in()) {
    $is_admin = User::is_admin_id($session->user_id);
    if ($is_admin) {
        redirect("index.php");
    } else {
        redirect("admin/user_page.php");
    }
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // method to verify database user
    $user_found = User::verify_user($username, $password);
    $is_admin = User::is_admin_id($user_found->id);

    if ($user_found) {
        $user_id = $user_found->id;
        $session->login($user_found);
        if ($is_admin) {
            redirect("index.php");
        } else {
            redirect("admin/user_page.php?id=$user_id");
        }
    } else {
        $the_message = "Your password or username are incorrect";
    }
} else {
    $the_message = "";
    $username = "";
    $password = "";
}
?>

<!--    content     -->
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-3 col-lg-offset-3">
                <h1 class="display-1 text-center text-capitalize page-header text-danger">
                    Photo Gallery
                </h1>
                <h1 class="page-header text-center">
                    登录
                </h1>

                <?php
                if ($the_message != "") {
                    echo " <div class='alert alert-danger'>$the_message</div>";
                }
                ?>
    <form id="" action="" method="post">
        <div class="form-group">
            <label for="username">用户名</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="登录" class="btn btn-primary btn-lg btn-block">
        </div>
    </form>
    <div>
        <a class="btn btn-info btn-block" href="admin/register.php">注册</a>
    </div>


</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

</div>

<!-- /#page-wrapper -->


<?php include("includes/footer.php"); ?>


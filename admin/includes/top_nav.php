<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">导航</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../index.php">回到主页</a>
</div>

<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">


    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?php
            echo User::find_by_id($session->user_id)->username;
            ?>
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li class="divider"></li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> 登出</a>
            </li>
        </ul>
    </li>
</ul>


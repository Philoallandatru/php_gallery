<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Home Page of Admin
                    <small>Subheading</small>
                </h1>

<!--    Test code  -->
                <?php
//                $users = User::find_all();
//                foreach ($users as $user) {
//                    echo $user->username . "<br>";
//                }

//                $found_user = User::find_by_id(2);
//                echo $found_user->username;
//                echo "<hr>";

//                $user = new User();
//                $user->username = "Ogiso";
//                $user->password = "Touma";
//                $user->lastname = "Di";
//                $user->firstname = "Homura";
//                $user->create();
//                $user = User::find_by_id(8);
//                $user->username = "Metsu";
//                $user->update();

//                echo "User class static method test : <br> : ";
//                $users = User::find_all();
//                foreach ($users as $user) {
//                    echo $user->username .  "<br>";
//                }

                echo "<br><br>";

//                echo "Photo class static find_all() : <br>";
//                $photos = Photo::find_all();
//                foreach ($photos as $photo) {
//                    echo  $photo->title;
//                }
//                $user = new User();
//                $user->password = "12345";
//                $user->username = "hahaha";
//                $user->create();

                $photo = new Photo();
                $photo->title = "Just tests";
                $photo->size = 12;
                $photo->create();

                ?>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
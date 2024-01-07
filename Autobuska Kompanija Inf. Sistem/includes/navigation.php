<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">
   <style>
       .navbar {
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
       }

       .navbar {
           background: linear-gradient(to right, #1976D2, #001a33);
       }

       .navbar-brand {
           color: #fff; /* Text color */
           font-weight: bold;
           font-family: 'Arial', sans-serif;
           text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
       }

       .navbar-nav>li>a {
           color: #fff; /* Text color */
           font-family: 'Arial', sans-serif;
           text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
       }

       .navbar-nav .dropdown-menu {
           background-color: #1976D2;
       }

       .navbar-nav .dropdown-menu li a {
           color: #fff;
           font-family: 'Arial', sans-serif;
           text-shadow: none;
       }

       .navbar-nav .open .dropdown-menu>li>a {
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
       }

       .navbar-nav i {
           margin-right: 5px;
       }
   </style>

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fas fa-bus"></i> Autobuska kompanija Ultra Travel</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    $query = "SELECT *  FROM  categories";
                    $select_all_categories_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li> <a href='category.php?category=$cat_id'><i class='fas fa-list-alt'></i> {$cat_title} </a></li>";
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['s_username'])) {
                        if ($_SESSION['s_role'] == 'admin') {
                            ?>
                            <li>
                                <a href="admin/index.php"><i class="fas fa-crown"></i> Admin</a>
                            </li>
                    <?php }
                    } ?>

                    <li>
                        <a href="registration.php"><i class="fas fa-user-plus"></i> Registracija!</a>
                    </li>
                    <?php
                    if (isset($_SESSION['s_username'])) {
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i> <?php
                                                                                                                if (isset($_SESSION['s_username']))
                                                                                                                    echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="profile.php"><i class="fas fa-id-card"></i> Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="includes/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    <?php    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>

<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dobrodošli, Admin
                        <small><?php echo ucfirst($_SESSION['s_username']); ?></small>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <a href="users.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query_users = "SELECT * FROM users";
                                        $result_users = mysqli_query($connection, $query_users);
                                        $total_users = mysqli_num_rows($result_users);
                                        ?>
                                        <div class="huge"><?php echo $total_users; ?></div>
                                        <div>Korisnika</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left">Detalji</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="buses.php">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query_buses = "SELECT * FROM posts";
                                        $result_buses = mysqli_query($connection, $query_buses);
                                        $total_buses = mysqli_num_rows($result_buses);
                                        ?>
                                        <div class="huge"><?php echo $total_buses; ?></div>
                                        <div>Autobusa</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left">Detalji</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="query.php">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query_queries = "SELECT * FROM query";
                                        $result_queries = mysqli_query($connection, $query_queries);
                                        $total_queries = mysqli_num_rows($result_queries);
                                        ?>
                                        <div class="huge"><?php echo $total_queries; ?></div>
                                        <div>Upita</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left">Detalji</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Dodatne informacije:</h2>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nedavne aktivnosti</h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li>Korisnik Mujo Mujic registrovan <?php echo date('Y-m-d H:i:s'); ?></li>
                                <li>Autobus 013 je rezervisan od strane korisnika Belmin <?php echo date('Y-m-d H:i:s'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Novosti</h3>
                        </div>
                        <div class="panel-body">
                            <p>Dodatne informacije nisu dostupne...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>

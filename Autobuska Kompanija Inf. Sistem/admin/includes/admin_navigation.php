<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Administracija</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Početna stranica</a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../profile.php"><i class="fa fa-fw fa-user"></i> Profil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Odjavi se</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Autobusi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="buses.php">Svi autobusi</a>
                            </li>
                            <li>
                                <a href="buses.php?source=add_bus">Dodaj autobuse</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-desktop"></i> Kategorija</a>
                    </li>
                    <li>
                        <a href="query.php"><i class="fa fa-fw fa-wrench"></i>Komentari Korisnika</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Korisnici <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="users.php">Svi Korisnici</a>
                            </li>
                            <!-- <li>
                                <a href="users.php?source=update_user">Edit Buses</a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="../profile.php"><i class="fa fa-fw fa-dashboard"></i> Profil</a>
                    </li>
                    <li>
                        <a href="report.php"><i class="fa fa-fw fa-book"></i> Izvještaj</a>
                    </li>
                </ul>
            </div>
        </nav>
<style>
    .side-nav {
        background-color: #2c3e50;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px 10px 0 0;
        height: calc(100vh - 30px);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .side-nav a {
        color: #ecf0f1;
        font-size: 16px;
        padding: 18px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .side-nav a:hover,
    .side-nav a:focus {
        background-color: #34495e;
        color: #ffffff;
    }

    .side-nav .fa-dashboard {
        color: #3498db;
    }

    .side-nav .fa-desktop {
        color: #e74c3c;
    }

    .side-nav .fa-wrench {
        color: #f39c12;
    }

    .side-nav .fa-users {
        color: #2ecc71;
    }

    .side-nav .fa-fw.fa-dashboard {
        color: #27ae60;
    }

    .side-nav .fa-book {
        color: #9b59b6;
    }

    .dropdown-menu {
        background-color: #2c3e50;
        border: 1px solid #34495e;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 0 0 5px 5px;
    }

    .dropdown-menu > li > a {
        color: #040d34;
        font-size: 16px;
        padding: 18px 20px;
        border-radius: 0;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .dropdown-menu > li > a:hover,
    .dropdown-menu > li > a:focus {
        background-color: #34495e;
        color: #ffffff;
    }

    .side-nav .fa-dashboard {
        color: #E74C3C;
    }

    .side-nav .fa-fw.fa-dashboard {
        color: #27AE60;
    }

    .side-nav .fa-book {
        color: #F39C12;
    }
</style>

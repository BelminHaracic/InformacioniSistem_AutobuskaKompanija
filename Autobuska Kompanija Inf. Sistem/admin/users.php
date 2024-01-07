<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dobro došli
                            <small>Admin</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'update_user':
                                include "includes/update_user.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Korisničko Ime</th>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Slika</th>
                                        <th>Email</th>
                                        <th>Broj telefona:</th>
                                        <th>Uloga</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  users";
                                        $select_users = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_users)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $user_firstname = $row['user_firstname'];
                                            $user_lastname = $row['user_lastname'];
                                            $user_email = $row['user_email'];
                                            $user_role = $row['user_role'];
                                            $user_phoneno = $row['user_phoneno'];  
                                            $user_image = $row['user_image'];                                      

                                     ?>
                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $user_firstname ?></td>
                                        <td><?php echo $user_lastname ?></td>
                                        <td><img width="100" src="images/<?php echo $user_image ?>"></td>
                                        <td><?php echo $user_email ?></td>
                                        <td><?php echo $user_phoneno ?></td>
                                        <td><?php echo $user_role ?></td>
                                        
                                        <?php echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?source=update_user&user_id=$user_id'>Edit</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?make_admin=$user_id'>Make Admin</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?remove_from_admin=$user_id'>Remove From Admin</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php
                                break;
                        }
                        // if ($source = 'add_bus') {
                        //        include "includes/add_bus.php";   
                        // }
                        // elseif ($source = '') {
                        //     
                        // }   
                        ?>

                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $user_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM users WHERE user_id = {$user_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location : users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['make_admin'])) {
                            $user_id = $_GET['make_admin'];
                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['remove_from_admin'])) {
                            $user_id = $_GET['remove_from_admin'];
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                    </div>
                </div>
            </div>

        </div>

<?php include"includes/admin_footer.php"; ?>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
}

.container-fluid {
    margin-top: 20px;
}

.table-container {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    background-color: #fff;
    transition: box-shadow 0.3s ease-in-out;
}

.table:hover {
    box-shadow: 0 16px 24px rgba(0, 0, 0, 0.3);
}

.table thead th {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    text-align: left;
    padding: 15px;
    transition: background-color 0.3s ease-in-out;
}

.table thead th:hover {
    background-color: #0056b3;
}

.table tbody > tr > td {
    padding: 15px;
    border-bottom: 1px solid #ddd;
}

.table tbody > tr:hover {
    background-color: #f5f5f5;
}

.page-header {
    margin: 20px 0;
    color: #333;
}

.page-header small {
    color: #777;
}

.table a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s ease-in-out;
}

.table a:hover {
    color: #0056b3;
}

.table button {
    padding: 8px 12px;
    margin: 2px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, transform 0.2s ease-in-out;
}

.table .delete-btn {
    background-color: #dc3545;
    color: #fff;
}

.table .edit-btn {
    background-color: #ffc107;
    color: #212529;
}

.table .admin-btn {
    background-color: #28a745;
    color: #fff;
}

.table .remove-admin-btn {
    background-color: #17a2b8;
    color: #fff;
}

.table button:hover {
    filter: brightness(90%);
    transform: scale(1.05);
}
</style>
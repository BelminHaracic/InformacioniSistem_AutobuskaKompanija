<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dobrodošli na Admin
                            <small>Author</small>
                        </h1>



                        <div class="col-xs-6">

                            <?php

                                if (isset($_GET['delete'])) {
                                    $cat_del_id = $_GET['delete'];

                                    $query = "DELETE FROM categories WHERE cat_id=$cat_del_id";

                                    $delete_cat = mysqli_query($connection,$query);

                                }

                            ?>




                            <?php 
                            if(isset($_POST['submit'])) {

                                $cat_title = $_POST['cat_title'];
                                if($cat_title=="" || empty($cat_title)) {
                                    echo " This Field Must Not be Empty";
                                }

                                $query = "INSERT INTO categories(cat_title) VALUE ('$cat_title')";
                                $create_category = mysqli_query($connection,$query);

                                if(!$create_category) {
                                    die("Query Failed");
                                }
                            }
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_tite">Dodaj kategoriju</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Dodaj kategoriju">
                                </div> 
                            </form>
                        </div>

                        <div class="col-xs-6">

                            <?php 
                            $query = "SELECT *  FROM  categories";
                            $select_categories = mysqli_query($connection,$query);
                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Naslov Kaegorije</th>
                                        <th>Obriši</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php  
                                        while($row = mysqli_fetch_assoc($select_categories)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];

                                        echo "<tr>";
                                        echo "<td> {$cat_id} </td>";
                                        echo "<td> {$cat_title} </td>";
                                        echo "<td><a href='categories.php?delete=$cat_id'>Obriši</a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>


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
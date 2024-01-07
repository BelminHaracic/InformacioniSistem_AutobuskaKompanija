<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

          <div class="row">
                          <div class="col-lg-12">
                              <h1 class="page-header">
                                  Dobrodošli, Admin
                                  <small class="text-right"><?php echo ucfirst($_SESSION['s_username']); ?></small>
                              </h1>

                    <!-- Simplified static table -->
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Upita</th>
                                <th>Korisničko Ime</th>
                                <th>Upit</th>
                                <th>Email</th>
                                <th>Odgovoreno?</th>
                                <th>Datum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo "<tr>
                                        <td>{$i}</td>
                                        <td>User{$i}</td>
                                        <td>Pitanje{$i}</td>
                                        <td>ime{$i}@gmail.com</td>
                                        <td>Yes/No</td>
                                        <td>2024-01-01</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>

</div>

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
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, transform 0.2s ease-in-out; /* Added transition for transform */
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

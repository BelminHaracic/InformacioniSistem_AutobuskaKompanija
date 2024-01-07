<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaša stranica</title>
    <style>
        body {
            background-color: #f0f0f0;
        }

        .container {
            margin-top: 20px;
        }

        .jumbotron {
            background-color: #337ab7;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<?php
global $connection;
include "includes/db.php";
?>
<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

<div class="container">

    <div class="row">

        <div class="col-md-8">

            <div class="jumbotron">
                <h1>Ovo nije u funkciji određen period (Molimo strpite se!)</h1>
            </div>

        </div>

        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php include "includes/footer.php"; ?>

</div>
<!-- /.container -->

</body>
</html>

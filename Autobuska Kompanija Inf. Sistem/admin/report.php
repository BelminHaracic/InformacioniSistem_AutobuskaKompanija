<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dobrodošli, Admin
                        <small class="text-right"><?php echo ucfirst($_SESSION['s_username']); ?></small>
                    </h1>
                    <br><br>

                    <div class="status-sistema">
                        <h2>Status Sistema:</h2>
                        <div class="text-right">
                            <p>Uptime Servera: 99.9%</p>
                            <p>Konekcija sa Bazom Podataka: <?php echo (mysqli_ping($connection) ? 'Povezano' : 'Nije povezano'); ?></p>

                        </div>
                    </div>
                    <div class="izvjestaj">
                        <h2>Izvještaj:</h2>
                        <br>

                        <?php
                        $curr_date = date('Y-m-d');

                        $bus_count_total = mysqli_query($connection, "SELECT * FROM posts");
                        $total_buses_provided = mysqli_num_rows($bus_count_total);

                        $bus_count = mysqli_query($connection, "SELECT * FROM posts WHERE post_date > '$curr_date'");
                        $total_buses = mysqli_num_rows($bus_count);

                        $get_admin = mysqli_query($connection, "SELECT * FROM users WHERE user_role='admin'");
                        $total_admin = mysqli_num_rows($get_admin);

                        $get_query = mysqli_query($connection, "SELECT * FROM query");
                        $total_queries = mysqli_num_rows($get_query);

                        $get_users = mysqli_query($connection, "SELECT * FROM users");
                        $total_users = mysqli_num_rows($get_users);

                        $get_orders = mysqli_query($connection, "SELECT * FROM orders");
                        $total_orders = mysqli_num_rows($get_orders);
                        ?>

                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Statistika</th>
                                    <th scope="col">Broj</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Ukupno Korisnika:</b></td>
                                    <td><?php echo $total_users; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ukupno Dostupnih Autobusa:</b></td>
                                    <td><?php echo $total_buses_provided; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ukupno Predstojećih Autobusa:</b></td>
                                    <td><?php echo $total_buses; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ukupno Administratora:</b></td>
                                    <td><?php echo $total_admin; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ukupno Upita:</b></td>
                                    <td><?php echo $total_queries; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ukupno Rezervacija:</b></td>
                                    <td><?php echo $total_orders; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="nedavne-aktivnosti">
                        <h2>Nedavne Aktivnosti:</h2>
                        <ul>
                            <?php
                            // Dohvatanje i prikaz nedavnih aktivnosti iz baze podataka
                            // ...
                            ?>
                            <li>Korisnik Mujo Mujic se registrovao <?php echo date('Y-m-d H:i:s'); ?></li>
                            <li>Autobus 013 je rezervisan od strane korisnika Belmin <?php echo date('Y-m-d H:i:s'); ?></li>
                        </ul>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

                    <canvas id="myChart" width="400" height="200"></canvas>

                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Korisnici', 'Autobusi', 'Predstojeći Autobusi', 'Administratori', 'Upiti', 'Rezervacije'],
                                datasets: [{
                                    label: 'Ukupan Broj',
                                    data: [
                                        <?php echo $total_users; ?>,
                                        <?php echo $total_buses_provided; ?>,
                                        <?php echo $total_buses; ?>,
                                        <?php echo $total_admin; ?>,
                                        <?php echo $total_queries; ?>,
                                        <?php echo $total_orders; ?>
                                    ],
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/admin_footer.php"; ?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .page-header {
        background-color: #343a40;
        color: white;
        padding: 10px;
        margin-bottom: 30px;
    }

    .page-header small.text-right {
        display: block;
        margin-top: -10px;
    }

    .status-sistema, .izvjestaj, .nedavne-aktivnosti {
        margin-bottom: 30px;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        margin-bottom: 20px;
    }
</style>

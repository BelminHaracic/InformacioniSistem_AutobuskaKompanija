<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <?php include "includes/navigation.php"; ?>

    <div class="container" style="width: 50%;">
                
      <h2 class="table-header">Osobni podaci:</h2>
      <table class="table table-striped user-details-table" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Slika:</b> </td>
                  <td><img src="admin/images/<?php echo $_SESSION['s_image']; ?>" width=50></td>
                </tr>
                <tr>
                  <td><b>UserID:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_id']); ?></td>
                </tr>
                <tr>
                  <td><b>Ime vlasnika računa:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_username']); ?></td>
                </tr>
                <tr>
                  <td><b>Ime:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_firstname']); ?></td>
                </tr>
                <tr>
                  <td><b>Prezime:</b> </td>
                  <td><?php echo ucfirst($_SESSION['s_lastname']); ?></td>
                </tr>

                <br>
              </tbody>
            </table>
<br>

      <?php
        if (isset($_GET['orderid'])) {
          $input_order_id = $_GET['orderid'];
          //echo $input_order_id;
        }

        $query = "SELECT * FROM orders WHERE order_id=$input_order_id";

        $select_order = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($select_order)) {
            $passenger = $row['user_name'];
            $passenger_age = $row['user_age'];
            $source = $row['source'];
            $destination = $row['destination'];
            $dob = $row['date'];
            $cost = $row['cost'];
            $orderid = $row['order_id'];
            $travel_bus_id = $row['bus_id'];

            ?>

           <h2 class="table-header">Podaci o putniku:</h2>
           <table class="table table-striped passenger-details-table" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Ime putnika:</b> </td>
                  <td><?php echo $passenger; ?></td>
                </tr>
                <tr>
                  <td><b>Godine putnika:</b> </td>
                  <td><?php echo $passenger_age; ?></td>
                </tr>
                <tr>
                  <td><b>Polazak: </b></td>
                  <td><?php echo ucfirst($source); ?></td>
                </tr>
                <tr>
                  <td><b>Destinacija: </b></td>
                  <td><?php echo ucfirst($destination); ?></td>
                </tr>
                <tr>
                  <td><b>Datum rezervisanja: </b></td>
                  <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                  <td><b>Cijena: </b></td>
                  <td><?php echo $cost; ?></td>
                </tr>
                <br>
              </tbody>
            </table>

          <?php } ?>


          <?php 

              $query = "SELECT *  FROM  posts WHERE post_id=$travel_bus_id";
              $select_posts = mysqli_query($connection,$query);

              while($row = mysqli_fetch_assoc($select_posts)) {
                  $bus_id = $row['post_id'];
                  $admin_name = $row['post_author'];
                  $source = $row['post_source'];
                  $destination = $row['post_destination'];
                  $intermediate_station = $row['post_via'];
                  $category = $row['post_category_id'];
                  $image = $row['post_image'];
                  $date = $row['post_date'];
                  $time = $row['post_via_time'];
                  $bus_stations = explode(" ", $intermediate_station);
                  $bus_times = explode(" ", $time);

              

           ?>
           <br>
           <h2 class="table-header">Detalji autobusa:</h2>
           <table class="table table-striped bus-details-table" style="width: 100%">
              <tbody>
                <tr>
                  <td><b>Autobus ID:</b> </td>
                  <td><?php echo $bus_id; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Polazak:</b> </td>
                  <td><?php echo $source; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Destinacija: </b></td>
                  <td><?php echo ucfirst($destination); ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Datum: </b></td>
                  <td><?php echo $date; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td><b>Vrijeme:</b></td>
                  <td></td>
                </tr>

                <?php

                    for ($i=0; $i < sizeof($bus_stations); $i++) { ?>
                        <tr>
                          <td></td>
                          <td><?php echo $bus_stations[$i]; ?></td>
                          <td><?php echo $bus_times[$i]; ?></td>
                        </tr> <?php 
                    }

                ?>

                
                <br>
              </tbody>
            </table>
          <?php } ?>
                              

    </div>
        <hr>


    <script>
    function openCity(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

<?php include "includes/footer.php"; ?>
<style>
      body {
             background: linear-gradient(to right, #AED6F1, #F2F3F4);
             margin: 0;
             padding: 0;
             font-family: Arial, sans-serif;
         }

    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .table-header {
        color: #333;
        font-size: 24px;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .user-details-table {
        background-color: #f5f5f5;
    }

    .passenger-details-table {
        background-color: #eaf2f8;
    }

    .bus-details-table {
        background-color: #e8f7e1;
    }

    .table tbody tr {
        background-color: #fff;
        transition: background-color 0.3s;
    }

    .table tbody tr:hover {
        background-color: #f0f0f0;
    }

    .table tbody td {
        padding: 15px;
        text-align: left;
        font-size: 16px;
        border-bottom: 1px solid #ddd;
    }

    .table tbody td:last-child {
        border-bottom: none;
    }
</style>



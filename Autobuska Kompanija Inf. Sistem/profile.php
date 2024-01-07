<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container" style="width: 50%;">
                              
        <h2 style="margin-left: 40%;">Profil</h2>
        <?php $image = $_SESSION['s_image'] ; ?>
        <img src="admin/images/<?php echo $image;?>" width="200" style="margin-left: 32%;" class="img-circle" alt="Profile"> 
        <br><br><br><br>
        <div class="tab">
            <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Personel Details')">Osobni podaci</button>
            <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Tickets Booked')">Rezervisane karte</button>
            <button class="tablinks" style="width: 33%"  onclick="openCity(event, 'Edit Details')">Uredi profil</button>
        </div>


        <div id="Personel Details" class="tabcontent">
          <h3>Detalji</h3>
          <!-- <?php echo $_SESSION['s_id'];?> -->
          <br>
          <?php
          $curr_user_id = $_SESSION['s_id'];
          //echo $curr_user_id;
          $query = "SELECT * FROM users where user_id = $curr_user_id";

          $select_user = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user)) {
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_phoneno = $row['user_phoneno'];
            ?>

            <table class="table table-striped" style="width: 50%">
              <tbody>
                <tr>
                  <td><b>Korisničko ime:</b> </td>
                  <td><?php echo $username; ?></td>
                </tr>
                <tr>
                  <td><b>Ime:</b> </td>
                  <td><?php echo ucfirst($user_firstname); ?></td>
                </tr>
                <tr>
                  <td><b>Prezime: </b></td>
                  <td><?php echo ucfirst($user_lastname); ?></td>
                </tr>
                <tr>
                  <td><b>Email: </b></td>
                  <td><?php echo $user_email; ?></td>
                </tr>
                <tr>
                  <td><b>Broj mob.: </b></td>
                  <td><?php echo $user_phoneno; ?></td>
                </tr>
              </tbody>
            </table>

          <?php } ?>
        </div>

        <div id="Tickets Booked" class="tabcontent">
          <h3>Rezervisane karte</h3>
          <br>

          <h3><b>Posljednje rezervisano:</b></h3>
          <?php

          $query = "SELECT * FROM orders INNER JOIN posts ON orders.bus_id = posts.post_id where orders.user_id = $curr_user_id";

          $select_user_orders = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user_orders)) {
            $passenger = $row['user_name'];
            $passenger_age = $row['user_age'];
            $source = $row['source'];
            $destination = $row['destination'];
            $dob = $row['date'];
            $cost = $row['cost'];
            $orderid = $row['order_id'];
            $busid = $row['bus_id'];
            $busdate = $row['post_date'];

            //$new_query = "SELECT post_date FROM posts WHERE post_id = $busid";

            //echo $busdate;
            if (date("Y-m-d") > $busdate) {
              # code...

            ?>
            <br>
            <table class="table table-striped" style="width: 50%">
              <tbody>
                <tr>
                  <td><b>Passenger Name:</b> </td>
                  <td><?php echo $passenger; ?></td>
                </tr>
                <tr>
                  <td><b>Passenger Age:</b> </td>
                  <td><?php echo $passenger_age; ?></td>
                </tr>
                <tr>
                  <td><b>Source: </b></td>
                  <td><?php echo ucfirst($source); ?></td>
                </tr>
                <tr>
                  <td><b>Destination: </b></td>
                  <td><?php echo ucfirst($destination); ?></td>
                </tr>
                <tr>
                  <td><b>Date Of Booking: </b></td>
                  <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                  <td><b>Cost: </b></td>
                  <td><?php echo $cost; ?></td>
                </tr>
                <tr>
                  <td><b>Print Receipt<b></td>
                  <td><a href=" receipt.php?orderid=<?php echo $orderid ?>">Receipt</a></td>
                </tr>
                <br><br><br>
              </tbody>
            </table>

          <?php } } ?>

<br><br><br>

          <h3 style="margin-bottom: -40px"><b>Nadolazeća putovanja:</b></h3>
          <?php

          $query = "SELECT * FROM orders INNER JOIN posts ON orders.bus_id = posts.post_id where orders.user_id = $curr_user_id";

          $select_user_orders = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user_orders)) {
            $passenger = $row['user_name'];
            $passenger_age = $row['user_age'];
            $source = $row['source'];
            $destination = $row['destination'];
            $dob = $row['date'];
            $cost = $row['cost'];
            $orderid = $row['order_id'];
            $busid = $row['bus_id'];
            $busdate = $row['post_date'];

            //$new_query = "SELECT post_date FROM posts WHERE post_id = $busid";

            //echo $busdate;
            if (date("Y-m-d") < $busdate) {
              # code...
            
            ?>
            <br>
            <table class="table table-striped" style="width: 50%">
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
                  <td><b>Datum putovanja: </b></td>
                  <td><?php echo $busdate; ?></td>
                </tr>
                <tr>
                  <td><b>Cijena: </b></td>
                  <td><?php echo $cost; ?></td>
                </tr>
               <tr>
                  <tr>
                      <td><b>Ispis računa</b></td>
                      <td>
                          <a href="receipt.php?orderid=<?php echo $orderid ?>" class="custom-btn">Prikaži račun</a>
                      </td>
                  </tr>

                <tr>
                  <td><b>Otkaži kartu<b></td>
                  <td>
                    <form action="includes/cancel.php?orderid=<?php echo $orderid ?>&bus_id=<?php echo $busid ?>" method="post">
                      <button class="btn btn-primary btn-xs" name="cancel">Otkaži</button></td>
                    </form>
                </tr>
                <br><br><br>
              </tbody>
            </table>

          <?php } } ?>



        </div>

        <div id="Edit Details" class="tabcontent">
          <h3>Uredi Profil</h3>
          <br>
          <?php
            //echo $_SESSION['s_id'];

            $curr_user_id = $_SESSION['s_id'];
            $query = "SELECT * FROM users WHERE user_id = $curr_user_id ";
            $select_users = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_users)) {
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_password = $row['user_password'];
                $user_phoneno = $row['user_phoneno'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
            }

            if (isset($_POST['update-user'])) {
              $username = $_POST['username'];
              $user_password = $_POST['user_password'];
              $user_firstname = $_POST['user_firstname'];
              $user_lastname = $_POST['user_lastname'];
              $user_phoneno = $_POST['user_phoneno'];
              $user_email = $_POST['user_email'];


              $image = $_FILES['images']['name'];
              $tmp_image = $_FILES['images']['tmp_name'];

              move_uploaded_file($tmp_image, "admin/images/$image");

              $query = "UPDATE users SET username='{$username}', user_password='{$user_password}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_password='{$user_password}', user_phoneno={$user_phoneno}, user_email='{$user_email}', user_image='{$image}' WHERE user_id=$curr_user_id";
              
              //echo $title . " " . $admin;
              
              $update_bus = mysqli_query($connection,$query);

              if (!$update_bus) {
                die("Query Failed" . mysqli_error($connection));
              }
              $_SESSION['s_image'] = $image;
              header("Location:profile.php");
            }

            ?>

            <form action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="username">Korisničko Ime</label>
                <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
              </div>

              <div class="form-group">
                <label for="firstname">Ime</label>
                <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
              </div>

              <div class="form-group">
                <label for="lastname">Prezime</label>
                <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
              </div>

              <div class="form-group">
                <label for="phoneno">Broj mob.:</label>
                <input value="<?php echo $user_phoneno; ?>" type="text" class="form-control" name="user_phoneno">
              </div>

              <div class="form-group">
                <label for="password">Šifra</label>
                <input value="<?php echo $user_password?>" id="myInput" type="password" class="form-control" name="user_password">
              </div>

              <div class="form-group">
                <input type="checkbox" onclick="myFunction()">Prikaži šifru
              </div>

              <div class="form-group">
                <img width="100" src="admin/images/<?php echo $user_image ?>">
              </div>

              <div class="form-group">
                <label for="bus-image">Slika korisnika</label>
                <input type="file" name="images" >
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update-user" value="Ažuriraj">
              </div>
            </form>


        </div>

    </div>
        <hr>


    <script>

    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }


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
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
}

/* Tab styles */
.tab {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #007bff;
    padding: 15px 0;
}

.tab button {
    background-color: #007bff;
    color: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}

.tab button:hover {
    background-color: #0056b3;
    color: #f8f9fa;
    transform: scale(1.05);
}

.tab button.active {
    background-color: #0056b3;
}

/* Tab content styles */
.tabcontent {
    display: none;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: opacity 0.5s ease-in-out;
}

/* Animation for tab content */
.tabcontent.show {
    opacity: 1;
}
/* Profile Details Styles */
.tabcontent table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.tabcontent tbody tr {
    border-bottom: 1px solid #ddd;
    transition: background-color 0.3s;
}

.tabcontent td {
    padding: 15px;
    text-align: left;
}

.tabcontent td:first-child {
    width: 40%;  /* Adjusted width to 40% */
    font-weight: bold;
    color: #333;
}

.tabcontent td:last-child {
    text-align: left;
}

/* Add some spacing between the table rows */
.tabcontent tbody tr:not(:last-child) {
    margin-bottom: 10px;
}

/* Hover effect for table rows */
.tabcontent tbody tr:hover {
    background-color: #f8f9fa;
}

/* Add this style in your CSS file or in the style section of your HTML */
.custom-btn {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    background: linear-gradient(45deg, #007bff, #00bfff);
    border-radius: 5px;
    transition: background 0.3s ease-in-out;
}

.custom-btn:hover {
    background: linear-gradient(45deg, #00bfff, #007bff);
    transform: scale(1.1);
}

</style>

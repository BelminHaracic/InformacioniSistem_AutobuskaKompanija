<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['register'])) {
//echo "registered";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");
    if ($image == "") {
      $image = "user_default.jpg";
    }

if ($username=="" || $firstname=="" || $lastname=="" || $email=="" || $phone_no=="" || $image=="" || $password=="") {
  # code...
  echo "**ALL FIELDS MANDATORY";
}
elseif (strlen($phone_no)!=10) {
  # code...
  echo "**PhoneNo Must Contain Of 10 bits";
}

else {

$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', 'subscriber', '$image') ";

$register_user = mysqli_query($connection, $query);

if(!$register_user) {
    die("Query Failed" . mysqli_error($connection));
}

header("Location: index.php");

}

}

?>


<div class="container jumbotron" style="width: 45%; border-radius: 15px">

    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="text-align: center;">
                <div style="margin-top: 30%; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <img src="images/bus_registration.png" alt="Registration Image" style="max-width: 100%; border-radius: 10px;">
                </div>
            </div>
            <div class="col-lg-6">


              <h2 style="margin-left: 40%;">Registracija</h2>
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="email">Korisničko ime:</label>
                  <input type="text" class="form-control" id="email" placeholder="Unesi Korisničko Ime" name="username">
                </div>

                <div class="form-group">
                  <label for="email">Ime:</label>
                  <input type="text" class="form-control" id="email" placeholder="Unesi Ime" name="firstname">
                </div>

                <div class="form-group">
                  <label for="email">Prezime:</label>
                  <input type="text" class="form-control" id="email" placeholder="Unesi prezime" name="lastname">
                </div>

                <div class="form-group">
                    <label for="bus-image">Slika</label>
                    <input type="file" name="image" >
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Unesi email" name="email">
                </div>
                
                <div class="form-group">
                  <label for="pwd">Broj mob:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Unesi broj mob" name="phone_no">
                </div>

                <div class="form-group">
                  <label for="pwd">Šifra:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Unesi Šifru" name="password">
                </div>
        
                <button type="submit" class="btn btn-primary" name="register" style="margin-left: 45%; margin-top: 20px;">Registruj se!</button>
              </form>
            

            </div>
        </div>

    </div>
        <hr>

<?php include "includes/footer.php"; ?>

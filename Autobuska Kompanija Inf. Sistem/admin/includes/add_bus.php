<?php

	if (isset($_POST['insert-bus'])) {

		$admin = $_POST['admin'];
		$category = $_POST['category'];
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$title = $source . " to " . $destination;
		$intermediate = $_POST['intermediate'];
		$date = $_POST['date'];
		$via_time = $_POST['via-time'];
		$bus_detail = $_POST['bus-detail'];
		$max_seats = $_POST['max_seats'];

		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];

		move_uploaded_file($tmp_image, "images/$image");

		if ($admin=="" || $category=="" || $source=="" || $destination=="" || $title=="" || $intermediate=="" || $date=="" || $via_time=="" || $bus_detail=="" || $max_seats=="") {
			echo "**All Fields Mandatory";
		}
		else {
			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, max_seats, available_seats) VALUES({$category}, '{$title}', '{$admin}', '{$date}', '{$image}', '{$bus_detail}', '{$source}', '{$destination}', '{$intermediate}', '{$via_time}', $max_seats, $max_seats)";

			$bus_entry = mysqli_query($connection,$query);

			if (!$bus_entry) {
				die("Query Failed");
			}
		}
	}

?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="admin">Ime vozača</label>
		<input type="text" class="form-control" name="admin">
	</div>

	<div class="form-group">
		<select name="category">

			<?php

			$query = "SELECT * FROM categories";
			$select_category = mysqli_query($connection,$query);

			if (!$select_category) {
				die("Query Failed" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_category)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

				echo "<option value='$cat_id'>$cat_title</option>";
			}

			?>

		</select>
	</div>

	<div class="form-group">
		<label for="source">Mjesto polaska</label>
		<input type="text" class="form-control" name="source">
	</div>

	<div class="form-group">
		<label for="destination">Mjesto dolaska</label>
		<input type="text" class="form-control" name="destination">
	</div>

	<div class="form-group">
		<label for="bus-date">Datum</label>
		<input type="date" style="margin-top: 10px;" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
	</div>

	<div class="form-group">
		<label for="intermediate-station">Međustanice</label>
		<input type="text" class="form-control" name="intermediate">
	</div>

	<div class="form-group">
		<label for="via-time">Vrijeme u koje autobus stiže do svake stanice</label>
		<input type="text" class="form-control" name="via-time" placeholder="Sva vremena razdvojiti sa SPACE">
	</div>

	<div class="form-group">
		<label for="Max Seats">Maksimalni broj sjedišta u autobusu</label>
		<input type="text" class="form-control" name="max_seats" placeholder="Maksimalni broj sjedišta u autobusu">
	</div>

	<div class="form-group">
		<label for="bus-image">Slika autobusa</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<label for="bus-detail">Detalji</label>
		<textarea class="form-control" name="bus-detail" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-bus" value="Dodaj">
	</div>
</form>

<style>
    body {
        font-family: 'Arial', sans-serif;
    }
    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #495057;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: #fff;
    }

    .form-control-file {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    form {
        margin-top: 20px;
        margin-bottom: 20px;
    }

</style>




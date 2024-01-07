<?php include "db.php"; ?>
<?php include "header.php"; ?>

    <?php include "navigation.php"; ?>

    <?php

    	if (isset($_GET['orderid'])) {
    		$orderid_cancel = $_GET['orderid'];
            $bus_id = $_GET['bus_id'];

    		$query = "DELETE FROM orders WHERE order_id=$orderid_cancel";

    		$cancel_order = mysqli_query($connection,$query);

    		if (!$cancel_order) {
    			die("Query Failed".mysqli_error($connection));
    		}
    	}

        $query = "SELECT available_seats FROM posts WHERE post_id=$bus_id";
        $get_seats = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($get_seats)) {
            $available_seats = $row['available_seats'];
        }

        $query = "UPDATE posts SET available_seats=$available_seats-1 WHERE post_id=$bus_id";
        $update_seats = mysqli_query($connection,$query);

    ?>

    <div class="container" style="width: 50%;">
        
    	<p><h3>Vaša karta stoji Otkazana prema vašem zahtjevu</h3></p>
    	<br>

    </div>
        <hr>


<?php include "footer.php"; ?> 
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Pretraživanje autobusa</h4>
                    <form action="search.php" method="post">

                        
                            <input name="source" type="text" class="form-control" placeholder="Polazak">
                            <input name="destination" type="text" class="form-control" placeholder="Destinacija" style="margin-top: 10px;">


                            <input type="date" style="margin-top: 10px;" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
                            
                            <button class="btn btn-primary" name="submit" style="margin-left: 130px; margin-top: 10px;">Pretraži</button>
                        
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Login -->
                <?php

                    if (!isset($_SESSION['s_username'])) {
                        ?>
                            <div class="well">
                                <h4>Prijava</h4>
                                <form action="includes/login.php" method="post">

                                    
                                        <input name="username" type="text" class="form-control" placeholder="Korisničko ime">
                                        <input name="password" type="password" class="form-control" placeholder="Šifra" style="margin-top: 10px;">

                                        <button class="btn btn-primary" name="login" style="margin-left: 130px; margin-top: 10px;">Prijavi se</button>
                                    
                                </form>
                                <!-- /.input-group -->
                            </div>
                        
                <?php } ?>

                



                <!-- Blog Categories Well -->
                <div class="well">


                    <?php 

                        $query = "SELECT *  FROM  categories";
                        $select_categories_sidebar = mysqli_query($connection,$query);

                     ?>




                    <h4>Kategorije</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                                <?php
                                    while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];
                                         echo "<li> <a href='category.php?category=$cat_id'> $cat_title </a></li>";
                                    }

                                ?>

                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>


                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>

            </div>

            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f8f8f8;
                }

                .well {
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                    margin-bottom: 20px;
                    padding: 20px;
                }

                .form-control {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    box-sizing: border-box;
                }

                .btn-primary {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    padding: 10px 20px;
                    cursor: pointer;
                }

                .btn-primary:hover {
                    background-color: #0056b3;
                }

                .list-unstyled {
                    padding-left: 0;
                    list-style: none;
                }

                .list-unstyled li {
                    margin-bottom: 10px;
                }

                .page-header {
                    margin: 20px 0;
                    color: #333;
                }

                .page-header small {
                    color: #777;
                }

                .widget {
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                    margin-bottom: 20px;
                    padding: 20px;
                }
            </style>

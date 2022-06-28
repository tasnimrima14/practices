<div class="row">

    <?php
        include 'config/db_config.php';

        $sql = "SELECT * FROM photos ORDER BY id DESC";

        $res = $db->query($sql) or die('wrong query');

        while ($row = $res->fetch_array(MYSQLI_ASSOC)){
            ?>
                <div class="col-md-4" style="margin-top: 30px">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img style="height: 250px; width: 100%"
                             src="photos/<?php echo $row['image']; ?>" class="img-fluid"/>
                            <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text">
                                <?php echo $row['description']; ?>
                            </p>
                            <!-- <a href="#!" class="btn btn-primary">Button</a> -->
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>

</div>

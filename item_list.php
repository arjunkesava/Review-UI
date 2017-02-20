<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welocome to Review</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php
        if(isset($_GET['q']) && $_GET['q']=='mobile_phone')
        {
    ?>
    <!-- 
    // Mobile Content is Displayed Here
     -->
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 class="page-head">Welcome to Mobile Review App</h1>
            </div>
        </div>
        <hr>
        <div class="row" align="center">
            <p class="page-head">Please select a Mobile Phone, you love and give us your review about it...</p>
            <?php
                $con=mysqli_connect("localhost","review_data","tiger","review_data");
                if($con){
                    $sql="SELECT `id`,`full_name`,`ram`,`camera`,`battery`,`image_location` FROM `mobile_phone_details`";
                    $res=mysqli_query($con,$sql);
                    while($info=mysqli_fetch_array($res))
                    {
                        echo '
                        <div class="col-sm-3 col-xs-6">
                        <a href="item_description.php?q=mobile_phone_'.$info['id'].'">
                        <img class="img-responsive" src="'.$info['image_location'].'" alt="">
                        </a>
                        <h3><p>'.$info['full_name'].'</p></h3>
                        <h6><strong>'.$info['ram'].'GB RAM, '.$info['camera'].'MP CAM, '.$info['battery'].'mAh</strong></h6>
                        </div>
                        ';
                    }
                }
                ?>
            
            <!--
            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="mobile_images/motorola-moto-g4-plus-r.jpg" alt="">
                </a>
                <h3><p>Moto G4 Plus</p></h3>
                <h6><strong>4GB RAM, 32GB ROM, 1200mAh</strong></h6>
            </div>
            -->
        </div>
        <hr>
     <?php
        }
        if(isset($_GET['q']) && $_GET['q']=='lap_top')
        {
    ?>
    <!-- 
    // LapTop Content is Displayed Here
     -->
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 class="page-head">Welcome to Lap Top Review App</h1>
            </div>
        </div>
        <hr>
        <div class="row" align="center">
            <p class="page-head">Please select any Lap Top, you like and give us your review about it...</p>
            <?php
                $con=mysqli_connect("localhost","review_data","tiger","review_data");
                if($con){
                    $sql="SELECT `id`, `full_name`, `processor`, `operating_system`, `ram`, `graphic_card`, `storage`, `image_location` FROM `lap_top_details`";
                    $res=mysqli_query($con,$sql);
                    while($info=mysqli_fetch_array($res))
                    {
                        echo '
                        <div class="col-sm-4 col-xs-5">
                        <a href="item_description.php?q=lap_top_'.$info['id'].'">
                        <img class="img-responsive" src="'.$info['image_location'].'" alt="">
                        </a>
                        <h3><p>'.$info['full_name'].'</p></h3>
                        <h6><strong>'.$info['processor'].' | '.$info['operating_system'].' | '.$info['ram'].' | '.$info['storage'].'</strong></h6>
                        </div>
                        ';
                    }
                }
                ?>
            
            <!--
            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="mobile_images/motorola-moto-g4-plus-r.jpg" alt="">
                </a>
                <h3><p>Moto G4 Plus</p></h3>
                <h6><strong>4GB RAM, 32GB ROM, 1200mAh</strong></h6>
            </div>
            -->
        </div>
        <hr>
    <?php
        }
        if(isset($_GET['q']) && $_GET['q']=='pen_drive')
        {
    ?>
    <!-- 
    // Pendrive Content is Displayed Here
     -->
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 class="page-head">Welcome to Pen Drive Review App</h1>
            </div>
        </div>
        <hr>
        <div class="row" align="center">
            <p class="page-head">Please select a Mobile Phone, you love and give us your review about it...</p>
            <?php
                $con=mysqli_connect("localhost","review_data","tiger","review_data");
                if($con){
                    $sql="SELECT `id`,`full_name`,`ram`,`camera`,`battery`,`image_location` FROM `mobile_phone_details`";
                    $res=mysqli_query($con,$sql);
                    while($info=mysqli_fetch_array($res))
                    {
                        echo '
                        <div class="col-sm-3 col-xs-6">
                        <a href="item_description.php?q=mobile_phone_'.$info['id'].'">
                        <img class="img-responsive" src="'.$info['image_location'].'" alt="">
                        </a>
                        <h3><p>'.$info['full_name'].'</p></h3>
                        <h6><strong>'.$info['ram'].'GB RAM, '.$info['camera'].'MP CAM, '.$info['battery'].'mAh</strong></h6>
                        </div>
                        ';
                    }
                }
                ?>
            
            <!--
            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive" src="mobile_images/motorola-moto-g4-plus-r.jpg" alt="">
                </a>
                <h3><p>Moto G4 Plus</p></h3>
                <h6><strong>4GB RAM, 32GB ROM, 1200mAh</strong></h6>
            </div>
            -->
        </div>
        <hr>
    <?php 
        }
    ?>
        <div class="row">
            <div class="col-lg-12" align="center">
                <h3 class="page-head">Please Select an Item and Tell your Opinion about it</h3>
            </div>
        </div>
    </div>
</body>

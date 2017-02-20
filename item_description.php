<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Review Your Item</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,300);
        @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

        body {
            padding: 70px 0px;
        }

        .range {
            display: table;
            position: relative;
            height: 25px;
            margin-top: 20px;
            background-color: rgb(245, 245, 245);
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .range input[type="range"] {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            -ms-appearance: none !important;
            -o-appearance: none !important;
            appearance: none !important;

            display: table-cell;
            width: 100%;
            background-color: transparent;
            height: 25px;
            cursor: pointer;
        }
        .range input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        -ms-appearance: none !important;
        -o-appearance: none !important;
        appearance: none !important;

        width: 11px;
        height: 25px;
        color: rgb(255, 255, 255);
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0px;
        background-color: rgb(153, 153, 153);
        }

        .range input[type="range"]::-moz-slider-thumb {
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        -ms-appearance: none !important;
        -o-appearance: none !important;
        appearance: none !important;

        width: 11px;
        height: 25px;
        color: rgb(255, 255, 255);
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0px;
        background-color: rgb(153, 153, 153);
        }

        .range output {
        display: table-cell;
        padding: 3px 5px 2px;
        min-width: 40px;
        color: rgb(255, 255, 255);
        background-color: rgb(153, 153, 153);
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        width: 1%;
        white-space: nowrap;
        vertical-align: middle;

        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        transition: all 0.5s ease;

        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: -moz-none;
        -o-user-select: none;
        user-select: none;
        }
        .range input[type="range"] {
        outline: none;
        }

        .range.range-primary input[type="range"]::-webkit-slider-thumb {
        background-color: rgb(66, 139, 202);
        }
        .range.range-primary input[type="range"]::-moz-slider-thumb {
        background-color: rgb(66, 139, 202);
        }
        .range.range-primary output {
        background-color: rgb(66, 139, 202);
        }
        .range.range-primary input[type="range"] {
        outline-color: rgb(66, 139, 202);
        }

        .range.range-success input[type="range"]::-webkit-slider-thumb {
        background-color: rgb(92, 184, 92);
        }
        .range.range-success input[type="range"]::-moz-slider-thumb {
        background-color: rgb(92, 184, 92);
        }
        .range.range-success output {
        background-color: rgb(92, 184, 92);
        }
        .range.range-success input[type="range"] {
        outline-color: rgb(92, 184, 92);
        }

        .range.range-info input[type="range"]::-webkit-slider-thumb {
        background-color: rgb(91, 192, 222);
        }
        .range.range-info input[type="range"]::-moz-slider-thumb {
        background-color: rgb(91, 192, 222);
        }
        .range.range-info output {
        background-color: rgb(91, 192, 222);
        }
        .range.range-info input[type="range"] {
        outline-color: rgb(91, 192, 222);
        }

        .range.range-warning input[type="range"]::-webkit-slider-thumb {
        background-color: rgb(240, 173, 78);
        }
        .range.range-warning input[type="range"]::-moz-slider-thumb {
        background-color: rgb(240, 173, 78);
        }
        .range.range-warning output {
        background-color: rgb(240, 173, 78);
        }
        .range.range-warning input[type="range"] {
        outline-color: rgb(240, 173, 78);
        }

        .range.range-danger input[type="range"]::-webkit-slider-thumb {
        background-color: rgb(217, 83, 79);
        }
        .range.range-danger input[type="range"]::-moz-slider-thumb {
        background-color: rgb(217, 83, 79);
        }
        .range.range-danger output {
        background-color: rgb(217, 83, 79);
        }
        .range.range-danger input[type="range"] {
        outline-color: rgb(217, 83, 79);
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-head">Welcome to Review App</h1>
            </div>
        </div>
        <?php
            $id= $_GET['q'];
            $id=explode('_',$id);

            if($id[0]."_".$id[1] == "mobile_phone")
            {
                // FOR MOBILE PHONES
                echo '<form method="post" action="final.php?q=mobile_phone">';
                $con=mysqli_connect("localhost","review_data","tiger","review_data");
                if($con){
                    $sql="SELECT `id`,`full_name`,`description`,`screen`,`ram`,`camera`,`battery`,`image_location` FROM `mobile_phone_details` where id = {$id[2]} ";
                    $res=mysqli_query($con,$sql);
                    while($info=mysqli_fetch_array($res)){
                        echo '<input type="hidden" name="id" value="'.$id[2].'">';
                    ?>
                    <div class="row">
                        <div class="col-sm-3 col-xs-3">
                            <?php
                                echo '<img src="'.$info['image_location'].'" alt="Not Found" class="img responsive">';
                            ?>

                        </div>
                        <div class="col-lg-9">
                            <?php 
                                echo '
                                <h2 class="page-head"><strong>'.$info['full_name'].'</strong></h2>
                                <table class="table">
                                <tr>
                                <td>
                                Screen: <h3><strong>'.$info['screen'].'\'\'</strong></h3>inches
                                </td>
                                <td>
                                Camera: <h3><strong>'.$info['camera'].'</strong></h3>MP
                                </td>
                                <td>
                                RAM: <h3><strong>'.$info['ram'].'</strong></h3>GB
                                </td>
                                <td>
                                Battery: <h3><strong>'.$info['battery'].'</strong></h3>mAh
                                </td>
                                </tr>
                                </table>';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-lg-12">
                            <strong>Description:</strong>
                            <p>
                                <?php
                                    echo $info['description'];
                                ?>
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-lg-4">
                            <strong>Your Name: </strong>
                            <input type="text" class="form-control" name="user_name" title="Please Enter Your Name" required>
                        </div>
                        <div class="col-lg-4">
                            <strong>Your Mail ID: </strong>
                            <input type="text" class="form-control" name="user_mail_id" title="Please Enter Your Mail Number" required>  
                        </div>
                        <div class="col-lg-4">
                            <strong>Your Cell: </strong>
                            <input type="text" class="form-control" name="user_cell_number" title="Please Enter Your Mobile Number" required>  
                        </div>                      
                        <br />
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-lg-4">
                            <strong>Battery: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="battery" min="1" max="10" onchange="battery_output.value=value">  
                                <output id="battery_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Screen: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="screen" min="1" max="10" onchange="screen_output.value=value">  
                                <output id="screen_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>RAM: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="ram" min="1" max="10" onchange="ram_output.value=value">  
                                <output id="ram_output">5</output>
                            </div>
                        </div>                      
                        <br />
                    </div>
                    <div class="row"> 
                        <br />
                        <div class="col-lg-4">
                            <strong>Processor: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="processor" min="0" max="10" onchange="processor_output.value=value">  
                                <output id="processor_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Camera: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="camera" min="0" max="10" onchange="camera_output.value=value">  
                                <output id="camera_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>4G Support: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="4gsupport" min="0" max="10" onchange="fourgsupport_output.value=value">  
                                <output id="fourgsupport_output">5</output>
                            </div>
                        </div>                      
                        <br />
                    </div>
                    <div class="row"> 
                        <br />
                        <div class="col-lg-4">
                            <strong>Sensors: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="sensors" min="0" max="10" onchange="sensors_output.value=value">  
                                <output id="sensors_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Value for Price: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="price_value" min="0" max="10" onchange="price_value_output.value=value">  
                                <output id="price_value_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Style: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="style" min="0" max="10" onchange="style_output.value=value">  
                                <output id="style_output">5</output>
                            </div>
                        </div>                      
                        <br />
                    </div>
                    <div class="row">
                        <br/>
                        <div class="col-lg-10">
                            <h3><strong>Overall Rating: </strong></h3>
                            <div class="range range-success">
                                <input type="range" value=5 name="overall_rating" min="0" max="10" onchange="overall_rating_output.value=value">  
                                <output id="overall_rating_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3>    <strong>Submit: </strong></h3>
                            <input type="submit" class="btn btn-success" value="Done" name="mobile_phone_submit">            
                        </div>
                        <br/>
                    </div>
                </div>
                </form>
                <?php 
            }}

        }
        if($id[0]."_".$id[1] == "lap_top")
        {
            // FOR LAP TOPS
                echo '<form method="post" action="final.php?q=lap_top">';
                $con=mysqli_connect("localhost","review_data","tiger","review_data");
                if($con){
                    $sql="SELECT `id`, `full_name`, `description`, `processor`, `operating_system`, `ram`, `graphic_card`, `screen_size`, `storage`, `image_location` FROM `lap_top_details` WHERE id='{$id[2]}'";
                    $res=mysqli_query($con,$sql);
                    while($info=mysqli_fetch_array($res)){
                        echo '<input type="hidden" name="id" value="'.$id[2].'">';
                    ?>
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <?php
                                echo '<img src="'.$info['image_location'].'" alt="Image Not Found" class="img responsive" width="100%" height="30%">';
                            ?>

                        </div>
                        <div class="col-lg-9">
                            <?php 
                                echo '
                                <h2 class="page-head"><strong>'.$info['full_name'].'</strong></h2>
                                <table class="table">
                                <tr>
                                <td>
                                Processor: <h3><strong>'.$info['processor'].'</strong></h3>
                                </td>
                                <td>
                                Operating System: <h3><strong>'.$info['operating_system'].'</strong></h3>
                                </td>
                                <td>
                                RAM: <h3><strong>'.$info['ram'].'</strong></h3>
                                </td>
                                <td>
                                Graphic Card: <h3><strong>'.$info['graphic_card'].'</strong></h3>
                                </td>
                                <td>
                                Screen: <h3><strong>'.$info['screen_size'].'\'\'</strong></h3>inches
                                </td>
                                <td>
                                Storage: <h3><strong>'.$info['storage'].'</strong></h3>
                                </td>
                                </tr>
                                </table>';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-lg-12">
                            <strong>Description:</strong>
                            <p>
                                <?php
                                    echo $info['description'];
                                ?>
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-lg-4">
                            <strong>Your Name: </strong>
                            <input type="text" class="form-control" name="user_name" title="Please Enter Your Name" required>
                        </div>
                        <div class="col-lg-4">
                            <strong>Your Mail ID: </strong>
                            <input type="text" class="form-control" name="user_mail_id" title="Please Enter Your Mail Number" required>  
                        </div>
                        <div class="col-lg-4">
                            <strong>Your Cell: </strong>
                            <input type="text" class="form-control" name="user_cell_number" title="Please Enter Your Mobile Number" required>  
                        </div>                      
                        <br />
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-lg-4">
                            <strong>Battery Back Up: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="battery" min="0" max="10" onchange="battery_output.value=value">  
                                <output id="battery_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Screen: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="screen" min="0" max="10" onchange="screen_output.value=value">  
                                <output id="screen_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>RAM: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="ram" min="0" max="10" onchange="ram_output.value=value">  
                                <output id="ram_output">5</output>
                            </div>
                        </div>                      
                        <br />
                    </div>
                    <div class="row"> 
                        <br />
                        <div class="col-lg-4">
                            <strong>Processor: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="processor" min="0" max="10" onchange="processor_output.value=value">  
                                <output id="processor_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Graphic Card: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="graphic_card" min="0" max="10" onchange="graphic_card_output.value=value">  
                                <output id="graphic_card_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Speaker Quality: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="speaker" min="0" max="10" onchange="speaker_output.value=value">  
                                <output id="speaker_output">5</output>
                            </div>
                        </div>                      
                        <br />
                    </div>
                    <div class="row"> 
                        <br />
                        <div class="col-lg-4">
                            <strong>Performance: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="sensors" min="0" max="10" onchange="performance_output.value=value">  
                                <output id="performance_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Value for Price: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="price_value" min="0" max="10" onchange="price_value_output.value=value">  
                                <output id="price_value_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <strong>Design / Style: </strong>
                            <div class="range range-primary">
                                <input type="range" value=5 name="style" min="0" max="10" onchange="style_output.value=value">  
                                <output id="style_output">5</output>
                            </div>
                        </div>                      
                        <br />
                    </div>
                    <div class="row">
                        <br/>
                        <div class="col-lg-10">
                            <h3><strong>Overall Rating: </strong></h3>
                            <div class="range range-success">
                                <input type="range" value=5 name="overall_rating" min="0" max="10" onchange="overall_rating_output.value=value">  
                                <output id="overall_rating_output">5</output>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3><strong>Submit: </strong></h3>
                            <input type="submit" class="btn btn-success" value="Done" name="lap_top_submit">            
                        </div>
                        <br/>
                    </div>
                </div>
                </form>
                <?php 
            }}
        }

    ?>            
</body>

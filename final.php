<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welocome to Mobile Review</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
    <style>

        #q-graph {
            display: block;
            /* fixes layout wonkiness in FF1.5 */
            position: relative;
            width: 65%;
            height: 300px;
            margin: 1.1em 0 0;
            padding: 0;
            background: transparent;
            font-size: 14px;
        }
        #q-graph tr, #q-graph th, #q-graph td {
            position: absolute;
            bottom: 0;
            width: 200px;
            z-index: 2;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        #q-graph td {
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }
        #q-graph td:hover {
            background-color: #4d4d4d;
            opacity: .9;
            color: white;
        }

        #q-graph thead tr {
            left: 100%;
            top: 50%;
            bottom: auto;
            margin: -2.5em 0 0 5em;
        }

        #q-graph thead th {
            width: 7.5em;
            height: auto;
            padding: 0.5em 1em;
        }
        #q-graph thead p{
            color: #fff;
        }
        #q-graph thead th.paid {
            top: 2.75em;
            line-height: 2;
            left: 0;
        }

        #q-graph tbody tr {
            height: 296px;
            padding-top: 2px;

            color: #AAA;
        }

        #q-graph #q1 {
            left: 0;
        }

        #q-graph #q2 {
            left: 15%;
        }

        #q-graph #q3 {
            left: 30%;
        }

        #q-graph #q4 {
            left: 45%;
            border-right: none;
        }

        #q-graph #q5 {
            left: 60%;
            border-right: none;
        }
        #q-graph #q6 {
            left: 75%;
            border-right: none;
        }
        #q-graph #q7 {
            left: 90%;
            border-right: none;
        }

        #q-graph #q8 {
            left: 105%;
            border-right: none;
        }
        #q-graph #q9 {
            left: 120%;
            border-right: none;
        }

        #q-graph tbody th {
            bottom: -1.75em;
            vertical-align: top;
            font-weight: normal;
            color: #333;
        }

        #q-graph .bar {
            width: 60px;
            border: 1px solid;
            border-bottom: none;
            color: #000;
        }

        #q-graph .bar p {
            margin: 5px 0 0;
            padding: 0;
            color: #fff;
            opacity: .4;
        }

        #q-graph .sent {
            left: 13px;
            background-color: #39cccc;
            border-color: transparent;
        }

        #q-graph .paid {
            left: 77px;
            background-color: #5cb85c;
            border-color: transparent;
        }

        #ticks {
            position: relative;
            top: -300px;
            left: 2px;
            width: 596px;
            height: 300px;
            z-index: 1;
            margin-bottom: -300px;
            font-size: 10px;
            font-family: "fira-sans-2", Verdana, sans-serif;
        }

        #ticks .tick {
            position: relative;
            border-bottom: 1px dotted #C4C4C4;
            width: 600px;
        }

        #ticks .tick p {
            position: absolute;
            left: -5em;
            top: -0.8em;
            margin: 0 0 0 0.5em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 class="page-head">Thank You</h1>
            </div>
        </div>
        <hr>
        <div class="row" align="center">
            <?php
                /*
                [battery] => 5 
                [screen] => 5 
                [ram] => 5 
                [processor] => 5 
                [camera] => 8 
                [4gsupport] => 5 
                [sensors] => 5 
                [price_value] => 5 
                [style] => 5 
                [overall_rating] => 9 
                */
                function get_client_ip() {
                    $ipaddress = '';
                    if (isset($_SERVER['HTTP_CLIENT_IP']))
                        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        else if(isset($_SERVER['HTTP_X_FORWARDED']))
                                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                                else if(isset($_SERVER['HTTP_FORWARDED']))
                                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                                    else if(isset($_SERVER['REMOTE_ADDR']))
                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                        else
                                            $ipaddress = 'UNKNOWN';
                    return $ipaddress;
                }

                if($_POST['id']!=null){
                    $con=mysqli_connect("localhost","review_data","tiger","review_data");
                    //mobile_phone_submit
                    if((isset($_POST['mobile_phone_submit']))&&($con)){
                        $sql="select userid from `user_details` where user_mail_id='{$_POST['user_mail_id']}' and user_cell_number='{$_POST['user_cell_number']}'";
                        $res = mysqli_query($con,$sql);
                        $info = mysqli_fetch_array($res);
                        if($info['userid']!=NULL)
                        {
                            $userid=$info['userid'];
                            $res=True;
                        }
                        else
                        {
                            $userid=uniqid();
                            $sql="INSERT INTO `user_details`(`userid`, `user_name`, `user_mail_id`, `user_cell_number`) VALUES ('{$userid}','{$_POST['user_name']}','{$_POST['user_mail_id']}','{$_POST['user_cell_number']}')";
                            $res=mysqli_query($con,$sql);
                        }
                        
                        if($res)
                        {
                            $dataset_uid=uniqid();
                            $ip_address=get_client_ip();
                            $sql = "INSERT INTO `mobile_phone_dataset`(`dataset_id`, `item_id`, `battery`, `screen`, `ram`, `processor`, `camera`, `4gsupport`, `sensors`, `price_value`, `style`, `overall_rating`, `userid`, `ip_address`) VALUES ('{$dataset_uid}','{$_POST['id']}','{$_POST['battery']}','{$_POST['screen']}','{$_POST['ram']}','{$_POST['processor']}','{$_POST['camera']}','{$_POST['4gsupport']}','{$_POST['sensors']}','{$_POST['price_value']}','{$_POST['style']}','{$_POST['overall_rating']}','{$userid}','{$ip_address}');";
                            $res = mysqli_query($con,$sql);
                            if($res)
                                echo '<p class="page-head">Thanks for the Time, You spent with us</p>';
                            else
                                echo '<p class="page-head">Sorry, Something went Wrong</p>';

                            echo '</div><div class="row"><div class="col-lg-12" align="center"><table id="q-graph">';
                            // The BAR Code Starts HERE
                            echo $_POST['id'].' =id<tbody>';
                            $sql = "SELECT avg(`battery`) as 'b', avg(`screen`) as 's', avg(`ram`) as 'r', avg(`processor`) as 'p', avg(`camera`) as 'c', avg(`4gsupport`) as '4g', avg(`sensors`) as 'se', avg(`price_value`) as 'pv', avg(`style`) as 'st', avg(`overall_rating`) as 'or' FROM `mobile_phone_dataset` WHERE item_id='{$_POST['id']}'";
                            $res = mysqli_query($con,$sql);
                            while($info=mysqli_fetch_array($res)){
                                echo '
                                <tbody>
                                <tr class="qtr" id="q1">
                                <th scope="row">Battery</th>
                                <td class="paid bar" style="height: '.intval($info['b']).'0%;">
                                <h3><strong><p>'.intval($info['b']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q2">
                                <th scope="row">Screen</th>
                                <td class="paid bar" style="height: '.intval($info['s']).'0%;">
                                <h3><strong><p>'.intval($info['s']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q3">
                                <th scope="row">RAM</th>
                                <td class="paid bar" style="height: '.intval($info['r']).'0%;">
                                <h3><strong><p>'.intval($info['r']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q4">
                                <th scope="row">Processor</th>
                                <td class="paid bar" style="height: '.intval($info['p']).'0%;">
                                <h3><strong><p>'.intval($info['p']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q5">
                                <th scope="row">Camera</th>
                                <td class="paid bar" style="height: '.intval($info['c']).'0%;">
                                <h3><strong><p>'.intval($info['c']).'</p></strong></h3>
                                </td>
                                </td>
                                </tr>
                                <tr class="qtr" id="q6">
                                <th scope="row">4G Support</th>
                                <td class="paid bar" style="height: '.intval($info['4g']).'0%;">
                                <h3><strong><p>'.intval($info['4g']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q7">
                                <th scope="row">Sensors</th>
                                <td class="paid bar" style="height: '.intval($info['se']).'0%;">
                                <h3><strong><p>'.intval($info['se']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q8">
                                <th scope="row">Price Value</th>
                                <td class="paid bar" style="height: '.intval($info['pv']).'0%;">
                                <h3><strong><p>'.intval($info['pv']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q9">
                                <th scope="row">Style</th>
                                <td class="paid bar" style="height: '.intval($info['st']).'0%;">
                                <h3><strong><p>'.intval($info['st']).'</p></strong></h3>
                                </td>
                                </tr>

                                </tbody>
                                ';
                            }
                        }
                        else{
                            echo "User Details Failed";
                        }
                    }
                    //lap_top_submit
                    if((isset($_POST['lap_top_submit']))&&($con)){
                        
                        $sql="select userid from `user_details` where user_mail_id='{$_POST['user_mail_id']}' and user_cell_number='{$_POST['user_cell_number']}'";
                        $res = mysqli_query($con,$sql);
                        $info = mysqli_fetch_array($res);
                        if($info['userid']!=NULL)
                        {
                            $userid=$info['userid'];
                            $res=True;
                        }
                        else
                        {
                            $userid=uniqid();
                            $sql="INSERT INTO `user_details`(`userid`, `user_name`, `user_mail_id`, `user_cell_number`) VALUES ('{$userid}','{$_POST['user_name']}','{$_POST['user_mail_id']}','{$_POST['user_cell_number']}')";
                            $res=mysqli_query($con,$sql);
                        }
                        
                        if($res)      
                        {
                            $dataset_uid=uniqid();
                            $ip_address=get_client_ip();
                            $sql = "INSERT INTO `mobile_phone_dataset`(`dataset_id`, `item_id`, `battery`, `screen`, `ram`, `processor`, `camera`, `4gsupport`, `sensors`, `price_value`, `style`, `overall_rating`, `userid`, `ip_address`) VALUES ('{$dataset_uid}','{$_POST['id']}','{$_POST['battery']}','{$_POST['screen']}','{$_POST['ram']}','{$_POST['processor']}','{$_POST['camera']}','{$_POST['4gsupport']}','{$_POST['sensors']}','{$_POST['price_value']}','{$_POST['style']}','{$_POST['overall_rating']}','{$userid}','{$ip_address}');";
                            $res = mysqli_query($con,$sql);
                            if($res)
                                echo '<p class="page-head">Thanks for the Time, You spent with us</p>';
                            else
                                echo '<p class="page-head">Sorry, Something went Wrong</p>';

                            echo '</div><div class="row"><div class="col-lg-12" align="center"><table id="q-graph">';
                            // The BAR Code Starts HERE
                            echo $_POST['id'].' =id<tbody>';
                            $sql = "SELECT avg(`battery`) as 'b', avg(`screen`) as 's', avg(`ram`) as 'r', avg(`processor`) as 'p', avg(`camera`) as 'c', avg(`4gsupport`) as '4g', avg(`sensors`) as 'se', avg(`price_value`) as 'pv', avg(`style`) as 'st', avg(`overall_rating`) as 'or' FROM `mobile_phone_dataset` WHERE item_id='{$_POST['id']}'";
                            $res = mysqli_query($con,$sql);
                            while($info=mysqli_fetch_array($res)){
                                echo '
                                <tbody>
                                <tr class="qtr" id="q1">
                                <th scope="row">Battery</th>
                                <td class="paid bar" style="height: '.intval($info['b']).'0%;">
                                <h3><strong><p>'.intval($info['b']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q2">
                                <th scope="row">Screen</th>
                                <td class="paid bar" style="height: '.intval($info['s']).'0%;">
                                <h3><strong><p>'.intval($info['s']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q3">
                                <th scope="row">RAM</th>
                                <td class="paid bar" style="height: '.intval($info['r']).'0%;">
                                <h3><strong><p>'.intval($info['r']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q4">
                                <th scope="row">Processor</th>
                                <td class="paid bar" style="height: '.intval($info['p']).'0%;">
                                <h3><strong><p>'.intval($info['p']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q5">
                                <th scope="row">Camera</th>
                                <td class="paid bar" style="height: '.intval($info['c']).'0%;">
                                <h3><strong><p>'.intval($info['c']).'</p></strong></h3>
                                </td>
                                </td>
                                </tr>
                                <tr class="qtr" id="q6">
                                <th scope="row">4G Support</th>
                                <td class="paid bar" style="height: '.intval($info['4g']).'0%;">
                                <h3><strong><p>'.intval($info['4g']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q7">
                                <th scope="row">Sensors</th>
                                <td class="paid bar" style="height: '.intval($info['se']).'0%;">
                                <h3><strong><p>'.intval($info['se']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q8">
                                <th scope="row">Price Value</th>
                                <td class="paid bar" style="height: '.intval($info['pv']).'0%;">
                                <h3><strong><p>'.intval($info['pv']).'</p></strong></h3>
                                </td>
                                </tr>
                                <tr class="qtr" id="q9">
                                <th scope="row">Style</th>
                                <td class="paid bar" style="height: '.intval($info['st']).'0%;">
                                <h3><strong><p>'.intval($info['st']).'</p></strong></h3>
                                </td>
                                </tr>

                                </tbody>
                                ';
                            }
                        }
                    }
                    else
                    {
                        echo '<p class="page-head">Connection Refused. Try Again</p>';
                        echo '</div>';
                    }
                    $_POST['id']=null;
                }
            ?>
            </table>
            <div id="ticks">
                <div class="tick" style="height: 59px;">
                    <p>100</p>
                </div>
                <div class="tick" style="height: 59px;">
                    <p>80</p>
                </div>
                <div class="tick" style="height: 59px;">
                    <p>60</p>
                </div>
                <div class="tick" style="height: 59px;">
                    <p>40</p>
                </div>
                <div class="tick" style="height: 59px;">
                    <p>20</p>
                </div>
                <div class="tick" style="height: 59px;">
                    <p>0</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
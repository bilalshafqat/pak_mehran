<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/24/17
 * Time: 11:14 PM
 */

include_once 'dbHandler.php';
$dbHandler = new dbHandler();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // …

    $eventCode = $_GET['eventCode'];
    $dbHandler = new dbHandler();
    $results = $dbHandler->getSpecificEventDetails($eventCode);
    if(isset($_SESSION['my_array'])){
        $itemResults = $_SESSION['my_array'];
    }else{
        $itemResults = $dbHandler->getAllItemsOfSpecificEvents($eventCode);
    }
    unset($_SESSION['my_array']);
    foreach ($results as $row) {
        $eventName = $row[$dbHandler->eventName];
        $dateFrom = $row[$dbHandler->eventDateStart];
        $dateTo = $row[$dbHandler->eventDateEnd];
        $balance = $row[$dbHandler->balance];
        $advance = $row[$dbHandler->advance];
        $discount = $row[$dbHandler->discountAmount];
        $grossTotal = $row[$dbHandler->grossAmount];
        $costTotal = $row[$dbHandler->totalAmount];
        $eventCode = $row[$dbHandler->eventCode];
//        $location = $row[$dbHandler->location];
        $location = "ABC";
    }

}
?>
<!DOCTYPE html>
<!--[if IE 7 ]>
<html class="ie ie7"> <![endif]-->

<!--[if IE 8 ]>
<html class="ie ie8"> <![endif]-->

<!--[if IE 9 ]>
<html class="ie ie9"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!-->
<html class="" lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->

<head>

    <meta charset="UTF-8">

    <title>Shaheen Shinwari</title>
    <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE"/>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="PAK Mehran Event Services" content="index, follow"/>

    <meta name="keywords" content=""/>

    <meta name="description" content=""/>

    <!-- CSS LIBRARY -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">


    <!-- AWE FONT -->

    <link rel="stylesheet" type="text/css" href="css/awe-fonts.css">

    <!-- PAGE STYLE -->

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <![endif]-->


    <title>Ambrosia</title>


</head>

<body id="page-top" class="home onepage" data-spy="scroll">
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
       <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a href="index.php">Dashboard</a>
            </li>
            <li>
                <a href="items_list.php">Search Items</a>
            </li>
            <li>
                <a href="search_event.php">Search Events</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!--navbar-->

    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#menu-toggle" data-activates="slide-out" class="button-collapse toggle-button" id="menu-toggle"><i
                    class="fa fa-bars"></i></a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <h1>PAK Mehran Event Services</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="update_event_save.php" id="cost-details" method="post">
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <h3>Ordered Items</h3>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $grossTotal = array();
                $totalItems = array();
                $count = 0;
                $items = array();
                foreach ($itemResults as $row) {
                    if ($count == 0) {
                        $count = $count + 1;
                        echo '<tr>';
                    }
                    $quantityOdered = intval($row[$dbHandler->quantityBooked]);
                    $price = intval($row[$dbHandler->price]);
                    $name = $row[$dbHandler->name];
                    $totalCost = $quantityOdered * $price;
                    $items["name"] = $row[$dbHandler->itemCode];
                    $items["quantyBooked"] = $quantityOdered;
                    array_push($totalItems,$items);
                    array_push($grossTotal, $totalCost);
                    echo '   <td>' . $row[$dbHandler->name] . '</td>';
                    echo '   <td>' . $quantityOdered . '</td>';
                    echo '   <td>' . $totalCost . '</td>';
                    if ($count == 2) {
                        $count = 0;
                        echo '</tr>';
                    }
                }
                $_SESSION["itemsArray"] = $totalItems;
                $_SESSION['eventCode'] = $eventCode;
                ?>

                </tbody>
            </table>
                <?php
                echo  '<a href="items_ordered.php?eventCode='. $eventCode .'" value="Update" class="btn btn-warning btn-lg"
                               style="margin-top: 2em;width: 500px;" >Update</a>';
                ?>

            <?php
            $costTotal = 0;
            for ($i = 0; $i < count($grossTotal); $i++) {
                $costTotal += $grossTotal[$i];
            }
            ?>

            <div class="accnt-calc">
                <div class="form-group">
                    <label for="eventname1">Event Name</label>
                    <label for="eventname1" name="eventName"><?php echo $eventName ?></label>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date To:</label>
                            <label name="dateTo"><?php echo $dateTo ?></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date From:</label>
                            <label name="dateFrom"><?php echo $dateFrom ?></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="location1">Location</label>
                            <label name="location"><?php echo $location ?></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="grossTotal" class="grossTotal">Gross Total</label>
                            <label for="grossTotal" class="form-control" id="grossTotal"
                                   name="grossTotal"><?php echo $costTotal ?></label>
                            <input type="hidden" name="grossTotal" value="<?php echo $costTotal; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" name='discount' class="form-control" id="disc" placeholder="0"
                                   value="0"
                                   min="0">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="totalCost">Total</label>
                            <input type="number" class="form-control" name='' disabled="disabled" id="total"
                                   placeholder="0" value=<?php echo $costTotal ?> min="0">
                            <input type="hidden" name="total" value="<?php echo $costTotal; ?>">
                            <!--                <label for="total" id= "total" name="total"></label>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="totalCost">Advance</label>
                            <input type="number" class="form-control" name='' id="advance"
                                   placeholder="0" value=<?php echo $costTotal ?> min="0">
                            <input type="hidden" name="advance" value="<?php echo $costTotal; ?>">
                            <!--                <label for="total" id= "total" name="total"></label>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="totalCost">Balance</label>
                            <input type="number" class="form-control" name='balance'  id="balance"
                                   placeholder="0" value="0" min="0">
                            <!--                <label for="total" id= "total" name="total"></label>-->
                        </div>
                    </div>
                </div>
                <div class="button-cox">
                    <div class="row">
                        <div class="col-md-6">
<!--                            --><?php
//                            echo  '<a href="update_event_save.php?eventCode='. $eventCode .'" value="Update" class="btn btn-warning btn-lg"
//                               style="margin-top: 2em;width: 500px;" >Update</a>';
//                            ?>
                            <div class="col-md-6">
                                <input type="submit" id="btn-create-event" class="btn btn-warning btn-lg" style="margin-top: 2em;width: 500px;"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a href="" value="Delete" class="btn btn-danger btn-lg"
                               style="margin-top: 2em;width: 500px;">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>

<!-- SideNav Menu -->


<!-- END / PAGE WRAP -->


<!-- LOAD JQUERY -->

<script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- ANIMATION -->

<script>

    function getTotal(costTotal) {
        var discount = parseFloat($('#disc').val());
        var costTotal = pars
    }

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>

    function getTotal(costTotal) {
        var discount = parseFloat($('#disc').val());
    }

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('#grossTotal, #disc').bind('keypress blur', function () {

        $('#total').val(parseFloat($('#grossTotal').text()) - parseFloat($('#disc').val()));
    });
    $('#advance, #disc').bind('keypress blur', function () {

        $('#balance').val(parseFloat($('#total').val()) - parseFloat($('#advance').val()));
    });
</script>
<script>


</script>


<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/24/17
 * Time: 11:14 PM
 */
include_once 'dbHandler.php';
$dbHandler = new dbHandler();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // …

    $eventCode = $_GET['eventCode'];
    $dbHandler = new dbHandler();
    $itemResults = $dbHandler->getAllItemsOfSpecificEvents($eventCode);
    $itemsNotInSpecificEvent = $dbHandler->getAllItemsNotInSpecificEvents($eventCode);
    $results = $dbHandler->getSpecificEventDetails($eventCode);
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
        <form action="" id="cost-details" method="post">

            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <h3>Ordered Items</h3>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity Ordered</th>
                    <th>Cost</th>
                    <th> Item Left</th>
                    <th> Amount/ Piece</th>
                    <th> Check Box</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $count = 0;
                $items = array();
                foreach ($itemResults as $row) {

                    echo '<tr>';
                    $quantityOdered = intval($row[$dbHandler->quantityBooked]);
                    $quantityLeft = $dbHandler->getQuantityLeft($dateFrom,$dateTo,$row[$dbHandler->itemCode], $row[$dbHandler->quantity]);
                    $price = intval($row[$dbHandler->price]);
                    $name = $row[$dbHandler->name];
                    $count = $count +1;
                    $totalCost = $quantityOdered * $price;
                    echo '   <td><div id="item-name'. $count .'">' . $row[$dbHandler->name] . '</div></td>';
                    echo '   <td><div  class="only-numbers" id="quantity-ordered'. $count .'" contenteditable>' . $quantityOdered . '</div></td>';
                    echo '   <td><div id="total-cost'. $count .'">' . $totalCost . '</div></td>';
                    echo '   <td>' . $quantityLeft . '</td>';
                    echo '   <td><div id="price'. $count .'">' . $price . '</div></td>';
                    echo '   <td class="vcenter"><input type="checkbox" id="' . $count .'" name ="'. $row[$dbHandler->itemCode] .'" value=""/></td>';
                    echo '</tr>';
                }

                foreach ($itemsNotInSpecificEvent as $row) {

                    echo '<tr>';
                    $quantityOdered = 0;
                    $quantityLeft = $dbHandler->getQuantityLeft($dateFrom,$dateTo,$row[$dbHandler->itemCode], $row[$dbHandler->quantity]);
                    $price = intval($row[$dbHandler->price]);
                    $name = $row[$dbHandler->name];
                    $totalCost = $quantityOdered * $price;
                    $count =  $count +1;
                    echo '   <td><div id="item-name'. $count .'">' . $row[$dbHandler->name] . '</div></td>';
                    echo '   <td><div class="only-numbers" id="quantity-ordered'. $count .'"  contenteditable>' . $quantityOdered . '</div></td>';
                    echo '   <td><div id="total-cost'. $count .'">' . $totalCost . '</div></td>';
                    echo '   <td>' . $quantityLeft . '</td>';
                    echo '   <td><div id="price'. $count .'">' . $price . '</div></td>';
                    echo '   <td class="vcenter"><input type="checkbox" id="' . $count .'"  name ="'. $row[$dbHandler->itemCode] .'" value="1"/></td>';
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>
            </div>
            <input type="submit" value="Submit" class="homebutton" id="myBtn"/>
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

    function postItem(){
        alert("here");
    }

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    $(".only-numbers").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||  // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }

    });
    $(".only-numbers").keyup(function(event) {
        var ids = $(this).attr("id");
        var ids = ids.charAt(ids.length - 1);
        var qty = parseInt($('#quantity-ordered' + ids).text());
        var cost = qty * parseInt($('#price' + ids).text());
        $('#total-cost' + ids).text(cost);
    });

    $('input[type=checkbox]').click(function () {
        if ($('input[type=checkbox]').is(':checked')) {
            var ids = $(this).attr("id");
            if(parseInt($('#quantity-ordered'+ids).text()) <= 0){
                $('#quantity-ordered'+ids).text("1");
            }
        }
        var totalCost = parseInt($('#quantity-ordered'+ids).text()) * parseInt($('#price'+ids).text())
        $('#total-cost'+ids).text(totalCost);
    });

</script>
<script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
        var checkedValues = $('input:checkbox:checked').map(function() {
            var ids = $(this).attr("id");
            var itemCode = document.getElementById(ids).name;
            var checkBoxName = $('#item-name'+ids).text();
            var quantityOrdered = $('#quantity-ordered'+ids).text();
            var cost = $('#price'+ids).text();
            return {name: checkBoxName, quantity_booked:quantityOrdered , Price:cost, items_code:itemCode };
        }).get();

        $.ajax({
            url:'store_session.php',
            type: 'POST',
            data: {data:checkedValues},
            success: function(data) {
                window.location.href = 'update_event.php?eventCode=<?php echo $eventCode ?>'
            }
        }).error (function() {
            alert('error');
        })
    });
</script>

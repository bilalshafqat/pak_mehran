<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/29/17
 * Time: 11:22 AM
 */

include_once 'dbHandler.php';
$dbHandler = new dbHandler();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

// …

    $itemCode = $_GET['itemCode'];
}
$results = [];
$results = $dbHandler->getSpecificItemDetails($itemCode);
foreach ($results as $row) {
    $itemName = $row[$dbHandler->name];
    $itemCode = $row[$dbHandler->itemCode];
    $qty = $row[$dbHandler->quantity];
    $price = $row[$dbHandler->price];
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
        <form action="" id="item-details" method="post">
            <div class="accnt-calc">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Item Code</label>
                            <div class='input-group'>
                                <input type='text' disabled="disabled" required="required" id='item-code'
                                       name="item-name" value="<?php echo $itemCode ?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Item Name</label>
                            <div class='input-group'>
                                <input type='text' disabled="disabled" required="required" id='item-name' name="item-name"
                                       value="<?php echo $itemName ?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quantity</label>
                            <div class='input-group'>
                                <input type='number' disabled="disabled" required="required" id='quantity' name="quantity"
                                       value="<?php echo $qty ?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <div class='input-group'>
                                <input type='number' disabled="disabled" required="required" id='price' name="price"
                                       value="<?php echo $price ?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="submit" value="Delete" class="btn btn-primary" onclick="getConfirmation()" id="myBtn"/>
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
<script src="js/dynamitable.jquery.min.js"></script>
<script src="js/paging.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- ANIMATION -->

<script>


    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

 <script type="text/javascript">
        <!--
        function getConfirmation() {
            var retVal = confirm("Do you want to continue ?");
            if (retVal == true) {
                var itemCode = $("#item-code").val();
                $.ajax({
                    url: 'delete-item-save.php',
                    type: 'POST',
                    data: {
                        data: {
                            itemCode: itemCode
                        }
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            alert('Item Deleted Successfully');
                            window.location.href = 'items_list.php';
                        } else {
                            alert('error');
                            window.location.href = 'items_list.php';
                        }
                    }
                }).error(function() {
                    alert('error');
                })
            } else {
                window.location.href = 'items_list.php';
            }
        }
        //-->
    </script>



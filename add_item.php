<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/29/17
 * Time: 11:22 AM
 */

include_once 'dbHandler.php';
$dbHandler = new dbHandler();
$results = [];
if(isset($_POST["type"]) && $_POST["type"] == "update"){
    $itemsAdded = $_POST['data'];
    $name = $itemsAdded["name"];
    $qty = $itemsAdded["qty"];
    $price = $itemsAdded["price"];
    $itemCode = $itemsAdded["itemCode"];
    $result = $dbHandler->updateItems($itemCode, $name, $qty, $price);
    if ($results) {
        echo '$results';
    } else {
        echo '';
    }
}else {
    $itemsAdded = $_POST['data'];
    $name = $itemsAdded["name"];
    $qty = $itemsAdded["qty"];
    $price = $itemsAdded["price"];
    $itemCode = $itemsAdded["itemCode"];
    $result = $dbHandler->insertItems($itemCode, $name, $qty, $price);
    if ($result == true) {
        $response_array['status'] = 'success'; 
    } else {
        $response_array['status'] = 'error';  
    }

    header('Content-type: application/json');
    echo json_encode($response_array);
}
?>
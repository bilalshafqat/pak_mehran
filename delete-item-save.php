<?php

include_once 'dbHandler.php';
$dbHandler = new dbHandler();
$results = [];

    $itemsAdded = $_POST['data'];
    $itemCode = $itemsAdded["itemCode"];
    $result = $dbHandler->deleteSpecificItem($itemCode);
    if ($result == true) {
        $response_array['status'] = 'success'; 
    } else {
        $response_array['status'] = 'error';  
    }

    header('Content-type: application/json');
    echo json_encode($response_array);
?>
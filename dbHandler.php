<?php

/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 9/30/17
 * Time: 5:41 PM
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DB', 'bilal_caters');

class DALQueryResult {

    private $_results = array();

    public function __construct(){}

    public function __set($var,$val){
        $this->_results[$var] = $val;
    }

    public function __get($var){
        if (isset($this->_results[$var])){
            return $this->_results[$var];
        }
        else{
            return null;
        }
    }
}
class dbHandler
{
    public $eventCode = "events_code";
    public $eventName = "event_name";
    public $eventDateStart = "event_date_start";
    public $eventDateEnd = "event_date_end";
    public $grossAmount = "gross_amount";
    public $discountAmount = "discount_amount";
    public $totalAmount = "total_amount";
    public $balance = "balance";
    public $advance = "advance";
    public $location = "location";
    public $itemCode = "items_code";
    public $quantityBooked = "quantity_booked";
    public $name = "name";
    public $quantity = "quantity";
    public $price = "Price";
    public $backOrder = "allow_back_order";  //bool

    public function __construct()
    {
    }

    private function getQuery($sql)
    {

        $connection = $this->dbconnect();

        $res = mysqli_query( $connection,$sql);

        if ($res) {
            if (strpos($sql, 'SELECT') === false) {
                return true;
            }
        } else {
            if (strpos($sql, 'SELECT') === false) {
                return false;
            } else {
                return null;
            }
        }

        $results = array();
        if (mysqli_num_rows($res) > 0) {
            $i = 0;
            while ($results[$i] = mysqli_fetch_assoc($res))
                $i++;
            unset($results[$i]);
        }
        return $results;

    }

    private function dbconnect()
    {

// Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function writeQueryForEventBooking($eventCode, $eventName, $eventDateStart, $eventDateEnd)
    {
        $conn = $this->dbconnect();
        $stmt = $conn->prepare("INSERT INTO event_booking($this->eventCode, $this->eventName, $this->eventDateStart, $this->eventDateEnd) 
                                VALUES (?, ?, ?,?)");
        $stmt->bind_param("isss", $eventCode, $eventName, $eventDateStart, $eventDateEnd);
        $stmt->execute();

        if ($stmt->error) {
            return false;
        } //to check errors
        else {
            return true;
        }
    }

    public function writeQueryForItemsBooking($eventCodeName, $itemCode, $quantityBooked)
    {
        $conn = $this->dbconnect();
        $stmt = $conn->prepare("INSERT INTO `booking_items` ($this->eventCode, $this->itemCode, $this->quantityBooked) 
                                VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $eventCodeName, $itemCode, $quantityBooked);
        try {
                $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
        if ($stmt->error) {
            return false;
        } //to check errors
        else {
            return true;
        }
    }

    public function writeQueryForCostBooking($eventCode, $grossAmount, $discountAmount, $totalAmount, $balance, $advance)
    {
        $conn = $this->dbconnect();
        $stmt = $conn->prepare("INSERT INTO `cost_booking` ($this->eventCode, $this->grossAmount, $this->discountAmount,$this->totalAmount, $this->balance, $this->advance) 
                                VALUES (?, ?, ?,?, ?, ?)");
        $stmt->bind_param("iddddd", $eventCode, $grossAmount, $discountAmount, $totalAmount, $balance, $advance);
        $stmt->execute();

        if ($stmt->error) {
            return false;
        } //to check errors
        else {
            return true;
        }
    }

    public function writeQueryForNewItems($itemCode, $itemName, $quantity, $allowBackOrder, $price)
    {
        $conn = $this->dbconnect();
        $stmt = $conn->prepare("INSERT INTO MyGuests ($this->itemCode, $this->name, $this->quantity, $this->backOrder, $this->price) 
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisi", $itemCode, $itemName, $quantity, $allowBackOrder,$price);
        $stmt->execute();

        if ($stmt->error) {
            return false;
        } //to check errors
        else {
            return true;
        }
    }

    public function getTodayScheduleEvents(){
        $sql = '';
        $results = [];
        $sql = "SELECT event_booking.$this->eventCode , event_booking.$this->eventName, event_booking.$this->eventDateStart, cost_booking.$this->totalAmount, cost_booking.$this->balance FROM `event_booking` 
        INNER JOIN `cost_booking` On event_booking.$this->eventCode = cost_booking.$this->eventCode
        WHERE {$this->eventDateStart} >= CURDATE() AND {$this->eventDateEnd} <= CURDATE() + INTERVAL 1 DAY";
        $results = $this->getQuery($sql);
        return $results;
    }

    public function getRecentEvents(){
        $sql = '';
        $results = [];
        $sql = "SELECT event_booking.$this->eventCode , event_booking.$this->eventName, event_booking.$this->eventDateStart, cost_booking.$this->totalAmount, cost_booking.$this->balance FROM `event_booking` 
        INNER JOIN `cost_booking` On event_booking.$this->eventCode = cost_booking.$this->eventCode
        WHERE {$this->eventDateStart} >  CURDATE() + INTERVAL 1 DAY AND {$this->eventDateEnd} <= CURDATE() + INTERVAL 6 DAY";
        $results = $this->getQuery($sql);

        return $results;
    }

    public function getQuantityLeft($dateFrom, $dateTo, $itemCode, $totalQuantity){
        $sql = '';
        $results = [];
        $quantity = 0;
        $sql = "SELECT items.{$this->itemCode},items.quantity-booking_items.quantity_booked AS 'qty' from booking_items 
                INNER JOIN event_booking ON booking_items.events_code = event_booking.events_code
                INNER JOIN items ON booking_items.items_code = items.items_code 
                where event_booking.event_date_start >= '".$dateFrom ."'   AND event_booking.event_date_end <= '".$dateTo."' AND items.items_code = '".$itemCode."'" ;
        $results = $this->getQuery($sql);
        if(count($results)>0) {
            foreach ($results as $row) {
                $quantity = $row["qty"];
            }
        }else{
            $quantity = $totalQuantity;
        }
        return $quantity;
    }

    public function getAllItems(){
        $sql = '';
        $results = [];
        $sql = "SELECT {$this->itemCode},{$this->name}, {$this->quantity},{$this->price} FROM items ORDER BY {$this->itemCode}";
        $results = $this->getQuery($sql);
        return $results;
    }
    
    public function insertItems($itemCode, $name, $qty, $price){
        $conn = $this->dbconnect();
        $stmt = $conn->prepare("INSERT INTO items($this->itemCode,$this->name, $this->quantity, $this->price) 
                                VALUES (?, ?, ?,?)");
        $stmt->bind_param("ssii", $itemCode, $name, $qty, $price);
        $stmt->execute();

        if ($stmt->error) {
            return false;
        } //to check errors
        else {
            return true;
        }
    }

    public function updateItems($itemCode, $name, $qty, $price){
        $conn = $this->dbconnect();
        $sql =  "Update `items` set {$this->name}= '" . $name . "', {$this->quantity}= '" . $qty . "', {$this->price} = '" . $price . "' Where {$this->itemCode} ='" . $itemCode . "'" ;
        $results = mysqli_query($conn,$sql);
        return $results;
    }

    public function getAllEvents(){
        $sql = '';
        $results = [];
        $sql = "SELECT * FROM `event_booking` JOIN `cost_booking` ON `event_booking`.{$this->eventCode} = `cost_booking`.{$this->eventCode} ORDER BY `event_booking`.{$this->eventDateStart}";
        $results = $this->getQuery($sql);

        return $results;
    }

    public function getLastEnteredEventCode(){
        $sql = '';
        $results = [];
        $sql = "SELECT {$this->eventCode} FROM `event_booking` ORDER BY {$this->eventCode} DESC LIMIT 1";
        $results = $this->getQuery($sql);
        $eventCode = '';
        foreach ($results as $row) {
            $eventCode = $row[$this->eventCode];
        }
        return $eventCode;
    }
    public function getSpecificItemDetails($itemCode){
        $sql = '';
        $results = [];
        $sql = "SELECT * FROM `items`  Where {$this->itemCode} = '".$itemCode. "'";
        $results = $this->getQuery($sql);
        return $results;
    }

    public function getSpecificEventDetails($eventCode){
        $sql = '';
        $results = [];
        $sql = "SELECT * FROM `cost_booking` INNER JOIN `event_booking` ON `cost_booking`.{$this->eventCode} = `event_booking`.{$this->eventCode} Where `cost_booking`.{$this->eventCode} = '{$eventCode}'";
        $results = $this->getQuery($sql);
        return $results;
    }

    public function getAllItemsOfSpecificEvents($eventCode){
        $sql = '';
        $results = [];
        $sql = "SELECT * FROM `booking_items` INNER JOIN `items` ON `items`.{$this->itemCode} = `booking_items`.{$this->itemCode}  Where `booking_items`.{$this->eventCode} = {$eventCode}";

        $results = $this->getQuery($sql);
        return $results;
    }
    public function getAllItemsNotInSpecificEvents($eventCode){
        $sql = '';
        $results = [];
        $sql = "SELECT * FROM `Items` WHERE Items.{$this->itemCode} NOT IN (SELECT {$this->itemCode} FROM `booking_items` Where `booking_items`.{$this->eventCode} = {$eventCode})";
        $results = $this->getQuery($sql);
        return $results;
    }

    public function updateQueryForCostBooking($eventCode, $grossTotal, $discount, $totalCost, $balance, $advance){
        $conn = $this->dbconnect();
        $sql = "Update `cost_booking` Set {$this->grossAmount} ='" . $grossTotal ."',{$this->discountAmount} = '" . $discount ."' , 
                {$this->totalAmount} = '". $totalCost. "', {$this->balance} = '". $balance."', {$this->advance}= '" . $advance . "' Where {$this->eventCode} = '" . $eventCode . "'";
        var_dump($sql);
        $results = mysqli_query($conn,$sql);
        return $results;
    }

    public function updateQueryForItemsBooking($eventCode, $itemCode, $quantityBooked){
        $conn = $this->dbconnect();
        $sql =  "Insert into `booking_items` ({$this->eventCode},{$this->itemCode},{$this->quantityBooked}) values('" . $eventCode . "', '" . $itemCode . "','" . $quantityBooked . "')";

        $results = mysqli_query($conn,$sql);
        return $results;
    }

    public function deleteAllItemsOfBooking($eventCode){
        $conn = $this->dbconnect();
        $sql = "Delete From `booking_items` Where {$this->eventCode}= '" . $eventCode ."'";
        $results = mysqli_query($conn,$sql);
        return $results;
    }

    public function deleteSpecificItem($itemCode){
        $conn = $this->dbconnect();
        $sql = "Delete From `items` Where {$this->itemCode}= '" . $itemCode ."'";
        $results = mysqli_query($conn,$sql);
        return $results;
    }

}
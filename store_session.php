<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/28/17
 * Time: 2:51 PM
 */

      session_start();
      $_SESSION['my_array']=$_POST['data'];
      echo "data stored in session";
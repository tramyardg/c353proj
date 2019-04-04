<?php

require '../db/DB.php';

// this is for purchase
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
{
    print_r($_POST['payload']);
}
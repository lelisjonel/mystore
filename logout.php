<?php

require_once('storeclass.php');
$store->logout();

header("Location:index.php");
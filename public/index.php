<?php
$app = require_once __DIR__ . "/../bootstrap.php";
$jc = new APIClient\Controller\JournalClient();
$jc->CallAPI();

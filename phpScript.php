<?php

require 'apiClient.php';
require 'ReportManager.php';
require 'ResponseEditor.php';

$params = array_shift($argv);

$client = new apiClient();
$data = $client->makeApiCall($argv);
$editor = new ResponseEditor($data);

$editedData = $editor->decodeAndGetValues();
$reportManager = new ReportManager();
$reportManager->generateReport($editedData);
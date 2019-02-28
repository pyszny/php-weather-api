<?php

require 'apiClient.php';
require 'ReportManager.php';
require 'ResponseEditor.php';
require 'ArgumentValidator.php';
require 'ResponseStatusValidator.php';

array_shift($argv);

$validatedArguments = ArgumentValidator::validate($argv);

$client = new apiClient();
$response = $client->makeApiCall($validatedArguments);

$editor = new ResponseEditor($response);
$editedData = $editor->getValues();

$reportManager = new ReportManager();
$reportManager->generateReport($editedData);